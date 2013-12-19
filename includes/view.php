<?php 
		
	$sql = "SELECT * FROM transactions ORDER BY id";	
    $result = mysqli_query($sql) or die(mysql_error());
    

    
    /*
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    exit();
    */
?>
<?php 
	if (mysql_num_rows($result) == 0) {
		echo "No rows found, nothing to print so am exiting";
		exit;
	}

?>


<div class="transactions view">
<h2>Transactions</h2>
<dl>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
	
		<dt>Id</dt>
		<dd>
			<?php echo $row['id']; ?>
			&nbsp;
		</dd>
		<dt>Type</dt>
		<dd>
			<?php echo $row['type']; ?>
			&nbsp;
		</dd>
		<dt>Key Id</dt>
		<dd>
			<?php echo $row['key_id']; ?>
			&nbsp;
		</dd>
		<dt>Hash</dt>
		<dd>
			<?php echo $row['hash']; ?>
			&nbsp;
		</dd>
		<dt>Time</dt>
		<dd>
			<?php echo $row['time']; ?>
			&nbsp;
		</dd>
		<dt>Ccnumber</dt>
		<dd>
			<?php echo $row['ccnumber']; ?>
			&nbsp;
		</dd>
		<dt>Ccexp</dt>
		<dd>
			<?php echo $row['ccexp']; ?>
			&nbsp;
		</dd>
		<dt>Checkname</dt>
		<dd>
			<?php echo $row['checkname']; ?>
			&nbsp;
		</dd>
		<dt>Checkaba</dt>
		<dd>
			<?php echo $row['checkaba']; ?>
			&nbsp;
		</dd>
		<dt>Checkaccount</dt>
		<dd>
			<?php echo $row['checkaccount']; ?>
			&nbsp;
		</dd>
		<dt>Account Holder Type</dt>
		<dd>
			<?php echo $row['account_holder_type']; ?>
			&nbsp;
		</dd>
		<dt>Account Type</dt>
		<dd>
			<?php echo $row['account_type']; ?>
			&nbsp;
		</dd>
		<dt>Sec Code</dt>
		<dd>
			<?php echo $row['sec_code']; ?>
			&nbsp;
		</dd>
		<dt>Processor Id</dt>
		<dd>
			<?php echo $row['processor_id']; ?>
			&nbsp;
		</dd>
		<dt>Amount</dt>
		<dd>
			<?php echo $row['amount']; ?>
			&nbsp;
		</dd>
		<dt>Cvv</dt>
		<dd>
			<?php echo $row['cvv']; ?>
			&nbsp;
		</dd>
		<dt>Payment</dt>
		<dd>
			<?php echo $row['payment']; ?>
			&nbsp;
		</dd>
		<dt>Ipaddress</dt>
		<dd>
			<?php echo $row['ipaddress']; ?>
			&nbsp;
		</dd>
		<dt>Firstname</dt>
		<dd>
			<?php echo $row['firstname']; ?>
			&nbsp;
		</dd>
		<dt>Lastname</dt>
		<dd>
			<?php echo $row['lastname']; ?>
			&nbsp;
		</dd>
		<dt>Company</dt>
		<dd>
			<?php echo $row['company']; ?>
			&nbsp;
		</dd>
		<dt>Address1</dt>
		<dd>
			<?php echo $row['address1']; ?>
			&nbsp;
		</dd>
		<dt>City</dt>
		<dd>
			<?php echo $row['city']; ?>
			&nbsp;
		</dd>
		<dt>State</dt>
		<dd>
			<?php echo $row['state']; ?>
			&nbsp;
		</dd>
		<dt>Zip</dt>
		<dd>
			<?php echo $row['zip']; ?>
			&nbsp;
		</dd>
		<dt>Country</dt>
		<dd>
			<?php echo $row['country']; ?>
			&nbsp;
		</dd>
		<dt>Phone</dt>
		<dd>
			<?php echo $row['phone']; ?>
			&nbsp;
		</dd>
		<dt>Fax</dt>
		<dd>
			<?php echo $row['fax']; ?>
			&nbsp;
		</dd>
		<dt>Email</dt>
		<dd>
			<?php echo $row['email']; ?>
			&nbsp;
		</dd>
		<hr>
	<?php } ?>	
	</dl>
</div>

<?php 
		mysqli_free_result($result);

?>