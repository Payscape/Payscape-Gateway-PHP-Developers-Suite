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

    
    /*
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    exit();
    */
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
		<caption><h3>Customer</h3></caption>
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
			<caption><h3>Order</h3></caption>
			<tr>
				<th>Action</th><th>Id</th><th>Amount</th><th>Type</th><th>Time</th><th>Payment</th><th>Transaction ID</th><th>Order Id</th><th>Auth Code</th>
			</tr>
			<tr>
			<td>
							<?php if($row['type']=='auth'){ ?>
				<a href="transactions.php?action=capture_cc&transactionid=<?php echo $row['transactionid']; ?>">Capture</a><br>

				
				
			<?php } 
			
			if($row['type']=='sale') { ?>
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
		
		</table>
		<hr>
	
	</div>

	
	<div class="span7">
	
	<table class="transaction">
	<caption><h3>Shipping</h3></caption>
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
	
	</table>
		<hr>
	
	</div>
	
	
	<div class="span7">
	<table class="transaction">
		<caption><h3>Payment</h3></caption>
		
<?php if($row['payment']=='credit card'){ ?>
	<tr>
		<th>Payment</th><th>Credit Card Number</th><th>Expiration</th><th>CVV</th>
		</tr>
	<tr>	
		<td><?php echo $row['payment']; ?></td>
		<td><?php echo $row['ccnumber']; ?></td>
		<td><?php echo $row['ccexp']; ?></td>
		<td><?php echo $row['cvv']; ?></td>
	</tr>

<?php } else { ?>
	<tr>
	<th>Checkname</th><th>Check Account </th><th>Routing Number</th><th>Account Type</th><th>Account Holder Type</th>
	</tr>
	<tr>
	<td><?php echo $row['checkname']; ?></td>
	<td><?php echo $row['checkaccount']; ?></td>
	<td><?php echo $row['checkaba']; ?></td>
	<td>	<?php echo $row['account_type']; ?></td>
	<td>	<?php echo $row['account_holder_type']; ?></td>
	
	</tr>
<?php } ?>

	
	</table>
		<hr>
	
	</div>
	<div class="span7">
	
		<table class="transaction">
	<caption><h3>Credentials</h3></caption>
	<tr>
		<th>Key ID</th><th>Hash</th><th>Sec Code</th><th>Processor ID</th>
	</tr>
	<tr>
		<td><?php echo $row['key_id']; ?>
		</td>
		<td><?php echo $row['hash']; ?></td>
		<td><?php echo $row['sec_code']; ?></td>
		<td><?php echo $row['processor_id']; ?></td>
	
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