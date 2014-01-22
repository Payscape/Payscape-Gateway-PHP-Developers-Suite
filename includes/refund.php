<?php 

		/*
		 * Transaction with Payscape Direct Post API PHP Wrapper
		 * Refund Example
		 * */


	$ipaddress = $_SERVER['REMOTE_ADDR'];

			require_once 'classes/Payscape/Payscape.php';
	

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	
// required fields for the Refund transaction
	$type = 'refund';
	$amount = $_POST['amount'];

	$transactionid = $_POST['transactionid'];
		if(isset($transactionid)){
			$transactionid = (int) $transactionid;
		}
		
		/*
		 * get the Sale information of the original transaction
		*
		* */
		
//		$sql = "SELECT id, amount, transactionid, orderid, authcode FROM transactions WHERE `transactionid` = $transactionid";

		$sql = "SELECT
		id,
		amount,
		tax,
		payment,
		ipaddress,
		firstname,
		lastname,
		company,
		address1,
		city,
		state,
		zip,
		country,
		phone,
		fax,
		email,
		transactionid, 
		orderdescription,
		orderid,
		authcode,
		transactionid
		FROM `transactions`
		WHERE transactionid = $transactionid";		
		
		
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
// optional fields for the refund record
				

				$auth_amount = $row['amount'];
				$refund_transactionid = $row['transactionid'];
				$tax = $row['tax'];
				$ipaddress = $row['ipaddress']; 
				$tax = $row['tax'];
				
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
				 
				 
			
				$orderdescription = $row['orderdescription'];
				$authcode = $row['authcode'];
				$orderid = $row['orderid'];

			
				$transaction_amount = $row['amount'];
				$process = 1;
				$refund_message = "Process Refund for Transaction  #$transactionid";
			}

		}	

// required fields for the Refund transaction
		$incoming = array();
		$incoming['type'] = $type;
		$incoming['transactionid'] = $transactionid;

	if(isset($amount)){
		if(($amount < $auth_amount) && ($amount != "")){	
			$incoming['amount'] = $amount;
			$refund_amount = $amount;
		} else {
			$refund_amount = $auth_amount;
			$incoming['amount'] = $auth_amount;
		}
	}	
		
echo "<pre>INCOMING: ";
print_r($incoming);
echo "</pre>";


		$Payscape = NEW Payscape();
		$result_array = $Payscape->Refund($incoming);

echo "<pre>RESULT ARRAY: ";
print_r($result_array);
echo "</pre>";
		
		if($result_array['response']==1){
			$response_code = $result_array['response'];
			$authtransactionid = $result_array['transactionid'];
			$authcode = $result_array['authcode'];		
			$message = "<br>The Refund was successful"; 
		
// create a record for the Refund transaction

		$time = gmdate('YmdHis');
			
		$sql = "INSERT INTO `transactions` (`type`,
		`time`, `amount`, `tax`, `orderdescription`,
		`ipaddress`, `firstname`, `lastname`, `company`, 
		`address1`, `city`, `state`, `zip`, `country`,
		`phone`, `fax`, `email`,`orderid`, `transactionid`, 
		`authcode`, `refund_transactionid`)
		VALUES('$type',
		'$time', $amount, $tax, '$orderdescription',
		'$ipaddress', '$firstname', '$lastname', '$company', 
		'$address1', '$city', '$state', '$zip', '$country',
		'$phone', '$fax', '$email', '$orderid', $authtransactionid, 
		'$authcode', $transactionid)";					
		
						
						if(!mysqli_query($conn, $sql)){
							/* for testing */
							printf("Error: %s\n", mysqli_error($conn));
							$message .= " but could not be saved to the database";
						} else {
							$message .= " and has been Saved to the database.";
							
							$id = $row['id'];
							$sql_update = "UPDATE transactions SET type = 'refunded' WHERE id = $id";
							if(!mysqli_query($conn, $sql)){
								/* for testing */
								printf("Error: %s\n", mysqli_error($conn));
								$message .= " but the original record could not be Updated in the database";
							} else {
								$message .= " and the original record has been Updated in the database";
							}
						}
			
			} else {
				$message = "Refund Transaction has failed.";
			}		
			
			mysqli_close($conn);
			
			$process = 2;

    } else {
    	$transactionid = $_GET['transactionid'];
    	if(isset($transactionid)){
    		$transactionid = (int) $transactionid;
    		
    		$process = 1;
    	}
    	
    	
    	/*
    	 * get the Transaction information for the Refund Form
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