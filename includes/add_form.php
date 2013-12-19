<?php

	/*
	 * Some values have been hard coded for testing.
	 * */

	$type = "sale"; 
	$time = gmdate("YmdHis");
	$key_id = 449510;
	$hash = "5C8EEBB1302087B11CFAE6F557072A28";
	$order_id = "Test";
	
	$ccnumber = 4111111111111111;
	$cc
	
?>

<div class="transactions form">
<form action="/payscape.localdomain/transactions/add" id="TransactionAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	<fieldset>
		<legend>Add Transaction</legend>
	<div class="input text"><label for="TransactionType">Type</label><input name="data[Transaction][type]" value="sale" maxlength="20" type="text" id="TransactionType"/></div>				
<div class="input number required"><label for="TransactionKeyID">Key ID</label><input name="data[Transaction][key_id]" step="any" type="text" id="TransactionKeyID" value="5C8EEBB1302087B11CFAE6F557072A28 required="required"/>
</div>
				<div class="input text"><label for="TransactionCcnumber">Ccnumber</label><input name="data[Transaction][ccnumber]" value="4111111111111111" maxlength="20" type="text" id="TransactionCcnumber"/></div><div class="input text"><label for="TransactionCcexp">Ccexp</label><input name="data[Transaction][ccexp]" value="1010" maxlength="4" type="text" id="TransactionCcexp"/></div>		
<div class="input number required"><label for="TransactionAmount">Amount</label><input name="data[Transaction][amount]" step="any" type="text" id="TransactionAmount" required="required" value="2.00" />
</div>
		<div class="input text"><label for="TransactionCvv">Cvv</label><input name="data[Transaction][cvv]" maxlength="4" type="text" id="TransactionCvv"/></div><div class="input select"><label for="TransactionPayment">Payment</label><select name="data[Transaction][payment]" id="TransactionPayment">
<option value="0">credit card</option>
<option value="1">check</option>
</select></div><div class="input text"><label for="TransactionFirstname">Firstname</label><input name="data[Transaction][firstname]" maxlength="30" type="text" id="TransactionFirstname"/></div><div class="input text"><label for="TransactionLastname">Lastname</label><input name="data[Transaction][lastname]" maxlength="30" type="text" id="TransactionLastname"/></div><div class="input text"><label for="TransactionCompany">Company</label><input name="data[Transaction][company]" maxlength="60" type="text" id="TransactionCompany"/></div><div class="input text"><label for="TransactionAddress1">Address1</label><input name="data[Transaction][address1]" maxlength="60" type="text" id="TransactionAddress1"/></div><div class="input text"><label for="TransactionCity">City</label><input name="data[Transaction][city]" maxlength="60" type="text" id="TransactionCity"/></div><div class="input text"><label for="TransactionState">State</label><input name="data[Transaction][state]" maxlength="60" type="text" id="TransactionState"/></div><div class="input text"><label for="TransactionZip">Zip</label><input name="data[Transaction][zip]" maxlength="30" type="text" id="TransactionZip"/></div><div class="input text"><label for="TransactionCountry">Country</label><input name="data[Transaction][country]" maxlength="50" type="text" id="TransactionCountry"/></div><div class="input tel"><label for="TransactionPhone">Phone</label><input name="data[Transaction][phone]" maxlength="50" type="tel" id="TransactionPhone"/></div><div class="input text"><label for="TransactionFax">Fax</label><input name="data[Transaction][fax]" maxlength="50" type="text" id="TransactionFax"/></div><div class="input email"><label for="TransactionEmail">Email</label><input name="data[Transaction][email]" maxlength="150" type="email" id="TransactionEmail"/></div>	</fieldset>
<div class="submit"><input  type="submit" value="Submit"/></div></form></div>
<div class="actions">
	<h3>Actions</h3>
	<ul>

		<li><a href="/payscape.localdomain/transactions">List Transactions</a></li>
	</ul>
</div>
        
      </div>
