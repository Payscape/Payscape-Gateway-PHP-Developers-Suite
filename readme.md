
#Payscape Gateway PHP Developers Suite#
Rapid eCommerce development with PHP and the Payscape Gateway.
Includes examples for all of the methods in the Payscape Gateway API 
and their success responses. 

Functions, scripts and Forms are included to assist your development
Built with the latest release of Twitter Bootstrap for Responsive web development.
Database schema included builds the table that saves transactions and their details.

## Requirements
* PHP 5.2.8 or greater
* Database server in one of these flavors *mySQL, PostgreSQL, Microsoft SQL Server or SQLite*
* cURL 

## Database
Import schema/transactions.sql into your database
 	  
	
##Payscape Gateway PHP Class
The Payscape PHP Class is located in the /classes/Payscape folder	  
See the readme.md file in the Payscape PHP Class folder for examples of the methods available in the Payscape Gateway

## cURL notes	  
/webroot/crt/cacert.pem is included so that you may use cURL. 
You may also download this file at the cURL website http://curl.haxx.se/ca/cacert.pem 
	 
	
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
 	  
1/15/2014