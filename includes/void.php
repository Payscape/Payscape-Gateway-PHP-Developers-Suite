<?php 

$posturl = 'https://secure.payscapegateway.com/api/transact.php';



$type = 'void';
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
		
		
			/*
			$data_debug = $_POST;	
		
				echo "<pre>";
					print_r($_POST);
				echo "</pre>";	
				exit();
		*/

	$type = 'void';

	$amount = $_POST['amount'];

	$transactionid = $_POST['transactionid'];
		if(isset($transactionid)){
			$transactionid = (int) $transactionid;
		}

		/*
		 * get the Auth information for the Capture Form
		*
		* */
		
		$sql = "SELECT id, amount, transactionid, orderid, authcode FROM transactions WHERE `transactionid` = $transactionid";
		/*
		 echo "SQL: <br>";
		echo $sql;
		exit();
		*/
		
		
		if ($result=mysqli_query($conn,$sql))
		{
			// Return the number of rows in result set
			$rowcount=mysqli_num_rows($result);
			//	printf("Result set has %d rows.\n",$rowcount);
				
		}
		
		
		if ($rowcount==0) {
			$process = 0;
			$void_message = "No Authorization record found, nothing to process.";
			exit;
		} else {
		
			while($row = mysqli_fetch_assoc($result)){

				$transactionid = $row['transactionid'];
				$process = 1;
				$void_message = "Process Void for Transaction  #$transactionid";
			}
		
		
		
		}	


		

		$incoming = array();
		$incoming['type'] = $type;
		$incoming['transactionid'] = $transactionid;

		

		$Payscape = NEW Payscape();
		$response = $Payscape->Void($incoming);
		
		
		
		echo "<pre>";
		echo "INCOMING 71: <br>";
		print_r($incoming);
		
		
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
			$message = "The Void was successful "; 
		
		
		/* save the submission and transaction details */
			
		$sql = "UPDATE transactions SET `type` = 'void' WHERE `transactionid` = $authtransactionid";
		
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
    	$transactionid = $_GET['transactionid'];
    	if(isset($transactionid)){
    		$transactionid = (int) $transactionid;
    	}
    	
    	
    	/*
    	 * get the Transaction information for the Void Form
    	*
    	* */
    	
    	$sql = "SELECT id, amount, transactionid, orderid, authcode FROM transactions WHERE `transactionid` = $transactionid";
    	/*
    	 echo "SQL: <br>";
    	echo $sql;
    	exit();
    	*/
    	
    	
    	if ($result=mysqli_query($conn,$sql))
    	{
    		// Return the number of rows in result set
    		$rowcount=mysqli_num_rows($result);
    		//	printf("Result set has %d rows.\n",$rowcount);
    	
    	}
    	
    	
    	if ($rowcount==0) {
    		$process = 0;
    		$void_message = "No Authorization record found, nothing to process.";
    		exit;
    	} else {
    	
    		while($row = mysqli_fetch_assoc($result)){
    			$auth_amount = $row['amount'];
    			$transactionid = $row['transactionid'];
    			$orderid = $row['orderid'];
    			$authcode = $row['authcode'];
    			$process = 1;
    			$void_message = "Process Void for Transaction  #$transactionid";
    		}
    	
    	
    	
    	}// get form data
    	
    	
    	
   		require_once 'includes/void_form.php';
    	
    }// method post		
    echo $void_message;
    
 // end void   
?>