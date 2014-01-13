<?php 

	/*
	 * Transaction with Payscape Direct Post API PHP Wrapper
	* Refund Example
	* */


	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$time = gmdate('YmdHis');

			require_once 'classes/Payscape/Payscape.php';
	

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
		
		
		if ($result=mysqli_query($conn,$sql))
		{
			$rowcount=mysqli_num_rows($result);				
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
		$incoming['time'] = $time;
		$incoming['transactionid'] = $transactionid;
		$incoming['orderid'] = $orderid;
		$incoming['tracking_number'] = $tracking_number;
		$incoming['shipping_carrier'] = $shipping_carrier;
		

		$Payscape = NEW Payscape();
		$result_array = $Payscape->Update($incoming);
		
		if($result_array['response']==1){
			$response_code = $result_array['response'];
			$authtransactionid = $result_array['transactionid'];
			$authcode = $result_array['authcode'];		
			$message = "The Update was successful"; 
			
		$sql = "UPDATE transactions SET `shipping_carrier` = '$shipping_carrier', `tracking_number` = '$tracking_number' WHERE `transactionid` = $transactionid";

						
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
    	* */
    	
    	$sql = "SELECT id, amount, transactionid, orderid, authcode, shipping_carrier, tracking_number FROM transactions WHERE `transactionid` = $transactionid";   	
    	
    	if ($result=mysqli_query($conn,$sql)){
    		$rowcount=mysqli_num_rows($result);    	
    	}
    	
    	
    	if ($rowcount==0){
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
    			$shipping_carrier = $row['shipping_carrier'];
    			$tracking_number = $row['tracking_number'];
    			$process = 1;
    			$message = "Process Update for Transaction  #$transactionid";
    		}
    	
    	}// get form data

    	$update_message = "Process Shipping Carrier, Tracking Number Updates for a Transaction";
    	
   		require_once 'includes/update_form.php';
    	
    }// method post	/ get	
    
 // end Update   
?>