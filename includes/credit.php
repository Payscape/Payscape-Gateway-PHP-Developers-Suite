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
		
	$amount = $_POST['amount'];
	$tax = $_POST['tax'];
	$transactionid = $_POST['transactionid'];	
	$payment = $_POST['payment'];
	$orderdescription = $_POST['orderdescription'];

	$ccnumber = $_POST['ccnumber'];
	$ccexp = $_POST['ccexp'];
	$cvv = $_POST['cvv'];			
	
	$orderid = $_POST['orderid'];


	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$company = $_POST['company'];
	$address1 = $_POST['address1'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$country = $_POST['country'];
	$phone = $_POST['phone'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	
	$time = gmdate('YmdHis');
				
		$incoming = array();
		$incoming['type'] = $type;
		$incoming['amount'] = $amount;
		$incoming['tax'] = $tax;
		$incoming['payment'] = $payment;
		$incoming['orderdescription'] = $orderdescription;		
		$incoming['time'] = $time;


		$incoming['ccnumber'] = $ccnumber;
		$incoming['ccexp'] = $ccexp;

		$incoming['orderid'] = $orderid;
		$incoming['transactionid'] = $transactionid;

		/* user supplied optional data */
		$incoming['cvv'] = $cvv;
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
		$response = $Payscape->Credit($incoming);
		
		parse_str($response, $result_array);
		
	if($result_array['response']==1){
		
			$transactionid = $result_array['transactionid'];		
			$message = "The transaction was successful "; 
		
		
		/* save the submission and transaction details */

/* create a unique record for the Credit: */
			
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
    	 * get the Sale information for the Credit Form
    	* */
    	 
    	$sql = "SELECT 
    	time, 
    	ccnumber,
    	ccexp,
    	cvv,
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
    		exit;
    	} else {
    		 
    		while($row = mysqli_fetch_assoc($result)){
    			

    			$time = $row['time'];
    			$ccnumber = $row['ccnumber'];
    			$ccexp = $row['ccexp'];
    			$cvv = $row['cvv'];
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
    	}// get form data
    	
    	require_once 'includes/credit_form.php';   
    	
    	
  }	// get	

    
 // Credit  
?>		