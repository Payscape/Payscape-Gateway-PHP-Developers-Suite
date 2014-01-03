<?php


	/*
	 * Some values have been hard coded for testing.
	 * */

	$type = "refund"; 


	$refund_message = "We have refund_form.php included";
	
	
?>
	<h3><?php echo $refund_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
<form action="transactions.php" id="TransactionCaptureForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	<fieldset>
		<legend>Capture Auth Transaction</legend>
	<input name="action" value="refund" type="hidden" id="TransactionAction"/>				
		
	<div class="input text"><label for="TransactionType">Type:</label> Refund. 	</div>				

	<div class="input number required"><label for="TransactionTransactionID">Refund Transaction ID</label><input name="transactionid" step="any" type="text" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>
	
	<div class="input number required"><label for="TransactionAmount">Amount Total</label><input name="amount" step="any" type="text" id="TransactionAmount" required="required" value="<?php echo $amount; ?>" /></div>
	
	

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
