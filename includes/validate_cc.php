<?php 

	/*
	* Transaction with Payscape Direct Post API PHP Wrapper
	* Credit Example
	* */

	$type = 'validate';
	$time = gmdate('YmdHis');
	
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
		
	$payment = 'credit card';
	$ccnumber = $_POST['ccnumber'];
	$ccexp = $_POST['ccexp'];

	$cvv = $_POST['cvv'];
	
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
		$incoming['type'] = "$type";
		
		$incoming['payment'] = 'credit card';
		
		$incoming['time'] = $time;

		$incoming['ccnumber'] = $ccnumber;
		$incoming['ccexp'] = $ccexp;
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
		$result_array = $Payscape->Validate($incoming);
		
		if($result_array['response']==1){
		
			$transactionid = $result_array['transactionid'];		
			$message = "The transaction was successful "; 
		
		
		/* save the submission and transaction details */
			
		$sql = "INSERT INTO `transactions` (`type`, `time`,   
				`payment`, `ipaddress`, `firstname`, 
				`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, 
				`phone`, `fax`, `email`, `transactionid`) 
				VALUES('$type', '$time', 
				'$payment', '$ipaddress', '$firstname', 
				'$lastname', '$company', '$address1', '$city', '$state', '$zip', '$country',
				'$phone', '$fax', '$email', $transactionid)";
						
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
									
    } else {
    	
    	require_once 'includes/validate_cc_form.php';
    	
    }		
 //   echo $message;
    
 // end add_cc   
?>		