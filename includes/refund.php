<?php 

		/*
		 * Transaction with Payscape Direct Post API PHP Wrapper
		 * Refund Example
		 * */


	$ipaddress = $_SERVER['REMOTE_ADDR'];

			require_once 'classes/Payscape/Payscape.php';
	

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	

	$type = 'refund';
	$amount = $_POST['amount'];

	$transactionid = $_POST['transactionid'];
		if(isset($transactionid)){
			$transactionid = (int) $transactionid;
		}

		/*
		 * get the Sale information for the Refund Form
		*
		* */
		
		$sql = "SELECT id, amount, transactionid, orderid, authcode FROM transactions WHERE `transactionid` = $transactionid";
		
		if ($result=mysqli_query($conn,$sql))
		{
			$rowcount=mysqli_num_rows($result);			
		}
		
		
		if ($rowcount==0) {
			$process = 0;
			$refund_message = "No Authorization record found, nothing to process.";
			exit;
		} else {
		
			while($row = mysqli_fetch_assoc($result)){

		
				$transaction_amount = $row['amount'];
				$process = 1;
				$refund_message = "Process Refund for Transaction  #$transactionid";
			}

		}	


		$incoming = array();
		$incoming['type'] = $type;
		$incoming['transactionid'] = $transactionid;

	if(isset($amount)){
		if($amount < $transaction_amount && $amount != ""){	
			$incoming['amount'] = $amount;
			$refund_amount = $amount;
		} else {
			$refund_amount = $transaction_amount;
		}
	}	

		

		$Payscape = NEW Payscape();
		$response = $Payscape->Refund($incoming);
		
		parse_str($response, $result_array);
		
		if($result_array['response']==1){
			$response_code = $result_array['response'];
			$authtransactionid = $result_array['transactionid'];
			$authcode = $result_array['authcode'];		
			$message = "<br>The Refund was successful"; 
		
		
		/* save the submission and transaction details */
			
		$sql = "UPDATE transactions SET `type` = 'refund', amount = $refund_amount WHERE `transactionid` = $transactionid";
						
						if(!mysqli_query($conn, $sql)){
							/* for testing */
							printf("Error: %s\n", mysqli_error($conn));
							$message .= " but could not be saved to the database";
						} else {
							$message .= " and has been Saved to the database.";
						}
			
			} else {
				$message = "Refund Transaction has failed.";
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
    	
    	
    	if ($result=mysqli_query($conn,$sql))
    	{
    		$rowcount=mysqli_num_rows($result);
    	
    	}
    	
    	
    	if ($rowcount==0) {
    		$process = 0;
    		$message = "No Authorization record found, nothing to process.";
    		exit;
    		
    		$refund_message = "";
    		
    	} else {
    	
    		while($row = mysqli_fetch_assoc($result)){
    			$amount = $row['amount'];
    			$transactionid = $row['transactionid'];
    			$orderid = $row['orderid'];
    			$authcode = $row['authcode'];
    			$process = 1;
    			$message = "Process Refund for Transaction  #$transactionid";
    		}
    	
    	}// get form data
    	
   		require_once 'includes/refund_form.php';
    	
    }// method post
    echo $refund_message;
 
    
 // end refund   
?>