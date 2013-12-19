<?php 
class PayscapeComponent
{

	var $key 		= '\!b2#1wu%4_tUdpAxO|GDWW?20:V.w';		// Replace with your Payscape Key
	var $keyid 		= '449510';				// Replace with your Payscape Key ID
	
	var $url 		= 'https://secure.payscapegateway.com/api/transact.php';
	var $userid 	= 'demo'; 					//Replace with your UserID from Payscape.com
	var $password	= 'password';				//Replace with your Password from Payscape.com
	var $redirect_url	= 'transactions/complete';	//Replace with the URL of your success page;
	
	var $account_ach = '123123123'; // Replace with your Bank Account Number (ACH)	
	var $routing_ach = '123123123'; // Replace with your Bank Routing Number (ACH)
	var $account_holder_type = 'business'; // Replace with your Payscape Account Holder Type (business / personal)
	var $account_type = 'checking'; // Replace with your bank account type (checking / savings)
	var $checkname = 'Test'; // Replace with the name on your ACH Account

	//protected function send($transactiondata){
	public function send($transactiondata){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $transactiondata);

		$output = curl_exec($ch);
		
		curl_close($ch);
		debug($ch);
		return $output;
	}
	

	
	public function Sale($incoming=null){
			
		$time = gmdate('YmdHis');
		$type = 'sale';
		
		$amount = $incoming['amount'];
		
		$order_id = 'Test';
		$hash = md5($order_id|$amount|$time|$this->key);

		
		// check for required fields
		$required = array('ccnumber', 'ccexp', 'amount');
		

		
	if(count(array_intersect_key(array_flip($required), $incoming)) === count($required)) {
	
		
		$transactiondata = array();
		$transactiondata['username'] = $this->userid;
		$transactiondata['password'] = $this->password;
		$transactiondata['type'] = 'sale';
		$transactiondata['key'] = $this->key;
		$transactiondata['key_id'] = $this->keyid;
		$transactiondata['payment'] = $this->payment;
		
		$transactiondata['account_holder_type'] = $this->account_holder_type;
		$transactiondata['account_type'] = $this->account_type;
		$transactiondata['checkname'] = $this->checkname;
		$transactiondata['checkaccount'] = $this->account_ach;
		$transactiondata['checkaba'] = $this->routing_ach;
		
		$transactiondata['hash'] = $hash;
		$transactiondata['time'] = $time;
		$transactiondata['redirect'] = $this->redirect_url;
		$transactiondata['username'] = $this->userid;
		$transactiondata['password'] = $this->password;
		$transactiondata['type'] = $type;
		$transactiondata['redirect'] = $this->redirect_url;
		
		
		/* user supplied required data */
		
		$transactiondata['ccnumber'] = (isset($incoming['ccnumber']) ? $incoming['ccnumber'] : '');
		$transactiondata['ccexp'] = (isset($incoming['ccexp']) ? $incoming['ccexp'] : '');
		$transactiondata['amount'] = (isset($incoming['amount']) ? $incoming['amount'] : '');
		
		/* user supplied optional data */
		
		$transactiondata['firstname'] = (isset($incoming['firstname']) ? $incoming['firstname'] : '');
		$transactiondata['lastname'] = (isset($incoming['lastname']) ? $incoming['lastname'] : '');
		$transactiondata['company'] = (isset($incoming['company']) ? $incoming['company'] : '');
		$transactiondata['address1'] = (isset($incoming['address1']) ? $incoming['address1'] : '');
		$transactiondata['city'] = (isset($incoming['city']) ? $incoming['city'] : '');
		$transactiondata['state'] = (isset($incoming['state']) ? $incoming['state'] : '');
		$transactiondata['zip'] = (isset($incoming['zip']) ? $incoming['zip'] : '');
		$transactiondata['country'] = (isset($incoming['country']) ? $incoming['country'] : '');
		$transactiondata['phone'] = (isset($incoming['phone']) ? $incoming['phone'] : '');
		$transactiondata['fax'] = (isset($incoming['fax']) ? $incoming['fax'] : '');
		$transactiondata['email'] = (isset($incoming['email']) ? $incoming['email'] : '');
		$transactiondata['cvv'] = (isset($incoming['cvv']) ? $incoming['cvv'] : '');
	/*	
		echo "DATA:";
		echo "<pre>";
		print_r($transactiondata);
		echo "</pre>";
		exit();
	*/	
		return $Payscape->send($transactiondata);


			} else {
				
		    $response['Message'] = 'Required Values Are Missing';
		    $response['error'] = 1;
			return $response;
		}// count array
		
		
		
	}
	
	
	public function Auth($incoming=null){
		
	}
	
	public function Credit($incoming=null){
		
	}
	
	public function Validate($incoming=null){
		
	}
	
	public function Capture($incoming=null){
		
	}
	
	public function Void($incoming=null){
		
	}
	
	public function Refund($incoming=null){
		
	}
	
	
	public function Update($incoming=null){
		
	}
	
	
}// end Payscape
