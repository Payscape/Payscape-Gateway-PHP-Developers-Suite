<?php 

		if (mysqli_connect_errno($conn))
		{
			echo "Failed to connect to Database: " . mysqli_connect_error();
		}
		
	$sql = "SELECT * FROM transactions ORDER BY id";	
    
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





<div class="transactions view">
<h2>Transactions</h2>
<div class="<?php echo $class; ?>">
	<table id="Transactions">
		<tr>
		<th>Actions</th><th>Id</th><th>Name</th><th>Type</th><th>Time</th><th>Payment</th><th>Amount</th><th>Order ID</th><th nowrap="nowrap">Transaction ID</th>
		</tr>
<?php 
	$counter = 0;	
	
		while($row = mysqli_fetch_assoc($result)){ 
		
			if($counter % 2){
				$class="odd";
			} else {
				$class="even";
			}

?>

		<tr class="<?php echo $class; ?>">
		<td>	
			<a href="transactions.php?action=view&id=<?php echo $row['id']; ?>"><strong>View</strong></a>
		<?php if($row['type']=='auth'){ ?>
			<a href="transactions.php?action=capture&transactionid=<?php echo $row['transactionid']; ?>"><strong>Capture</strong></a><br>
		<?php } ?>
		</td>
		<td><?php echo $row['id']; ?></td>
		<td nowrap="nowrap">&nbsp;<?php echo $row['firstname']; ?>&nbsp;<?php echo $row['lastname']; ?></td>
		<td><?php echo $row['type']; ?>&nbsp;</td>
		<td><?php echo $row['time']; ?>&nbsp;</td>
		<td><?php echo $row['payment']; ?>&nbsp;</td>
		<td><?php echo $row['amount']; ?>&nbsp;</td>
		<td><?php echo $row['orderid']; ?>&nbsp;</td>
		<td><?php echo $row['transactionid']; ?>&nbsp;</td>
		</tr>
		
	<?php 
	$counter++;
		} 
	?>	
		</table>	
	</div>
	<div class="clearfix"></div>
</div>

<?php 
		mysqli_free_result($result);
		mysqli_close($conn);

?>