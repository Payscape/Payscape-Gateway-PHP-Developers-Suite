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
	$payment = 'credit card';
	$type = 'capture';
	$username = $this->username;
	$password = $this->password;
	

	

		$incoming = array();
		$incoming['type'] = "$type";
		$incoming['amount'] = $amount;
		$incoming['payment'] = 'credit card';
		
		$incoming['username'] = $username;
		$incoming['password'] = $password;
		$incoming['transactionid'] = $transactionid;

		$Payscape = NEW Payscape();
		$response = $Payscape->Capture($incoming);
		
		
		/*
		 echo "<pre>";
		echo "INCOMING: <br>";
		print_r($incoming);
		*/
		
		echo "<br>RESPONSE:<br>";
		print_r($response);
		echo "<pre>";
		//exit();
		
		parse_str($response, $result_array);
		
		echo "<pre>";
		echo "RESULT ARRAY: ";
		print_r($result_array);
		echo "</pre>";
		
	//	exit();
		
		if($result_array['response']==1){
			$response_code = $result_array['response'];
			$authtransactionid = $result_array['transactionid'];
			$authcode = $result_array['authcode'];		
			$message = "The capture was successful "; 
		
		
		/* save the submission and transaction details */
			
		$sql = "UPDATE `transactions`
				SET (`authtransactionid` = $authtransactionid, `capture` = $response_code) 
				WHERE `transactionid` = $transactionid";
		
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
							$message .= " and has been Saved to the database.";
						}
			
			} else {
				$message = "Transaction has failed.";
			}		
			
			mysqli_close($conn);
									

    } else {
    	
   		require_once 'includes/capture_cc_form.php';
    	
    }		
 //   echo $message;
    
 // end capture_cc   
?>		