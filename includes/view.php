<?php 

		if (mysqli_connect_errno($conn))
		{
			echo "Failed to connect to Database: " . mysqli_connect_error();
		}
		
	$sql = "SELECT * FROM transactions WHERE `id` = $id";	
    
    if ($result=mysqli_query($conn,$sql))
    {
    	// Return the number of rows in result set
    	$rowcount=mysqli_num_rows($result);
    //	printf("Result set has %d rows.\n",$rowcount);

    }
    
 
    if ($rowcount==0) {
    	echo "No rows found, nothing to print so am exiting";
    	exit;
    }

?>






<?php 
	$counter = 0;	
	
		while($row = mysqli_fetch_assoc($result)){ 
		
			if($counter % 2){
				$class="odd";
			} else {
				$class="even";
			}

?>
<div class="row">

	<h2>Transaction #<?php echo $row['transactionid']; ?></h2>

	<div class="span7">
		<table class="transaction">
		<caption><strong>Customer</strong></caption>
		<tr>
			<th>Name</th><th>Phone</th><th>Fax</th><th>Email</th><th>Company</th><th>IP Address</th>
		</tr>
		<tr>
			<td><?php echo $row['firstname'];?>&nbsp;<?php echo $row['lastname']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['fax']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['company']; ?></td>
			<td><?php echo $row['ipaddress']; ?></td>
		</tr>	
	</table>
	<hr>
	</div>
	
	<div class="span7">
		<table class="transaction">
			<caption><strong>Order</strong></caption>
			<tr>
				<th>Action</th><th>Id</th><th>Amount</th><th>Type</th><th>Time</th><th>Payment</th><th>Transaction ID</th><th>Order Id</th><th>Auth Code</th>
			</tr>
			<tr>
			<td>
		<?php if($row['type']=='auth'){ ?>
				<a href="transactions.php?action=capture&transactionid=<?php echo $row['transactionid']; ?>">Capture</a><br>
			<?php } 
			
			if($row['type']=='sale' && $row['payment']!='check') { ?>
				<a href="transactions.php?action=refund&transactionid=<?php echo $row['transactionid']; ?>">Refund</a><br>		
				<a href="transactions.php?action=credit&transactionid=<?php echo $row['transactionid']; ?>">Credit</a><br>
				<a href="transactions.php?action=update&transactionid=<?php echo $row['transactionid']; ?>">Update</a><br>
				<a href="transactions.php?action=void&transactionid=<?php echo $row['transactionid']; ?>">Void</a><br>
								
			<?php } ?>
				
			
				</td>
				<td class="highlight"><?php echo $row['id']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['type']; ?></td>
				
				<td><?php echo $row['time']; ?></td>
				<td><?php echo $row['payment']; ?></td>
				<td><?php echo $row['transactionid']; ?></td>
				<td><?php echo $row['orderid']; ?></td>
				<td><?php echo $row['authcode']; ?></td>
				
			</tr>
			<?php // bof refund ?>
			<?php if($row['type']=='refund'){  ?>
			
			<?php 
				$refund_transactionid = $row['refund_transactionid'];
			
				$sql = "SELECT id, amount FROM transactions WHERE transactionid = $refund_transactionid";
					if ($order=mysqli_query($conn,$sql))
						{
							// Return the number of rows in result set
							$rowcount=mysqli_num_rows($result);
							//	printf("Result set has %d rows.\n",$rowcount);
						
						}
						
						if ($rowcount==0) {
							echo "No rows found, nothing to print so am exiting";
							exit;
						} else {
			
							while($row2 = mysqli_fetch_assoc($order)){
									$order_id = $row2['id'];
									$order_amount = $row2['amount'];
							}
						
						}
			?>
			
			<tr>
			<td colspan="8">Refund for Order Transaction ID: <a href="transactions.php?action=view&id=<?php echo $order_id; ?>">
					<strong><?php echo $refund_transactionid; ?></strong></a>, 
					Order Amount: $<?php echo $order_amount; ?>
			   </td>		
			</tr>
			<?php } ?>
		
		<?php // bof void ?>
			<?php if($row['type']=='void'){  ?>
			
			<?php 
				$void_transaction_id = $row['void_transaction_id'];
			
				$sql = "SELECT transactionid FROM transactions WHERE id = $void_transaction_id";
					if ($voidorder=mysqli_query($conn,$sql))
						{
							// Return the number of rows in result set
							$rowcount=mysqli_num_rows($voidorder);
							//	printf("Result set has %d rows.\n",$rowcount);
						
						}
						
						if ($rowcount==0) {
							echo "No rows found, nothing to print so am exiting";
							exit;
						} else {
			
							while($row3 = mysqli_fetch_assoc($voidorder)){
									$void_transactionid = $row3['transactionid'];
								
							}
						
						}
			?>
			
			<tr>
			<td colspan="8">Void for Order Transaction ID: <a href="transactions.php?action=view&id=<?php echo $void_transaction_id; ?>">
					<strong><?php echo $void_transactionid; ?></strong></a> 
					
			   </td>		
			</tr>
			<?php } ?>			
			
		
		</table>
		<hr>
	
	</div>

	
	<div class="span7">
	
	<table class="transaction">
	<caption><strong>Shipping</strong></caption>
	<tr>
		<th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Country</th>
	</tr>
	<tr>
		<td><?php echo $row['address1']; ?></td>
		<td><?php echo $row['city']; ?></td>
		<td><?php echo $row['state']; ?></td>
		<td><?php echo $row['zip']; ?></td>
		<td><?php echo $row['country']; ?></td>
	</tr>
		<tr>
		<td colspan="3"><strong>Carrier: <?php echo $row['shipping_carrier']; ?></strong></td>
		<td colspan="2"><strong>Tracking Number: <?php echo $row['tracking_number']; ?></strong></td>
	</tr>
	</table>
		<hr>
	
	</div>
	
	
	<div class="span7">
	<table class="transaction">
		<caption><strong>Payment</strong></caption>
		
<?php if($row['payment']=='credit card'){ ?>
	<tr>
		<th>Payment</th>
		</tr>
	<tr>	
		<td><?php echo $row['payment']; ?></td>

	</tr>

<?php } else { ?>
	<tr>
	<th>Account Type</th><th>Account Holder Type</th>
	</tr>
	<tr>

	<td>	<?php echo $row['account_type']; ?></td>
	<td>	<?php echo $row['account_holder_type']; ?></td>
	
	</tr>
<?php } ?>

	
	</table>
		<hr>
	
	</div>
	<div class="span7">
	
		<table class="transaction">
	<caption><strong>Credentials</strong></caption>
	<tr>
		<th>Sec Code</th>
	</tr>
	<tr>
		<td><?php echo $row['sec_code']; ?></td>
	</tr>
	
	</table>
		<hr>
	
	</div>

	
	
	</div>
	<div class="clearfix"></div>
	
		<hr>
	<?php 
	$counter++;
		} 
	?>	
	


<?php 
		mysqli_free_result($result);
		mysqli_close($conn);

?>