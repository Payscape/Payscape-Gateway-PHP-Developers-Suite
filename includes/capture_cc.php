<?php 
	/*
	 * Transaction with Payscape Direct Post API PHP Wrapper
	 * Capture Authorization Example 
	 * */

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
		
	$type = 'capture';
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
		
		if ($result=mysqli_query($conn,$sql))
		{
			$rowcount=mysqli_num_rows($result);
		}
		
		
		if ($rowcount==0) {
			$process = 0;
			$capture_message = "No Authorization record found, nothing to process.";
			exit;
		} else {
		
			while($row = mysqli_fetch_assoc($result)){
				$auth_amount = $row['amount'];
				$transactionid = $row['transactionid'];
				$orderid = $row['orderid'];
				$authcode = $row['authcode'];
				$process = 1;
				$capture_message = "Process Authorization Capture for Transaction  #$transactionid";
			}
		}	

		$incoming = array();
		$incoming['type'] = $type;
		$incoming['transactionid'] = $transactionid;
		
		// required only if Amount is less than Authorized Amount
		if($amount < $auth_amount){
			$incoming['amount'] = $amount; 
		}
		

		$Payscape = NEW Payscape();
		$response = $Payscape->Capture($incoming);
				
		parse_str($response, $result_array);
		
		if($result_array['response']==1){
			$response_code = $result_array['response'];
			$authtransactionid = $result_array['transactionid'];
			$authcode = $result_array['authcode'];		
			$message = "The capture was successful"; 
		
		
		/* update the transaction record with the capture details  */
			
		$sql = "UPDATE transactions SET `capture` = $response_code, type = 'capture' WHERE `transactionid` = $authtransactionid";
		
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
    		$capture_message = "No Authorization record found, nothing to process.";
    		exit;
    	} else {
    	
    		while($row = mysqli_fetch_assoc($result)){
    			$amount = $row['amount'];
    			$transactionid = $row['transactionid'];
    			$orderid = $row['orderid'];
    			$authcode = $row['authcode'];
    			$process = 1;
    			$capture_message = "Process Authorization Capture for Transaction  #$transactionid";
    		}
    	
    	
    	
    	}// get form data
    	
    	
    	
   		require_once 'includes/capture_cc_form.php';
    	
    }// method post		
    echo $capture_message;
    
 // end capture_cc   
?>