<?php 
	/* SCRIPT CREATED AND DISTRIBUTED BY WWW.WEBUNE.COM*/

if(curl_version()){
		$WebuneCurl = curl_version();
		echo '</ul>';
			if($_GET['details']){
				echo '<h1>Full Details:</h1><pre>';
				print_r($WebuneCurl);
				echo '</pre>';
			}else{
				echo '<h1>Contragulations!!</h1> Your have Curl enabled in your PHP.<br><br>';
				echo 'You have version: '.$WebuneCurl['version'].' Iinstalled.<br>These are the protocols your server CURL supports:<br>';
				echo '<ul>';
			/*	
				echo "<pre>";
				print_r($WebuneCurl);
				echo "</pre>";
				exit();
			*/	
				//	for($counter=1; $counter<=17; $counter++) {
					for($counter=0; $counter<=17; $counter++) {
				
						echo '<li>'.$WebuneCurl['protocols'][$counter].'</li>';
					}
					
					echo '</ul>';
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?details=1"> Click Here to see Full Details</a></p>';
			
			}

		}else{
			echo "<h1>ERROR - IT APPEARS YOU DONT HAVE Curl ENABLED ON THIS SERVER</h1>";
		
		}?>
		
		<p>If you need more help on CURL, visit us at <a href="">Webune Support Forums</a><p><p>Script Provided By:<br><a href="http://www.webune.com">
		<img src="http://www.webune.com/images/headers/default_logo.jpg" border="0" /></a>
		</p>