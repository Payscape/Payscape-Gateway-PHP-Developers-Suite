<?php

?>
	<h3><?php echo $void_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
<form action="transactions.php" id="TransactionVoidForm" method="post" accept-charset="utf-8">

<fieldset>
  
		<legend>Void Transaction ID #<?php echo $transactionid; ?></legend>
				<input type="hidden" name="_method" value="POST"/>
	<input name="action" value="void" type="hidden" id="TransactionAction"/>				
		
	<div class="input text"><label for="TransactionType">Type:</label> Void. 	</div>				

	<div class="input number required"><label for="TransactionTransactionID">Transaction ID: <?php echo $transactionid; ?></label>
	<input name="transactionid" step="any" type="hidden" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>

	<div class="input number required"><label for="TransactionAmount">Amount:  <?php echo $auth_amount; ?></label></div>
	<div class="input number required"><label for="TransactionOrderID">Order ID:  <?php echo $orderid; ?></label></div>
	
</fieldset>	


<div class="submit"><input  type="submit" value="Submit"/></div>

</form>

</div>

	<?php } ?>


        

