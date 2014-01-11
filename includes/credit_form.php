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
		<legend>Process Credit for Transaction ID #<?php echo $transactionid; ?></legend>
			<input name="action" value="credit" type="hidden" id="TransactionAction"/>
				
			<div class="input text"><label for="Transactionid">Transaction ID: #<?php echo $transactionid; ?></label>
				<input name="transactionid" value="<?php echo $transactionid; ?>" type="hidden" id="Transactionid"/></div>
			<div class="input text"><label for="Orderid">Order ID: <?php echo $orderid; ?></label></div>
			<div class="input text"><label for="TransactionType">Type: credit</label>
				<input name="type" value="credit" maxlength="20" type="hidden" id="TransactionType"/></div>	
		
			<div class="input number required"><label for="TransactionAmount">Amount: <?php echo $amount; ?></label></div>
			
			<div class="input text"><label for="TransactionPayment">Payment: <?php echo $payment; ?></div>
			<div class="input number"><label for="TransactionTax">Tax: <?php echo $tax; ?></label></div>
			<div class="input number"><label for="TransactionOrderID">Order ID: <?php echo $orderid; ?></label></div>
			<div class="input"><label for="TransactionOrderDescription">Order Description: </label><br>
			<p><?php echo $orderdescription; ?></p></div>
		<!--  optional user information -->	
	<div class="input text"><label for="TransactionFirstname">First Name: <?php echo $firstname; ?></label></div>
	 		<div class="input text"><label for="TransactionLastname">Last Name: <?php echo $lastname; ?></label></div>
	 		<div class="input text"><label for="TransactionCompany">Company: <?php echo $company; ?></label></div>
	 		<div class="input text"><label for="TransactionAddress1">Address: <?php echo $address1; ?></label></div>
	 		<div class="input text"><label for="TransactionCity">City: <?php echo $city; ?></label></div>
	 		<div class="input text"><label for="TransactionState">State: <?php echo $state; ?></label></div>
	 		<div class="input text"><label for="TransactionZip">Zip: <?php echo $zip; ?></label></div>
	 		<div class="input text"><label for="TransactionCountry">Country: <?php echo $country; ?></label></div>
	 		<div class="input tel"><label for="TransactionPhone">Phone: <?php echo $phone; ?></label></div>
	 		<div class="input text"><label for="TransactionFax">Fax: <?php echo $fax; ?></label></div>
	 		<div class="input email"><label for="TransactionEmail">Email: <?php echo $email; ?></label></div>	
	
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
