<?php 

	/*
	 *  Transaction with Payscape Direct Post API PHP Wrapper
	 * eCheck Example 
	 * */
	

	$type = 'sale';
	$time = gmdate('YmdHis');
	
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	
	/* test data */
	
	$account_ach = '123123123'; 
	$routing_ach = '123123123';
	$account_holder_type = 'business'; 
	$account_type = 'checking'; 
	$checkname = 'Test'; 

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
		
		
// required fields
    	$amount = $_POST['amount'];
    	$payment = 'check';
    	$checkname = $_POST['checkname'];
    	$checkaba = $_POST['checkaba'];
    	$checkaccount = $_POST['checkaccount'];
    	$account_holder_type = $_POST['account_holder_type'];
    	$account_type = $_POST['account_type'];
    	$sec_code = 'WEB';

// optional fields
		$tax = 0.00;
	
		$orderid = $_POST['orderid'];
		$orderdescription = $_POST['orderdescription'];
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
    //	$hash = md5($orderid|$amount|$time|$key);
			
		$incoming = array();
		$incoming['type'] = $type;
	

		$incoming['time'] = $time;
		$incoming['checkname'] = $checkname;
		$incoming['checkaba'] = $checkaba;
		$incoming['checkaccount'] = $checkaccount;
		$incoming['account_holder_type'] = $account_holder_type;
		$incoming['account_type'] = $account_type;					
		$incoming['amount'] = $amount;	
		$incoming['tax'] = $tax;
		$incoming['sec_code'] = $sec_code;	
		$incoming['payment'] = 'check';
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
		$incoming['orderid'] = $orderid;		
		
		$Payscape = NEW Payscape();
		$result_array = $Payscape->Sale($incoming);	

					if($result_array['response']==1){
						
						$message = "The transaction was successful ";
						$transactionid = $result_array['transactionid'];
						
					/* save the submission */
						
					$sql = "INSERT INTO `transactions` (`type`, 
							`time`, `account_holder_type`, `account_type`, `sec_code`, 
							`amount`, `tax`, `payment`, `ipaddress`, `firstname`, 
							`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, 
							`phone`, `fax`, `email`, `orderid`, `transactionid`) 
							VALUES('$type',
							'$time', '$account_holder_type', '$account_type', '$sec_code',
							$amount, $tax, '$payment', '$ipaddress', '$firstname', 
							'$lastname', '$company', '$address1', '$city', '$state', '$zip', '$country',
							'$phone', '$fax', '$email', '$orderid', $transactionid)";
	
								if(!mysqli_query($conn, $sql)){
									printf("Error: %s\n", mysqli_error($conn));
						
									$message .= " but could not be saved to the database";
								} else {
						
									$message .= "and has been saved to the database.";
								}	
							
							} else {
								$message = "Transaction has failed.";
							}
								
							mysqli_close($conn);
				
			} else {
		    	require_once 'includes/add_check_form.php';
    		}// method post	

    	//	echo $message;
    		
// end add_check		
?>		