<?php 
	/*
	* Transaction with Payscape Direct Post API PHP Wrapper
	* Credit Example
	* */

	$type = 'credit';
	$ipaddress = $_SERVER['REMOTE_ADDR'];

			require_once 'classes/Payscape/Payscape.php';
	

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	
  	/* triggers */
		
		/*
		 * To cause a declined message, pass an amount less than 1.00.
		* To trigger a fatal error message, pass an invalid card number.
		* To simulate an AVS match, pass 888 in the address1 field, 77777 for zip.
		* To simulate a CVV match, pass 999 in the cvv field.
		*
		* */
    	
    	$transactionid = $_POST['transactionid'];
    	
    	
		
	    	/*
    	 * get the Sale information for the Transaction
    	* */
    	$rowcount = 0;
    	 
    	$sql = "SELECT 
    	time, 
    	ipaddress, 
    	firstname,
    	lastname, 
    	company, 
    	address1, 
    	city, 
    	state, 
    	zip, 
    	country,
    	phone, 
    	fax, 
    	email,     	
     	amount, 
     	tax, 
    	payment, 
    	orderdescription,
    	orderid, 
    	transactionid  
    	FROM `transactions` 
    	WHERE transactionid = $transactionid";

    	 
    	 
    	if ($result=mysqli_query($conn,$sql))
    	{
    		$rowcount=mysqli_num_rows($result);	 
    	}
    	 
    	 
    	if ($rowcount==0) {
    		$process = 0;
    		$message = "No Authorization record found, nothing to process.";
    	
    	} else {
    		 
    		while($row = mysqli_fetch_assoc($result)){
    			

    			$time = $row['time'];

    			$amount = $row['amount'];
    			
    			$tax = $row['tax'];
	    			if($tax==""){
	    				$tax = 0.00;
	    			}
    			$firstname = $row['firstname'];
    			$lastname = $row['lastname'];
    			$company = $row['company'];
    			$address1 = $row['address1'];
    			$city = $row['city'];
    			$state = $row['state'];
    			$zip = $row['zip'];
    			$country = $row['country'];
    			$phone = $row['phone'];
    			$fax = $row['fax'];
    			$email = $row['email'];
    			
    			
    			$payment = $row['payment'];
    			$orderdescription = $row['orderdescription'];
    			$transactionid = $row['transactionid'];
    			$orderid = $row['orderid'];
    			$process = 1;
    			$message = "Process Credit Transaction  #$transactionid";
    		}
    	}// get transaction data
	
	$time = gmdate('YmdHis');
				
		$incoming = array();
		// required fields
		$incoming['type'] = $type;
		$incoming['transactionid'] = $transactionid;
		$incoming['amount'] = $amount;
		$incoming['tax'] = $tax;
		$incoming['payment'] = $payment;
		$incoming['orderid'] = $orderid;		
		$incoming['orderdescription'] = $orderdescription;		
		$incoming['time'] = $time;

		/* user supplied optional data */

		$incoming['firstname'] = $firstname;
		$incoming['lastname'] = $lastname;
		$incoming['company'] = $company;
		$incoming['address1'] = $address1;
		$incoming['city'] = $city;
		$incoming['state'] = $state;
		$incoming['zip'] = $zip;
		$incoming['country'] = $country;
		$incoming['phone'] = $phone;
		$incoming['fax'] = $fax;
		$incoming['email'] = $email;		

		$Payscape = NEW Payscape();
		$result_array = $Payscape->Credit($incoming);

		
	if($result_array['response']==1){
		
			$transactionid = $result_array['transactionid'];		
			$message = "The transaction was successful "; 
		
		
		/* save the submission and transaction details */

/* create a record for the Credit: */
			
		$sql = "INSERT INTO `transactions` (`type`,  
				`time`,    
				`amount`, `tax`, `payment`, `orderdescription`,
				`ipaddress`, `firstname`, 
				`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, 
				`phone`, `fax`, `email`, `orderid`, `transactionid`) 
				VALUES('$type', 
				'$time',  
				$amount, $tax, '$payment', '$orderdescription', 
				'$ipaddress', '$firstname', 
				'$lastname', '$company', '$address1', '$city', '$state', '$zip', '$country',
				'$phone', '$fax', '$email', '$orderid', $transactionid)";
		

	/* if we only want to update the existing sale record: 		
		$sql = "UPDATE transactions SET type = 'credit', amount = $amount WHERE transactionid = $transactionid";
	*/	
		
					if(!mysqli_query($conn, $sql)){
						/* for testing */
						printf("Error: %s\n", mysqli_error($conn));
						$message .= " but could not be saved to the database";
					} else {
						$message .= " and has been Saved to the database.";
					}
	
			
			} else {
				$message = "Transaction has failed.";
			}		
			
			mysqli_close($conn);
									
		// post
    } else {
    	
    	
    	/*
    	 * get the Sale information for the Transaction
    	* */
    	$rowcount = 0;
    	 
    	$sql = "SELECT 
    	time, 
    	ipaddress, 
    	firstname,
    	lastname, 
    	company, 
    	address1, 
    	city, 
    	state, 
    	zip, 
    	country,
    	phone, 
    	fax, 
    	email,     	
     	amount, 
     	tax, 
    	payment, 
    	orderdescription,
    	orderid, 
    	transactionid  
    	FROM `transactions` 
    	WHERE transactionid = $transactionid";

    	 
    	 
    	if ($result=mysqli_query($conn,$sql))
    	{
    		$rowcount=mysqli_num_rows($result);	 
    	}
    	 
    	 
    	if ($rowcount==0) {
    		$process = 0;
    		$message = "No Authorization record found, nothing to process.";
    	
    	} else {
    		 
    		while($row = mysqli_fetch_assoc($result)){
    			

    			$time = $row['time'];

    			$amount = $row['amount'];
    			
    			$tax = $row['tax'];
    			$firstname = $row['firstname'];
    			$lastname = $row['lastname'];
    			$company = $row['company'];
    			$address1 = $row['address1'];
    			$city = $row['city'];
    			$state = $row['state'];
    			$zip = $row['zip'];
    			$country = $row['country'];
    			$phone = $row['phone'];
    			$fax = $row['fax'];
    			$email = $row['email'];
    			
    			
    			$payment = $row['payment'];
    			$orderdescription = $row['orderdescription'];
    			$transactionid = $row['transactionid'];
    			$orderid = $row['orderid'];
    			$process = 1;
    			$message = "Process Credit Transaction  #$transactionid";
    		}
    	}// get transaction data
    	

    	
    	require_once 'includes/credit_form.php';   
    	
  }	// get	

    
 // Credit  
?>		