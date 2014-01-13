<?php 
	/*
	 * Transaction with Payscape Direct Post API PHP Wrapper
	 * Credit Card Example 
	 * */


		$type = 'sale';
		$time = gmdate('YmdHis');

		$ipaddress = $_SERVER['REMOTE_ADDR'];

		/* test data */
		$visa = 4111111111111111;
		$mastercard = 5431111111111111;
		$discover = 6011601160116611;
		$american_express = 341111111111111;
		$cc_expire = '1010'; // 10/10
		$cvv = 123;

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
	$tax = $_POST['tax'];
		if($tax==""){
			$tax = 0.00;
		}
	$payment = 'credit card';
	$orderdescription = $_POST['orderdescription'];
	$orderid = $_POST['orderid'];
	
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
		/* required */
		$incoming['type'] = "$type";
		$incoming['amount'] = $amount;
		$incoming['payment'] = 'creditcard';	
		$incoming['ccnumber'] = $ccnumber;
		$incoming['ccexp'] = $ccexp;
		/* optional */
		$incoming['cvv'] = $cvv;
		$incoming['tax'] = $tax;
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
		
			$transactionid = $result_array['transactionid'];		
			$message = "The transaction was successful "; 
		
		
		/* save the submission and transaction details */
			
		$sql = "INSERT INTO `transactions` (`type`, 
				`time`, `amount`, `tax`, `payment`, `orderdescription`,
				`ipaddress`, `firstname`, 
				`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, 
				`phone`, `fax`, `email`, `orderid`, `transactionid`) 
				VALUES('$type', 
				'$time', $amount, $tax, '$payment', '$orderdescription', 
				'$ipaddress', '$firstname', 
				'$lastname', '$company', '$address1', '$city', '$state', '$zip', '$country',
				'$phone', '$fax', '$email', '$orderid', $transactionid)";

							
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
    	
    	require_once 'includes/add_cc_form.php';
    	
    }		
 //   echo $message;
    
 // end add_cc   
?>