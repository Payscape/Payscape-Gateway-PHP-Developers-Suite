<?php

	$void_message = "Void an unsettled Transaction";
?>
	<h3><?php echo $void_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
<form action="transactions.php" id="TransactionVoidForm" method="post" accept-charset="utf-8">
<div style="display:none;">
<fieldset>

		<legend>Void Transaction ID #<?php echo $transactionid; ?></legend>
			<input type="hidden" name="_method" value="POST"/></div>	
	<input name="action" value="void" type="hidden" id="TransactionAction"/>				
		
	<div class="input text"><label for="TransactionType">Type:</label> Void. 	</div>				

	<div class="input number required"><label for="TransactionTransactionID">Transaction ID</label><input name="transactionid" step="any" type="text" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>

	<div class="input number required"><label for="TransactionAmount">Amount Total</label><input name="amount" step="any" type="text" id="TransactionAmount" required="required" value="2.00" /></div>
	
	

</fieldset>
<div class="submit"><input  type="submit" value="Submit"/></div></form></div>

	<?php } ?>

<div class="actions">
	<h3>Actions</h3>
	<ul>

		<li><a href="/payscape.localdomain/transactions">List Transactions</a></li>
	</ul>
</div>
        
  
