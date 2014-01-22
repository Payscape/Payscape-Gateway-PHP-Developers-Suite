<?php 

		/*
		 * Transaction with Payscape Direct Post API PHP Wrapper
		 * Refund Example
		 * */


	$type = 'void';



	$ipaddress = $_SERVER['REMOTE_ADDR'];


			require_once 'classes/Payscape/Payscape.php';
	

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


	$time = gmdate('YmdHis');
	

	$transactionid = $_POST['transactionid'];
		if(isset($transactionid)){
			$transactionid = (int) $transactionid;
		}

		/*
		 * get the Auth information for the Void Form
		 * */
		
		$sql = "SELECT id, firstname, lastname, company, address1, city, state, zip, country, 
			phone, fax, email, 
		amount, transactionid, orderid, orderdescription,
		authcode FROM transactions WHERE `transactionid` = $transactionid";
		
		if ($result=mysqli_query($conn,$sql))
		{
			$rowcount=mysqli_num_rows($result);				
		}
		
		
		if ($rowcount==0) {
			$process = 0;
			$void_message = "No Authorization record found, nothing to process.";
			exit;
		} else {
		
			while($row = mysqli_fetch_assoc($result)){
				$void_transaction_id = $row['id'];

				$amount = $row['amount'];
				$orderid = $row['orderid'];
				$authcode = $row['authcode'];				
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$company = $row['company'];
				$address1 = $row['address1'];
				$city = $row['city'];
				$state = $row['state'];
				$zip = $row['zip'];
				$country = $row['country'];
				$phone = $row['phone'];
				$fax = $row['fax'];
				$email = $row['email'];
				
				$transactionid = $row['transactionid'];

				$orderdescription = $row['orderdescription'];
				
				$process = 1;
				$void_message = "Process Void for Transaction  #$transactionid";
			}
		}	


		$incoming = array();
		$incoming['type'] = $type;
		$incoming['transactionid'] = $transactionid;
		$incoming['amount'] = $amount;
		

		$Payscape = NEW Payscape();
		$result_array = $Payscape->Void($incoming);


		
		
		if($result_array['response']==1){
			$response_code = $result_array['response'];
			$authtransactionid = $result_array['transactionid'];
			$authcode = $result_array['authcode'];		
			$message = "The Void was successful "; 
		
		
		/* save the submission and transaction details */

			$sql = "INSERT INTO `transactions` (`type`,
			`time`,
			`amount`,
			`ipaddress`, `firstname`,
			`lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`,
			`phone`, `fax`, `email`, `orderdescription`, `orderid`, `authcode`, `transactionid`, `void_transaction_id`)
			VALUES('$type',
			'$time',
			$amount, 
			'$ipaddress', '$firstname',
			'$lastname', '$company', '$address1', '$city', '$state', '$zip', '$country',
			'$phone', '$fax', '$email', '$orderdescription', '$orderid', '$authcode', $transactionid, $void_transaction_id)";
						
						if(!mysqli_query($conn, $sql)){
							/* for testing */
							printf("Error: %s\n", mysqli_error($conn));
							$message .= " but could not be saved to the database";
						} else {
							$message .= " and has been Saved to the database.";		
							$sql_update = "UPDATE `transactions` SET type = 'voided' WHERE id = $void_transaction_id";		
									
							if(!mysqli_query($conn, $sql_update)){

								/* for testing */
								printf("Error: %s\n", mysqli_error($conn));
								$message .= " but the original record could not be updagted";
							} else {
								$message .= " The original transaction has been updated to 'voided'";
							}
						}
			
			} else {
				$message = "Void Transaction has failed.";
			}		
			
			mysqli_close($conn);								

    } else {
    	$transactionid = $_GET['transactionid'];
    	if(isset($transactionid)){
    		$transactionid = (int) $transactionid;
    	}
    	
    	
    	/*
    	 * get the Transaction information for the Void Form
    	 * */
    	
    	$sql = "SELECT id, firstname, lastname, address1, city, state, zip, country, 
			phone, fax, email, amount, transactionid, orderid, authcode FROM transactions WHERE `transactionid` = $transactionid";

    	
    	if ($result=mysqli_query($conn,$sql))
    	{
    		$rowcount=mysqli_num_rows($result);   	
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