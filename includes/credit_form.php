<?php

	if(isset($result_array)){
		print_r($result_array);
	}
?>
<?php if($process==1){ ?>
<div class="transactions form">
<form action="transactions.php" id="TransactionAddForm" method="post" accept-charset="utf-8">
		<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
	<fieldset>
		<legend>Process Credit for Transaction ID#<?php echo $transactionid; ?></legend>
			<input name="action" value="credit" type="hidden" id="TransactionAction"/>
		<!-- required fields -->				
			<div class="input text"><label for="Transactionid">Transaction id #</label><input name="transactionid" value="<?php echo $transactionid; ?>" type="text" id="Transactionid"/></div>
			<div class="input text"><label for="Orderid">Order ID</label><input name="orderid" value="<?php echo $orderid; ?>" type="text" id="TransactionOrderid"/></div>
			<div class="input text"><label for="TransactionType">Type</label><input name="type" value="credit" maxlength="20" type="text" id="TransactionType"/></div>	
		
			<div class="input number required"><label for="TransactionAmount">Amount</label><input name="amount" step="any" type="text" id="TransactionAmount" required="required" value="<?php echo $amount; ?>" /></div>
			
			<div class="input text"><input name="payment" type="hidden" value="<?php echo $payment; ?>" id="TransactionPayment"></div>
			<div class="input number"><label for="TransactionTax">Tax</label><input name="tax" step="any" type="text" id="TransactionTax" value="<?php echo $tax; ?>" /></div>
			<div class="input number"><label for="TransactionOrderID">Order ID</label><input name="orderid" step="any" type="text" id="TransactionOrderID" value="<?php echo $orderid; ?>" /></div>
			<div class="input"><label for="TransactionOrderDescription">Order Description</label><br>
			<textarea name="orderdescription" id="TransactionOrderdescription"><?php echo $orderdescription; ?></textarea></div>
		<!--  optional user information -->	
	<div class="input text"><label for="TransactionFirstname">Firstname</label><input name="firstname" maxlength="30" type="text" id="TransactionFirstname" value="<?php echo $firstname; ?>" /></div>
	 		<div class="input text"><label for="TransactionLastname">Lastname</label><input name="lastname" maxlength="30" type="text" id="TransactionLastname" value="<?php echo $lastname; ?>"/></div>
	 		<div class="input text"><label for="TransactionCompany">Company</label><input name="company" maxlength="60" type="text" id="TransactionCompany" value="<?php echo $company; ?>" /></div>
	 		<div class="input text"><label for="TransactionAddress1">Address1</label><input name="address1" maxlength="60" type="text" id="TransactionAddress1" value="<?php echo $address1; ?>" /></div>
	 		<div class="input text"><label for="TransactionCity">City</label><input name="city" maxlength="60" type="text" id="TransactionCity" value="<?php echo $city; ?>" /></div>
	 		<div class="input text"><label for="TransactionState">State</label><input name="state" maxlength="60" type="text" id="TransactionState" value="<?php echo $state; ?>" /></div>
	 		<div class="input text"><label for="TransactionZip">Zip</label><input name="zip" maxlength="30" type="text" id="TransactionZip" value="<?php echo $zip; ?>" /></div>
	 		<div class="input text"><label for="TransactionCountry">Country</label><input name="country" maxlength="50" type="text" id="TransactionCountry" value="<?php echo $country; ?>" /></div>
	 		<div class="input tel"><label for="TransactionPhone">Phone</label><input name="phone" maxlength="50" type="tel" id="TransactionPhone" value="<?php echo $phone; ?>" /></div>
	 		<div class="input text"><label for="TransactionFax">Fax</label><input name="fax" maxlength="50" type="text" id="TransactionFax" value="<?php echo $fax; ?>" /></div>
	 		<div class="input email"><label for="TransactionEmail">Email</label><input name="email" maxlength="150" type="email" id="TransactionEmail" value="<?php echo $email; ?>" /></div>	
	
	</fieldset>
	<div class="submit"><input  type="submit" value="Submit"/></div>

</form></div>
<div class="actions">
	<h3>Actions</h3>
	<ul>

		<li><a href="/payscape.localdomain/transactions">List Transactions</a></li>
	</ul>
</div>
<?php }  ?>
