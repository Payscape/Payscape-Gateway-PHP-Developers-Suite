<?php 

$posturl = 'https://secure.payscapegateway.com/api/transact.php';


$visa = 4111111111111111;
$mastercard = 5431111111111111;
$discover = 6011601160116611;
$american_express = 341111111111111;
$cc_expire = '1025'; // 10/25
$cvv = 123;

$key = '\!b2#Iwu%)4_tUdpAxO|GDWW?20:V.w';		// Replace with your Payscape Key
$key_id = '449510';
$type = 'auth';
$time = gmdate('YmdHis');

$ipaddress = $_SERVER['REMOTE_ADDR'];

$orderid = date('YmdHis') . "TestAuthCC";

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
		
		
			/*
			$data_debug = $_POST;	
		
				echo "<pre>";
					print_r($_POST);
				echo "</pre>";	
				exit();
		*/
	$amount = $_POST['amount'];
	$payment = 'creditcard';
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
	$hash = md5($orderid|$amount|$time|$key);
	
	
/*	
	echo "<br>ORDER ID: $order_id";
	echo "<br>AMOUNT: $amount";
	echo "<br>TIME: $time";
	echo "<br>KEY: $key";
	echo "<br>MD5(order_id|amount|time|): " . md5("$order_id|$amount|$time|$key") . "<br>";


	echo "<br>md5(order_id|amount|time): " . md5("$order_id|$amount|time") . "<br>";
	
	
	
	echo "<br>HASH: $order_id|$amount|$time|$key";
	echo "<br>PREPARED HASH: $hash";
*/			
		$incoming = array();
		$incoming['type'] = "$type";
		$incoming['amount'] = $amount;
		$incoming['payment'] = 'credit card';
		
//		$incoming['key_id'] = $key_id;
//		$incoming['hash'] = $hash;
//		$incoming['time'] = $time;

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
		$incoming['orderid'] = $orderid;

		$Payscape = NEW Payscape();
		$response = $Payscape->Auth($incoming);
		
		
		
		 echo "<pre>";
		echo "INCOMING: <br>";
		print_r($incoming);
		
	
		echo "<br>RESPONSE:<br>";
		print_r($response);
		echo "<pre>";
		
		
		// exit();
		
		parse_str($response, $result_array);
		

		echo "<pre>";
		echo "RESULT ARRAY: ";
		print_r($result_array);
		echo "</pre>";
	
	//	exit();
		
		if($result_array['response']==1){
		
			$transactionid = $result_array['transactionid'];		
			$authcode = $result_array['authcode'];
			$message = "The transaction was successful "; 
		
		
		/* save the submission and transaction details */
			
		$sql = "INSERT INTO `transactions` (`type`, `key_id`, 
				`hash`, `time`, `ccnumber`, `ccexp`,  
				`amount`, `cvv`, `payment`, `ipaddress`, `firstname`, 
				`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, 
				`phone`, `fax`, `email`, `orderid`, `transactionid`, `authcode`) 
				VALUES('$type', '$key_id',
				'$hash', '$time', '$ccnumber', '$ccexp', 
				$amount, '$cvv', '$payment', '$ipaddress', '$firstname', 
				'$lastname', '$company', '$address1', '$city', '$state', '$zip', '$country',
				'$phone', '$fax', '$email', '$orderid', $transactionid, $authcode)";
						/*		
								echo "SQL: <BR>";
										echo "<pre>";
								echo $sql;
										echo "</pre>";
										
								exit();		
						*/
					if(!mysqli_query($conn, $sql)){
						/* for testing */
						printf("Error: %s\n", mysqli_error($conn));
						$message .= " but could not be saved to the database";
					} else {
						$message .= " and Auth has been Saved to the database.";
					}
	
			
			} else {
				$message = "Transaction has failed.";
			}		
			
			
			
			mysqli_close($conn);
									

    } else {
    	
    	require_once 'includes/auth_cc_form.php';
    	
    }		
   //echo $message;
    
 // end auth_cc   
?>		