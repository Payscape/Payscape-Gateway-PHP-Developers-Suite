<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		/* test data */
		
		$username = 'demo';
		$password = 'password';
		$posturl = 'https://secure.payscapegateway.com/api/transact.php';
		$order_id = 'Test';
		
		$visa = 4111111111111111;
		$mastercard = 5431111111111111;
		$discover = 6011601160116611;
		$american_express = 341111111111111;
		$cc_expire = '1025'; // 10/25
		
		// $cvv
				
		/* triggers */
		
		/*
		 * To cause a declined message, pass an amount less than 1.00.
		* To trigger a fatal error message, pass an invalid card number.
		* To simulate an AVS match, pass 888 in the address1 field, 77777 for zip.
		* To simulate a CVV match, pass 999 in the cvv field.
		*
		* */
		
		
	//	$this->set(compact('visa', 'mastercard', 'discover', 'american_express', 'cc_expire', 'account_ach', 'routing_ach'));

		

			

			/* for testing 
			
			$data_debug = $this->request->data;	
		
				echo "<pre>";
					print_r($data_debug);
				echo "</pre>";	
		
			exit();
			
			*/
			
			
			$incoming = array();
			$incoming['amount'] = $this->request->data['Transaction']['amount'];
			
			
	/* credit card or check transactions */		
			$payment_code = $this->request->data['Transaction']['payment'];
				
			if($payment_code==0){
				
				$payment = 'credit card';
				$incoming['ccexp'] = $this->request->data['Transaction']['ccexp'];
				$incoming['ccnumber'] = $this->request->data['Transaction']['ccnumber'];
				$incoming['cvv'] = $this->request->data['Transaction']['cvv'];
				
			} else {
				$payment = 'check';
				$incoming['checkaba'] = $this->request->data['checkaba'];
				$incoming['checkaccount'] = $this->request->data['checkaccount'];
				$incoming['account_holder_type'] = $this->request->data['account_holder_type'];
				$incoming['account_type'] = $this->request->data['account_type'];
				
			}
				
		$incoming['payment'] = $payment;
			
					
		$incoming['firstname'] = $this->request->data['Transaction']['firstname'];
		$incoming['lastname'] = $this->request->data['Transaction']['lastname'];
		$incoming['company'] = $this->request->data['Transaction']['company'];
		
		$incoming['address1'] = $this->request->data['Transaction']['address1'];
		$incoming['city'] = $this->request->data['Transaction']['city'];
		$incoming['state'] = $this->request->data['Transaction']['state'];
		$incoming['zip'] = $this->request->data['Transaction']['zip'];
		$incoming['country'] = $this->request->data['Transaction']['country'];
		$incoming['phone'] = $this->request->data['Transaction']['phone'];
		$incoming['fax'] = $this->request->data['Transaction']['fax'];
		$incoming['email'] = $this->request->data['Transaction']['email'];
		
		
			
		/*
		 * save the submission
		 * */		
			
			$this->Transaction->create();
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction has been saved.'));
				
	//debug($incoming);
	//exit();
				/*
				echo "PAYSCAPE: <br>";
				echo "<pre>";
				print_r($incoming);
				echo "</pre>";
				
				exit();
				*/
				
				
				

	$payscape = $this->Payscape->Sale($incoming);
	
	/*
	echo "<br>PAYSCAPE:<br>";
	
	echo "<pre>";
		print_r($payscape);
	echo "<pre>";
	exit();
	*/
	

				
				$this->Session->setFlash(__($payscape));
		//		return $this->redirect(array('action' => 'index'));
				
			} else {				
				$message = 'The transaction could not be saved. Please, try again.';
			}
	

    } else {
    	require_once 'includes/add_form.php';
    }		
		
?>		