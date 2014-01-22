<?php

	$type = "refund"; 


	$refund_message = "Refund Credit Card Sale Transaction";
	
	
?>
	<h3><?php echo $refund_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
<form action="transactions.php" id="TransactionCaptureForm" method="post" accept-charset="utf-8">
<fieldset>
	<legend>Refund Sale Credit Card Transaction</legend>
		<input type="hidden" name="_method" value="POST"/>	
		<input name="action" value="refund" type="hidden" id="TransactionAction"/>				
		<input name="type" value="refund" type="hidden" id="TransactionType" />
	<div class="input text"><label for="TransactionType">Type:</label> Refund. 	</div>				

	<div class="input number required"><label for="TransactionTransactionID">Refund Transaction ID: <?php echo $transactionid; ?></label>
	
	<input name="transactionid" step="any" type="hidden" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>
	
	<div class="input number required">
		Transaction Amount: <?php echo $amount; ?><br>
	<label for="TransactionAmount">Refund Total <span style="font-style:italic">(if less than original Transaction Amount)</span></label>
		<br><input name="amount" step="any" type="text" id="TransactionAmount" /></div>
</fieldset>
<div class="submit"><input  type="submit" value="Submit"/></div></form></div>

	<?php } ?>

