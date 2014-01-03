<?php


	$type = "update"; 


	$update_message = "Process Transaction Shipping Updates";
	
	
?>
	<h3><?php echo $update_message; ?></h3>

	<?php if($process==1){ ?>
<div class="transactions form">
<form action="transactions.php" id="TransactionCaptureForm" method="post" accept-charset="utf-8">
<fieldset>
<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
		<legend>Process Update Transaction</legend>
	<input name="action" value="update" type="hidden" id="TransactionAction"/>				
		
	<div class="input text"><label for="TransactionType">Type:</label> Update. 	</div>				

	<div class="input number required"><label for="TransactionTransactionID">Transaction ID</label><input name="transactionid" step="any" type="text" id="TransactionTransactionID" value="<?php echo $transactionid; ?>" required="required"/></div>
	
	<div class="input required"><label for="TransactionOrderID">Order ID</label>

	<input name="orderid" step="any" type="text" id="TransactionOrderID" value="<?php echo $orderid; ?>" />
	</div>
	
	<div class="input required"><label for="TransactionTrackingID">Tracking Number</label>

	<input name="tracking_number" step="any" type="text" id="TransactionTrackingNumber" />
	</div>

	<div class="input required"><label for="TransactionShippingCarrier">Shipping Carrier</label>

	<select name="shipping_carrier" id="TransactionShippingCarrier">
	<option value="dhl">DHL</option>
	<option value="fedex">FedEx</option>
	<option value="usps">US Postal Service</option>
	<option value="ups">UPS</option>
	
	</select>
	</div>
	

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
