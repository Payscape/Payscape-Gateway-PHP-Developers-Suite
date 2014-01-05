<?php 




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

	$type = 'update';
	$shipping_carrier = $_POST['shipping_carrier'];
	$tracking_number = $_POST['tracking_number'];
	$orderid = $_POST['orderid'];
	$transactionid = $_POST['transactionid'];
	
		if(isset($transactionid)){
			$transactionid = (int) $transactionid;
		}

		/*
		 * get the Sale information for the Update Form
		*
		* */
		
		$sql = "SELECT id, transactionid, orderid, time FROM transactions WHERE `transactionid` = $transactionid";
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
			$update_message = "No Authorization record found, nothing to process.";
			exit;
		} else {
		
			while($row = mysqli_fetch_assoc($result)){

				$transactionid = $row['transactionid'];
				$orderid = $row['orderid'];
				$time = $row['time'];
				$process = 1;
				$update_message = "Process Update for Transaction  #$transactionid";
			}

		}	


		$incoming = array();
		$incoming['type'] = $type;
	//	$incoming['time'] = $time;
		$incoming['transactionid'] = $transactionid;
		$incoming['orderid'] = $orderid;
		$incoming['tracking_number'] = $tracking_number;
		$incoming['shipping_carrier'] = $shipping_carrier;
		

		$Payscape = NEW Payscape();
		$response = $Payscape->Update($incoming);
		
		
		
		echo "<pre>";
		echo "INCOMING 101: <br>";
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
			$message = "The Update was successful "; 
		
		
		/* save the submission and transaction details */
			
		$sql = "UPDATE transactions SET `shipping_carrier` = '$shipping_carrier', `tracking_number` = '$tracking_number' WHERE `transactionid` = $transactionid";
		
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
				$message = "Update Transaction has failed.";
			}		
			
			mysqli_close($conn);
									

    } else {
    	$transactionid = $_GET['transactionid'];
    	if(isset($transactionid)){
    		$transactionid = (int) $transactionid;
    	}
    	
    	
    	/*
    	 * get the Transaction information for the Update Form
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
    		$message = "No Authorization record found, nothing to process.";
    		exit;
    		
    		$update_message = "";
    		
    	} else {
    	
    		while($row = mysqli_fetch_assoc($result)){
    			$amount = $row['amount'];
    			$transactionid = $row['transactionid'];
    			$orderid = $row['orderid'];
    			$authcode = $row['authcode'];
    			$process = 1;
    			$message = "Process Update for Transaction  #$transactionid";
    		}
    	
   
    	
    	}// get form data
    	
    /*	
    	echo "<br>ORDER ID: $orderid";
    	echo "<br>Transaction ID: $transactionid";
    	echo "<br>Authcode: $authcode";
    */	
    	$update_message = "Process Updates for a Transaction";
    	
   		require_once 'includes/update_form.php';
    	
    }// method post	/ get	

    
 //   echo $message
    
 // end Update   
?>