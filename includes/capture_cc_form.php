<?php

	$type = "auth"; 
	$time = gmdate("YmdHis");

	$message = "";
	
?>
	<h3><?php echo $capture_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
	<form action="transactions.php" id="TransactionCaptureForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	<fieldset>
		<legend>Capture Auth Transaction</legend>
		<input name="action" value="capture-cc" type="hidden" id="TransactionAction" />				
		<input name="type" type="hidden" value="capture" id="TransactionType" />
			
		<div class="input text"><label for="TransactionType">Type:</label> Capture. 	</div>				
	
		<div class="input number required"><label for="TransactionTransactionID">Auth Transaction ID: <?php echo $transactionid; ?> </label>
		<input name="transactionid" type="hidden" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>
		
		<div class="input number required">
		Authorized Amount: <?php echo $amount; ?> <br>
		<label for="TransactionAmount">Amount  </label><input name="amount" step="any" type="text" id="TransactionAmount" required="required" value="<?php echo $amount; ?>" />
		<br><span style="font-style:italic; color:#999999;">May not exceed Authorized Amount</span>
		</div>
	
	<div class="submit"><input  type="submit" value="Submit"/></div>
	</fieldset>
	
	</form>
</div>

	<?php } ?>



