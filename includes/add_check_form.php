<?php

	

	/*
	 * Some values have been hard coded for testing.
	 * */
$checkname = 'Test'; //
$checkaba = '123123123'; // test Bank Routing Number (ACH)
$checkaccount = '123123123'; // test Bank Account Number (ACH)
$account_holder_type = 'business'; // test Payscape Account Holder Type (business / personal)
$account_type = 'checking'; // test bank account type (checking / savings)


	
?>

<div class="transactions form">
<form action="transactions.php" id="TransactionAddForm" method="post" accept-charset="utf-8">
	<fieldset>
		<legend>New Check Transaction</legend>
<input type="hidden" name="_method" value="POST"/>
<input type="hidden" name="payment" id="TransactionPayment" value="check">
<input type="hidden" name="type" id="TransactionType" value="sale">
<input type="hidden" name="action" value="add-check">

	<div class="input text"><label for="TransactionCheckaba">Checkaba - Bank Routing #</label>
		<input name="checkaba" value="<?php echo $checkaba?>" type="text" id="TransactionCheckaba"/>
	</div>
	<div class="input text"><label for="TransactionCheckaccount">Checkaccount</label>
		<input name="checkaccount" type="text" id="TransactionCheckaccount" value="<?php echo $checkaccount; ?>" />
	</div>
	<div class="input text"><label for="TransactionCheckname">Checkname</label>
		<input name="checkname" type="text" id="TransactionCheckname" value="<?php echo $checkname; ?>" />
	</div>
	<div class="input text"><label for="TransactionAccountHolderType">Account Holder Type</label>
	<select name="account_holder_type" id="TransactionAccountHoloderType">
		<option value="business">Business</option>
		<option value="personal">Personal</option>
	</select>
	</div>
		<div class="input text"><label for="TransactionAccountType">Account Type</label>
			<select name="account_type">
		<option value="checking">Checking</option>
		<option value="savings">Savings</option>
	</select>
		
	</div>
	
	<div class="input number required"><label for="TransactionAmount">Amount</label>
		<input name="amount" step="any" type="text" id="TransactionAmount" required="required" value="2.00" />
	</div>
	<div class="input text"><label for="TransactionFirstname">Firstname</label>
		<input name="firstname" maxlength="30" type="text" id="TransactionFirstname"/>
	</div>	
	<div class="input text"><label for="TransactionLastname">Lastname</label>
		<input name="lastname" maxlength="30" type="text" id="TransactionLastname"/>
	</div>
	<div class="input text"><label for="TransactionCompany">Company</label>
		<input name="company" maxlength="60" type="text" id="TransactionCompany"/>
	</div>
	<div class="input text"><label for="TransactionAddress1">Address1</label>
		<input name="address1" maxlength="60" type="text" id="TransactionAddress1"/>
	</div>
	<div class="input text"><label for="TransactionCity">City</label>
		<input name="city" maxlength="60" type="text" id="TransactionCity"/>
	</div>
	<div class="input text"><label for="TransactionState">State</label>
		<input name="state" maxlength="60" type="text" id="TransactionState"/>
	</div>
	<div class="input text"><label for="TransactionZip">Zip</label>
		<input name="zip" maxlength="30" type="text" id="TransactionZip"/>
	</div>
	<div class="input text"><label for="TransactionCountry">Country</label>
		<input name="country" maxlength="50" type="text" id="TransactionCountry"/>
	</div>
	<div class="input tel"><label for="TransactionPhone">Phone</label>
		<input name="phone" maxlength="50" type="tel" id="TransactionPhone"/>
	</div>
	<div class="input text"><label for="TransactionFax">Fax</label>
		<input name="fax" maxlength="50" type="text" id="TransactionFax"/>
	</div>
	<div class="input email"><label for="TransactionEmail">Email</label>
		<input name="email" maxlength="150" type="email" id="TransactionEmail"/>
	</div>	
	</fieldset>
	<div class="submit"><input  type="submit" value="Submit"/></div>
</form></div>

<div class="actions">
	<h3>Actions</h3>
	<ul>

		<li><a href="/payscape.localdomain/transactions">List Transactions</a></li>
	</ul>
</div>
        
      </div>
