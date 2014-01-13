<?php

	$type = "auth"; 
	$time = gmdate("YmdHis");

	$message = "Capture Credit Card Authorization";
	
?>
	<h3><?php echo $capture_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
	<form action="transactions.php" id="TransactionCaptureForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	<fieldset>
		<legend>Capture Auth Transaction</legend>
		<input name="action" value="capture-cc" type="hidden" id="TransactionAction" />				
		<input name="type" type="hidden" value="capture" id="TransactionType" />
			
		<div class="input text"><label for="TransactionType">Type:</label> Capture. 	</div>				
	
		<div class="input number required"><label for="TransactionTransactionID">Auth Transaction ID</label><input name="transactionid" step="any" type="text" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>
		<div class="input number required"><label for="TransactionAmount">Amount Total</label><input name="amount" step="any" type="text" id="TransactionAmount" required="required" value="<?php echo $amount; ?>" /></div>
	
	<div class="submit"><input  type="submit" value="Submit"/></div>
	</fieldset>
	
	</form>
</div>

	<?php } ?>



