<?php

	/*
	 * amount // rectified amount, not the amount of the original auth transaction
	 * transactionid // the transactionid of the auth
	 * username
	 * password
	 * 
	 * 
	 * */

	/*
	 * Some values have been hard coded for testing.
	 * */

	$type = "auth"; 
	$time = gmdate("YmdHis");
	$key_id = 449510;
	$key = '\!b2#1wu%)4_tUdpAxO|GDWW?20:V.w';		// Replace with your Payscape Key

	$order_id = "Test";
	
	$ccnumber = 4111111111111111;
	$message = "We have capture_cc_form.php included";
	
	/*
	 * get the Auth information for the Capture Form
	*
	* */
	 
	$sql = "SELECT id, amount, transactionid, orderid, authcode FROM transactions WHERE `transactionid` = $transactionid";
	/*
	echo "SQL: <br>";
	echo $sql;
	exit();
	*/
	
	 
	if ($result=mysqli_query($conn,$sql))
	{
		// Return the number of rows in result set
		$rowcount=mysqli_num_rows($result);
		//	printf("Result set has %d rows.\n",$rowcount);
		 
	}
	
	 
	if ($rowcount==0) {
		$process = 0;
		$capture_message = "No Authorization record found, nothing to process.";
		exit;
	} else {
		
		while($row = mysqli_fetch_assoc($result)){
			$auth_amount = $row['amount'];
			$transactionid = $row['transactionid'];
			$orderid = $row['orderid'];
			$authcode = $row['authcode'];
			$process = 1;
			$capture_message = "Process Authorization Capture for Transaction  #$transactionid";
		}
		
		

	}
	
		
	
	
	
?>
	<h3><?php echo $capture_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
<form action="transactions.php" id="TransactionCaptureForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	<fieldset>
		<legend>Capture Auth Transaction</legend>
	<input name="action" value="capture-cc" type="hidden" id="TransactionAction"/>				
		
	<div class="input text"><label for="TransactionType">Type:</label> Capture. 	</div>				

	<div class="input number required"><label for="TransactionTransactionID">Auth Transaction ID</label><input name="transactionid" step="any" type="text" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>
	<div class="input number required"><label for="TransactionAuthcode">Auth Code</label><input name="authcode" step="any" type="text" id="TransactionAuthcode" value="<?php echo $authcode; ?>" required="required"/></div>

	<div class="input number required"><label for="TransactionAmount">Amount Total</label><input name="amount" step="any" type="text" id="TransactionAmount" required="required" value="2.00" /></div>
	
	<div class="input text"><input name="payment" type="hidden" value="credit card" id="TransactionPayment"></div>

</fieldset>
<div class="submit"><input  type="submit" value="Submit"/></div></form></div>

	<?php } ?>

<div class="actions">
	<h3>Actions</h3>
	<ul>

		<li><a href="/payscape.localdomain/transactions">List Transactions</a></li>
	</ul>
</div>
        
      </div>
