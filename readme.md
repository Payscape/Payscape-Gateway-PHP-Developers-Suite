	/*
 	 * Payscape Direct Post API PHP Developers Suite v1.0
 	 *
 	 * Includes examples for all of the methods in the Payscape Direct Post API
 	 *
 	 * The Payscape Class is located in /classes/Payscape
 	 * The examples are located in /includes
 	 *
 	 *
 	 * Configuration: 
 	 * Create the table `transactions` in your database. 
 	 * Import schema/transactions.sql into your database
 	 *
 	 * Edit config.php for your base URL.
 	 * Edit db-config.php for your database credentials.
 	 * 
 	 *
 	 *
	 * Payscape Direct Post API PHP Class v3.0
	 * 
	 * Edit userid: replace with your User ID from your Payscape account
	 * Edit userpass: replace with your Password from your Payscape account
	 * 
	 * 
	 *  /crt/cacert.pem is included so that you may use cURL.
	 *  Place this folder in your root directory 
	 *  	  
	 * 
	 * Sale() detects if your transaction is Credit Card or eCheck and sends the correct params 
	 * 
	 * Payscape Direct Post API PHP Class exposes all of the methods of the Payscape Direct Post API
	 * See Payscape Direct Post API Documentation for complete notes on variables:
	 * 
	 * Direct Post API / Documentation / Transaction Variables
	 * http://payscape.com/developers/direct-post-api.php
	 * 
	 * 
     ** Features **
     * Sale - credit card transaction
     * Sale - eCheck ACH transaction
     * Validate - credit card validation
     * Update - update Shipping Information for a credit card transaction
     * Auth - authorize a credit card tansaction
     * Capture - capture a previously autorized credit card transaction
     * Refund - refund amounts for credit card transaction
     * Credit - credit a credit card transaction
     * Void - void credit card transaction
 	 * 
	 * 
	 * 1/14/2014
	 * 
	 * */