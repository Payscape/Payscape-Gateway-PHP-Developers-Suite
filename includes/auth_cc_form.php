<?php

					
	$message = "Authorize Transaction";
	
?>

<div class="transactions form">
	<form action="transactions.php" id="TransactionAddForm" method="post" accept-charset="utf-8">
	
	<fieldset>
			<legend>Auth Credit Card Transaction</legend>
		<input type="hidden" name="_method" value="POST"/>		
		<input name="action" value="auth-cc" type="hidden" id="TransactionAction"/>
		<input name="type" type="hidden" value="auth" maxlength="20" type="text" id="TransactionType"/>
		
			
	<div class="input text"><label for="TransactionType">Type: Auth</label>
	</div>				
	
	
	<div class="input text"><label for="TransactionCcnumber">Ccnumber</label><input name="ccnumber" maxlength="20" type="text" id="TransactionCcnumber"/></div>
	<div class="input text"><label for="TransactionCcexp">Ccexp</label><input name="ccexp" maxlength="4" type="text" id="TransactionCcexp"/></div>		
	<div class="input text"><label for="TransactionCvv">Cvv</label><input name="cvv" maxlength="4" type="text" id="TransactionCvv"/></div>			
	
	<div class="input number required"><label for="TransactionAmount">Amount</label><input name="amount" type="text" id="TransactionAmount" required="required" /></div>
	<div class="input number required"><label for="TransactionAmount">Tax</label><input name="tax" type="text" id="TransactionTax" /></div>
	<div class="input number required"><label for="TransactionOrderID">Order ID</label><input name="orderid" type="text" id="TransactionOrderID" /></div>
	<div class="input number required"><label for="TransactionOrderDescription">Order Description</label><br>
	<textarea name="orderdescription" id="TransactionOrderDescription"></textarea></div>
	
	<div class="input text"><input name="payment" type="hidden" value="creditcard" id="TransactionPayment"></div>
	<div class="input text"><label for="TransactionFirstname">Firstname</label><input name="firstname" maxlength="30" type="text" id="TransactionFirstname"/></div>
	<div class="input text"><label for="TransactionLastname">Lastname</label><input name="lastname" maxlength="30" type="text" id="TransactionLastname"/></div>
	<div class="input text"><label for="TransactionCompany">Company</label><input name="company" maxlength="60" type="text" id="TransactionCompany"/></div>
	<div class="input text"><label for="TransactionAddress1">Address1</label><input name="address1" maxlength="60" type="text" id="TransactionAddress1"/></div>
	<div class="input text"><label for="TransactionCity">City</label><input name="city" maxlength="60" type="text" id="TransactionCity"/></div>
	<div class="input text"><label for="TransactionState">State</label><input name="state" maxlength="60" type="text" id="TransactionState"/></div>
	<div class="input text"><label for="TransactionZip">Zip</label><input name="zip" maxlength="30" type="text" id="TransactionZip"/></div>
	<div class="input text"><label for="TransactionCountry">Country</label><input name="country" maxlength="50" type="text" id="TransactionCountry"/></div>
	<div class="input tel"><label for="TransactionPhone">Phone</label><input name="phone" maxlength="50" type="tel" id="TransactionPhone"/></div>
	<div class="input text"><label for="TransactionFax">Fax</label><input name="fax" maxlength="50" type="text" id="TransactionFax"/></div>
	<div class="input email"><label for="TransactionEmail">Email</label><input name="email" maxlength="150" type="email" id="TransactionEmail"/></div>	
	<div class="submit"><input  type="submit" value="Submit"/></div>
	
</fieldset>	

</form>
</div>

        
 
