<?php
		/*
		 * Transaction with Payscape Direct Post Gateway PHP Wrapper
		 * Validate Credit Card Example
		 * */

	$type = "validate"; 
	$time = gmdate("YmdHis");
	
	/* test data */

	$order_id = "Test";
	$ccnumber = 4111111111111111;
	$ccexp = '1010'; // 10/10
	$cvv = '123';
	$message = "Validate Credit Card";
	
?>

<div class="transactions form">
<form action="transactions.php" id="TransactionAddForm" method="post" accept-charset="utf-8">
		<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
	<fieldset>
		<legend>Validate Credit Card Transaction</legend>
		<input name="action" value="validate-cc" type="hidden" id="TransactionAction"/>
		<input name="type" value="validate" maxlength="20" type="hidden" id="TransactionType"/>	
		Transaction type: validate		
	<div class="input text"><label for="TransactionCcnumber">Ccnumber</label><input name="ccnumber" maxlength="20" type="text" id="TransactionCcnumber"/></div>
		<div class="input text"><label for="TransactionCcexp">Ccexp</label><input name="ccexp" maxlength="4" type="text" id="TransactionCcexp"/></div>		
		<div class="input text"><label for="TransactionCvv">Cvv</label><input name="cvv" maxlength="4" type="text" id="TransactionCvv" /></div>
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
</fieldset>
<div class="submit"><input  type="submit" value="Submit"/></div></form></div>
<div class="actions">
	<h3>Actions</h3>
	<ul>

		<li><a href="/payscape.localdomain/transactions">List Transactions</a></li>
	</ul>
</div>
        
      </div>
