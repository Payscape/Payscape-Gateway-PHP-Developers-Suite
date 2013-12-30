<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $posturl = 'https://secure.payscapegateway.com/api/transact.php';
    $order_id = 'Test';
	
	$visa = 4111111111111111;
	$mastercard = 5431111111111111;
	$discover = 6011601160116611;
	$american_express = 341111111111111;
	$cc_expire = '1025'; // 10/25
	$cvv = 123;
	
	$orderid = date('YmdHis') . 'Test';
    	
				
		/* triggers */
		
		/*
		 * To cause a declined message, pass an amount less than 1.00.
		* To trigger a fatal error message, pass an invalid card number.
		* To simulate an AVS match, pass 888 in the address1 field, 77777 for zip.
		* To simulate a CVV match, pass 999 in the cvv field.
		*
		* */
		
		

			/* for testing 
			
			$data_debug = $this->request->data;	
		
				echo "<pre>";
					print_r($data_debug);
				echo "</pre>";	
		
			exit();
			
			*/
			
			
		$incoming = array();
		$incoming['amount'] = $_POST['amount'];
			
			
	/* credit card or check transactions */		
			$payment_code = $_POST['payment'];
				
				
		$incoming['payment'] = 'credit card';
		$incoming['ccexp'] = $_POST['ccexp'];
		$incoming['ccnumber'] = $_POST['ccnumber'];
		$incoming['cvv'] = $_POST['cvv'];
					
		$incoming['firstname'] = $_POST['firstname'];
		$incoming['lastname'] = $_POST['lastname'];
		$incoming['company'] = $_POST['company'];
		
		$incoming['address1'] = $_POST['address1'];
		$incoming['city'] = $_POST['city'];
		$incoming['state'] = $_POST['state'];
		$incoming['zip'] = $_POST['zip'];
		$incoming['country'] = $_POST['country'];
		$incoming['phone'] = $_POST['phone'];
		$incoming['fax'] = $_POST['fax'];
		$incoming['email'] = $_POST['email'];
		$incoming['orderid'] = $orderid;
		
		$Payscape = NEW Payscape;
		$response = $this->Payscape->Sale($incoming);
		/*
		echo "<pre>";
		echo "RESULT: ";
		print_r($result);
		
		echo "MESSAGE: ";
		echo $message;
		
		echo "</pre>";
		*/
		if($response['response']===1){
		
			$transactionid = $response['transactionid'];
			
		/* save the submission */
			
		$sql = "INSERT INTO `transactions` (`id`, `type`, `key_id`, 
				`hash`, `time`, `ccnumber`, `ccexp`, `checkname`, `checkaba`, 
				`checkaccount`, `account_holder_type`, `account_type`, `sec_code`, 
				`processor_id`, `amount`, `cvv`, `payment`, `ipaddress`, `firstname`, 
				`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, 
				`phone`, `fax`, `email`, `orderid`, `transactionid`) 
				VALUES($type, $key_id,
				$hash, $time, $ccnumber, $ccexp, $checkname, $checkaba, 
				$checkaccount, $account_holder_type, $account_type, $sec_code,
				$processor_id, $amount, $cvv, $payment, $ipaddress, $firstname, 
				$lastname, $company, $address1, $city, $state, $zip, $country,
				$phone, $fax, $email, $orderid, $transactionid)";
		
		mysqli_query($conn, $sql);
		
		mysqli_close($conn);
		
			$message = "The transaction was successful and has been Saved to the database.";								
				
				
	//debug($incoming);
	//exit();
				/*
				echo "PAYSCAPE: <br>";
				echo "<pre>";
				print_r($incoming);
				echo "</pre>";
				
				exit();
				*/
				
		} else {
			$message = "Transaction has failed.";
		}		
				

	

			
	

    } else {
    	require_once 'includes/add_cc_form.php';
    }		
		
?>		