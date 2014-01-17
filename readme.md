
#Payscape Gateway PHP Developers Suite
* Rapid eCommerce development with PHP and the Payscape Gateway.
* Includes examples for all of the transactions available in the Payscape Gateway Direct Post API and their success responses. 
* Functions, Scripts and Forms are included to get you up and running quickly.
* Built with the latest release of Twitter Bootstrap for Responsive Web Development.
* The Database Schema included builds the table that saves your transactions and their details.

## Requirements
* PHP 4, 5
* cURL
* Database server in one of these flavors 
*mySQL, 
PostgreSQL, 
Microsoft SQL Server or 
SQLite*

##Installation

## Database set up
* Import schema/transactions.sql into your database
* The functions in /includes are set up to post transaction data to the transactions table. 	  

##Configuration
* Edit db-configuration.php with your database information.
* Edit config.php to set the base url for your app. 
* Edit /classes/Payscape/Payscape.php with your Payscape username and password

	
##Payscape Gateway PHP Class v3.0
* The Payscape PHP Class is located in the /classes/Payscape folder	  
* See the readme.md file in the Payscape PHP Class folder /classes/Payscape for examples of the transactions available in the Payscape Gateway

## cURL notes	  
* /webroot/crt/cacert.pem is included so that you may use cURL. 
* You may also download this file at the cURL website http://curl.haxx.se/ca/cacert.pem 
	 
	
##Features	  
* Sale() detects if your transaction is Credit Card or eCheck and sends the correct params 
* Payscape Gateway PHP Class exposes all of the methods of the Payscape NMI API
* See Payscape Direct Post API Documentation for complete notes on variables: http://payscape.com/developers/direct-post-api.php *Direct Post API / Documentation / Transaction Variables*
	  
## Transactions available
* Sale - credit card transaction
* Sale - eCheck ACH transaction
* Validate - credit card validation
* Update - update Shipping Information for a credit card transaction
* Auth - authorize a credit card tansaction
* Capture - capture a previously autorized credit card transaction
* Refund - refund amounts for credit card transaction
* Credit - credit a credit card transaction
* Void - void credit card transaction

* See */classes/Payscape/readme.md* for examples of each of the transaction methods.
 	  
1/15/2014