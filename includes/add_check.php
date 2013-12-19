<?php 


	/* variables for Check Transactions */

	$posturl = 'https://secure.payscapegateway.com/api/transact.php';
	$order_id = 'Test';
	$key = '\!b2#1wu%)4_tUdpAxO|GDWW?20:V.w';		// Replace with your Payscape Key
	$key_id = '449510';
	$type = 'sale';
	$time = gmdate('YmdHis');
	$order_id = 'TestCheck';
	
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	
	$account_ach = '123123123'; // Replace with your Bank Account Number (ACH)
	$routing_ach = '123123123'; // Replace with your Bank Routing Number (ACH)
	$account_holder_type = 'business'; // Replace with your Payscape Account Holder Type (business / personal)
	$account_type = 'checking'; // Replace with your bank account type (checking / savings)
	$checkname = 'Test'; // Replace with the name on your ACH Account
	
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
    	$payment = 'check';
    	$checkname = $_POST['checkname'];
    	$checkaba = $_POST['checkaba'];
    	$checkaccount = $_POST['checkaccount'];
    	$account_holder_type = $_POST['account_holder_type'];
    	$account_type = $_POST['account_type'];
    	$sec_code = 'WEB';
    	
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
    	$hash = md5($order_id|$amount|$time|$key);
    	
	

    	
    	$hash = md5($order_id|$amount|$time|$key);
			
		$incoming = array();
		$incoming['type'] = $type;
		$incoming['key_id'] = $key_id;

		$incoming['time'] = $time;
		$incoming['checkname'] = $checkname;
		$incoming['checkaba'] = $checkaba;
		$incoming['checkaccount'] = $checkaccount;
		$incoming['account_holder_type'] = $account_holder_type;
		$incoming['account_type'] = $account_type;					
		$incoming['amount'] = $amount;			
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
		
		
			
		/* save the submission */
			
		$sql = "INSERT INTO `transactions` (`type`, `key_id`, 
				`hash`, `time`, `checkname`, `checkaba`, 
				`checkaccount`, `account_holder_type`, `account_type`, `sec_code`, 
				`amount`, `payment`, `ipaddress`, `firstname`, 
				`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, 
				`phone`, `fax`, `email`) 
				VALUES('$type', '$key_id',
				'$hash', '$time', '$checkname', '$checkaba', 
				'$checkaccount', '$account_holder_type', '$account_type', '$sec_code',
				$amount, '$payment', '$ipaddress', '$firstname', 
				'$lastname', '$company', '$address1', '$city', '$state', '$zip', '$country',
				'$phone', '$fax', '$email')";
		
	//echo "$sql";
	//exit();	
		
		
		if(!mysqli_query($conn, $sql)){
			printf("Error: %s\n", mysqli_error($conn));
			$message = "The transaction has not been saved.";
		} else {

			$message = "The transaction $time has been saved.";
		}	
		
		mysqli_close($conn);
		
		
		$Payscape = NEW Payscape;
		$output = $Payscape->SaleCheck($incoming);
		
				
				
	//debug($incoming);
	//exit();
				/*
				echo "PAYSCAPE: <br>";
				echo "<pre>";
				print_r($incoming);
				echo "</pre>";
				
				exit();
				*/
				
				
		echo "<br>OUTPUT:<br>";
		print_r($output);
		echo "<pre>";
		

	
	
	/*
	echo "<br>PAYSCAPE:<br>";
	
	echo "<pre>";
		print_r($payscape);
	echo "<pre>";
	exit();
	*/
	
				
			} else {
		    	require_once 'includes/add_cc_form.php';
    		}// method post		
// end add_check		
?>		