<?php 
		require_once 'includes/database.php';
		
	$sql = "SELECT * FROM transactions ORDER BY id";	
    $transactions = mysql_query($sql) or die(mysql_error());

    
?>

<div class="transactions view">
<h2>Transactions</h2>
<dl>
<?php foreach($transactions as $transaction){ ?>
	
		<dt>Id</dt>
		<dd>
			<?php echo $transaction['Transaction']['id']; ?>
			&nbsp;
		</dd>
		<dt>Type</dt>
		<dd>
			<?php echo $transaction['Transaction']['type']; ?>
			&nbsp;
		</dd>
		<dt>Key Id</dt>
		<dd>
			<?php echo $transaction['Transaction']['key_id']; ?>
			&nbsp;
		</dd>
		<dt>Hash</dt>
		<dd>
			<?php echo $transaction['Transaction']['hash']; ?>
			&nbsp;
		</dd>
		<dt>Time</dt>
		<dd>
			<?php echo $transaction['Transaction']['time']; ?>
			&nbsp;
		</dd>
		<dt>Ccnumber</dt>
		<dd>
			<?php echo $transaction['Transaction']['ccnumber']; ?>
			&nbsp;
		</dd>
		<dt>Ccexp</dt>
		<dd>
			<?php echo $transaction['Transaction']['ccexp']; ?>
			&nbsp;
		</dd>
		<dt>Checkname</dt>
		<dd>
			<?php echo $transaction['Transaction']['checkname']; ?>
			&nbsp;
		</dd>
		<dt>Checkaba</dt>
		<dd>
			<?php echo $transaction['Transaction']['checkaba']; ?>
			&nbsp;
		</dd>
		<dt>Checkaccount</dt>
		<dd>
			<?php echo $transaction['Transaction']['checkaccount']; ?>
			&nbsp;
		</dd>
		<dt>Account Holder Type</dt>
		<dd>
			<?php echo $transaction['Transaction']['account_holder_type']; ?>
			&nbsp;
		</dd>
		<dt>Account Type</dt>
		<dd>
			<?php echo $transaction['Transaction']['account_type']; ?>
			&nbsp;
		</dd>
		<dt>Sec Code</dt>
		<dd>
			<?php echo $transaction['Transaction']['sec_code']; ?>
			&nbsp;
		</dd>
		<dt>Processor Id</dt>
		<dd>
			<?php echo $transaction['Transaction']['processor_id']; ?>
			&nbsp;
		</dd>
		<dt>Amount</dt>
		<dd>
			<?php echo $transaction['Transaction']['amount']; ?>
			&nbsp;
		</dd>
		<dt>Cvv</dt>
		<dd>
			<?php echo $transaction['Transaction']['cvv']; ?>
			&nbsp;
		</dd>
		<dt>Payment</dt>
		<dd>
			<?php echo $transaction['Transaction']['payment']; ?>
			&nbsp;
		</dd>
		<dt>Ipaddress</dt>
		<dd>
			<?php echo $transaction['Transaction']['ipaddress']; ?>
			&nbsp;
		</dd>
		<dt>Firstname</dt>
		<dd>
			<?php echo $transaction['Transaction']['firstname']; ?>
			&nbsp;
		</dd>
		<dt>Lastname</dt>
		<dd>
			<?php echo $transaction['Transaction']['lastname']; ?>
			&nbsp;
		</dd>
		<dt>Company</dt>
		<dd>
			<?php echo $transaction['Transaction']['company']; ?>
			&nbsp;
		</dd>
		<dt>Address1</dt>
		<dd>
			<?php echo $transaction['Transaction']['address1']; ?>
			&nbsp;
		</dd>
		<dt>City</dt>
		<dd>
			<?php echo $transaction['Transaction']['city']; ?>
			&nbsp;
		</dd>
		<dt>State</dt>
		<dd>
			<?php echo $transaction['Transaction']['state']; ?>
			&nbsp;
		</dd>
		<dt>Zip</dt>
		<dd>
			<?php echo $transaction['Transaction']['zip']; ?>
			&nbsp;
		</dd>
		<dt>Country</dt>
		<dd>
			<?php echo $transaction['Transaction']['country']; ?>
			&nbsp;
		</dd>
		<dt>Phone</dt>
		<dd>
			<?php echo $transaction['Transaction']['phone']; ?>
			&nbsp;
		</dd>
		<dt>Fax</dt>
		<dd>
			<?php echo $transaction['Transaction']['fax']; ?>
			&nbsp;
		</dd>
		<dt>Email</dt>
		<dd>
			<?php echo $transaction['Transaction']['email']; ?>
			&nbsp;
		</dd>
	<?php } ?>	
	</dl>
</div>
