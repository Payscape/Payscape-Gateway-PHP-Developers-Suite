<?php 
/*
* Payscape Class v2.0
* checks for Check or Credit Card transaction
* and sends the relevant data to the Payment API
*
* */



class Payscape
{
					
	var $key 		= '\!b2#I/wu%)4_tUdpAxO|GDWW?20:V.w';		// Replace with your Payscape Key
	var $keyid 		= '449510';				// Replace with your Payscape Key ID
	
	var $url 		= 'https://secure.payscapegateway.com/api/transact.php';
	var $userid 	= 'demo'; 					//Replace with your UserID from Payscape.com
	var $password	= 'password';				//Replace with your Password from Payscape.com
	var $redirect_url	= 'transactions/complete';	//Replace with the URL of your success page;
	var $message = '';
	var $response = array();

	
	/* we are using this to post to the API */
	
	protected function _send($trans){
		
	//	$trans['type'] = 'sale';
		$trans['username'] = $this->userid;
		$trans['password'] = $this->password;
		

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $trans);
			curl_setopt($ch, CURLOPT_REFERER, "");
			$outcome = curl_exec($ch);
			curl_close($ch);		
			unset($ch);

			/*
			echo "<pre>";
			echo "cURL QUERY: ";
			print_r($trans);
			echo "cURL OUTCOME: ";
			
			echo "<br>$outcome";
			*/ 
			
			return $outcome;
			//echo "</pre>";
			
			
}// send


	public function Sale($incoming=null){
		
		$key = $this->key;
		$time = gmdate('YmdHis');
		$type = 'sale';
		
		$amount = (isset($incoming['amount']) ? $incoming['amount'] : '');
		$payment = (isset($incoming['payment']) ? $incoming['payment'] : '');
		
		if($payment=='check'){
//			$required = array('type', 'key_id', 'hash', 'time', 'checkname', 'checkaba', 'checkaccount', 'account_holder_type', 'account_type', 'amount');
			$required = array('type', 'checkname', 'checkaba', 'checkaccount', 'account_holder_type', 'account_type', 'amount');
					
		} else {
		
			//$required = array('type', 'key_id', 'hash', 'time', 'ccnumber', 'ccexp', 'amount');
			$required = array('type', 'ccnumber', 'ccexp', 'amount');
		}		
		
		if(count(array_intersect_key(array_flip($required), $incoming)) === count($required)) {		
		$transactiondata = array();
		$transactiondata['type'] = 'sale';
		$transactiondata['amount'] = urlencode($amount);

		/*
		$transactiondata['type'] = 'sale';
		$transactiondata['key_id'] = $this->keyid;
		$transactiondata['hash'] = $hash;
		$transactiondata['time'] = $time;
		$transactiondata['redirect'] = $this->redirect_url;
		
		$transactiondata['username'] = $this->userid;
		$transactiondata['password'] = $this->password;
		$transactiondata['key'] = $this->key;
		
		$transactiondata['redirect'] = $this->redirect_url;
		*/
		
		/* user supplied required data */
		if($payment=='check'){
			$transactiondata['checkname'] = (isset($incoming['checkname']) ? $incoming['checkname'] : '');
			$transactiondata['checkaba'] = (isset($incoming['checkaba']) ? $incoming['checkaba'] : '');
			$transactiondata['checkaccount'] = (isset($incoming['checkaccount']) ? $incoming['checkaccount'] : '');
			$transactiondata['account_holder_type'] = (isset($incoming['account_holder_type']) ? $incoming['account_holder_type'] : '');
			$transactiondata['account_type'] = (isset($incoming['account_type']) ? $incoming['account_type'] : '');
		} else {
			$transactiondata['ccexp'] = (isset($incoming['ccexp']) ? $incoming['ccexp'] : '');			
			$transactiondata['ccnumber'] = (isset($incoming['ccnumber']) ? $incoming['ccnumber'] : '');
			$transactiondata['cvv'] = (isset($incoming['cvv']) ? $incoming['cvv'] : '');		
		}
		

		
		
		
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
		$transactiondata['orderid'] = (isset($incoming['orderid']) ? $incoming['orderid'] : '');
		

		
/*	
		 echo "TRANSACTIONDATA:";
		echo "<pre>";
		print_r($transactiondata);
		echo "</pre>";
		exit();
*/		
	
		return $this->_send($transactiondata);
	
	} else {
		$response['Message'] = 'Required Values Are Missing';
		$response['error'] = 1;
		return $response;
	}
}// end Sale()

public function SaleCheck($incoming=null){

	$key = $this->key;

	$order_id = (isset($incoming['order_id']) ? $incoming['order_id'] : '');
	//	$amount = (isset($incoming['amount']) ? $incoming['amount'] : '');

	$time = gmdate('YmdHis');

	$type = 'auth';

	$amount = (isset($incoming['amount']) ? $incoming['amount'] : '');
	$payment = 'check';

	if($payment=='check'){
		//			$required = array('type', 'key_id', 'hash', 'time', 'checkname', 'checkaba', 'checkaccount', 'account_holder_type', 'account_type', 'amount');
		$required = array('type', 'checkname', 'checkaba', 'checkaccount', 'account_holder_type', 'account_type', 'amount');
			
	} else {

		//$required = array('type', 'key_id', 'hash', 'time', 'ccnumber', 'ccexp', 'amount');
		$required = array('type', 'ccnumber', 'ccexp', 'amount');
			
	}

	if(count(array_intersect_key(array_flip($required), $incoming)) === count($required)) {
		$transactiondata = array();
		$transactiondata['type'] = 'sale';
		$transactiondata['payment'] = 'check';
		$transactiondata['amount'] = urlencode($amount);


		/*
		 $transactiondata['type'] = 'sale';
		$transactiondata['key_id'] = $this->keyid;
		$transactiondata['hash'] = $hash;
		$transactiondata['time'] = $time;
		$transactiondata['redirect'] = $this->redirect_url;

		$transactiondata['username'] = $this->userid;
		$transactiondata['password'] = $this->password;
		$transactiondata['key'] = $this->key;



		$transactiondata['redirect'] = $this->redirect_url;
		*/

		/* user supplied required data */
		if($payment=='check'){
			$transactiondata['checkname'] = (isset($incoming['checkname']) ? $incoming['checkname'] : '');
			$transactiondata['checkaba'] = (isset($incoming['checkaba']) ? $incoming['checkaba'] : '');
			$transactiondata['checkaccount'] = (isset($incoming['checkaccount']) ? $incoming['checkaccount'] : '');
			$transactiondata['account_holder_type'] = (isset($incoming['account_holder_type']) ? $incoming['account_holder_type'] : '');
			$transactiondata['account_type'] = (isset($incoming['account_type']) ? $incoming['account_type'] : '');
		} else {
			$transactiondata['ccexp'] = (isset($incoming['ccexp']) ? $incoming['ccexp'] : '');
			$transactiondata['ccnumber'] = (isset($incoming['ccnumber']) ? $incoming['ccnumber'] : '');
			$transactiondata['cvv'] = (isset($incoming['cvv']) ? $incoming['cvv'] : '');
		}





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


		/*
		 echo "TRANSACTIONDATA:";
		echo "<pre>";
		print_r($transactiondata);
		echo "</pre>";
		exit();
		*/

		return $this->_send($transactiondata);

	} else {
		$response['Message'] = 'Required Values Are Missing';
		$response['error'] = 1;
		return $response;
	}
}// end SaleCheck()

	
	public function Auth($incoming=null){
		$key = $this->key;
		$time = gmdate('YmdHis');
		$type = 'auth';
		
		$key = $this->key;
		$time = gmdate('YmdHis');
		$type = 'auth';
		
		$amount = (isset($incoming['amount']) ? $incoming['amount'] : '');
		$payment = (isset($incoming['payment']) ? $incoming['payment'] : '');
		
		$required = array('type', 'ccnumber', 'ccexp', 'amount');
		
		if(count(array_intersect_key(array_flip($required), $incoming)) === count($required)) {
			$transactiondata = array();
			$transactiondata['type'] = 'auth';
			$transactiondata['amount'] = urlencode($amount);
		
			/*
				$transactiondata['type'] = 'sale';
			$transactiondata['key_id'] = $this->keyid;
			$transactiondata['hash'] = $hash;
			$transactiondata['time'] = $time;
			$transactiondata['redirect'] = $this->redirect_url;
		
			$transactiondata['username'] = $this->userid;
			$transactiondata['password'] = $this->password;
			$transactiondata['key'] = $this->key;
		
			$transactiondata['redirect'] = $this->redirect_url;
			*/
		
			/* user supplied required data */
			if($payment=='check'){
				$transactiondata['checkname'] = (isset($incoming['checkname']) ? $incoming['checkname'] : '');
				$transactiondata['checkaba'] = (isset($incoming['checkaba']) ? $incoming['checkaba'] : '');
				$transactiondata['checkaccount'] = (isset($incoming['checkaccount']) ? $incoming['checkaccount'] : '');
				$transactiondata['account_holder_type'] = (isset($incoming['account_holder_type']) ? $incoming['account_holder_type'] : '');
				$transactiondata['account_type'] = (isset($incoming['account_type']) ? $incoming['account_type'] : '');
			} else {
				$transactiondata['ccexp'] = (isset($incoming['ccexp']) ? $incoming['ccexp'] : '');
				$transactiondata['ccnumber'] = (isset($incoming['ccnumber']) ? $incoming['ccnumber'] : '');
				$transactiondata['cvv'] = (isset($incoming['cvv']) ? $incoming['cvv'] : '');
			}
		
		
		
		
		
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
			$transactiondata['orderid'] = (isset($incoming['orderid']) ? $incoming['orderid'] : '');
		
		
		
		/*
			 echo "TRANSACTIONDATA:";
			echo "<pre>";
			print_r($transactiondata);
			echo "</pre>";
			exit();
		*/	
		
			return $this->_send($transactiondata);
		
		} else {
			$response['Message'] = 'Required Values Are Missing';
			$response['error'] = 1;
			return $response;
		}		
		
}// end Auth
	
	public function Credit($incoming=null){
		
	}
	
	public function Validate($incoming=null){
		
	}
	
	public function Capture($incoming=null){
		
		$key = $this->key;
		$time = gmdate('YmdHis');
		$type = 'capture';
		
		$required = array('type', 'ccnumber', 'ccexp', 'amount', 'transactionid');
		
		if(count(array_intersect_key(array_flip($required), $incoming)) === count($required)) {
			$transactiondata = array();
			$transactiondata['type'] = 'sale';
			$transactiondata['amount'] = urlencode($amount);
		}
		
	}
	
	public function Void($incoming=null){
		
	}
	
	public function debug($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}	
	
	public function Refund($incoming=null){
		
	}
	
	
	public function Update($incoming=null){
		
	}
	
	
}// end Payscape
?>