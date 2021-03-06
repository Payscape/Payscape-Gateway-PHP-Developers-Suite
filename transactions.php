<?php 
	


	require_once 'config.php';
	require_once 'db-config.php';
	


		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			$action = $_POST['action'];
			

	
			switch ($action){
				case "add-cc":
					$paymentselect = "credit card";
					$required = "add_cc.php";
					break;
				case "add-check":
					$paymentselect = "check";
					$required = "add_check.php";
					break;
				case "credit":
					$paymentselect = "credit";
					$required = "credit.php";
					break;							
				case "auth-cc":
					$paymentselect = "auth";
					$required = "auth_cc.php";
					break;
				case "validate-cc":
					$paymentselect = "validate";
					$required = "validate_cc.php";
					break;					
				case "auth-check":
					$paymentselect = "auth";
					$required = "auth_check.php";
					break;
				case "capture-cc":
					$paymentselect = "capture_cc";
	
					$required = "capture_cc.php";
					break;
					
				case "void":
					// used for transactions that have not been settled
					$paymentselect = "void";
			
					$required = "void.php";
					break;

				case "refund":
					// used for settled transactions
					$paymentselect = "refund";
			
					$required = "refund.php";
					break;
							
					
				case "update":
					$paymentselect = "update";
			
					$required = "update.php";
					break;		
			}			
		
			
		} else {
				if(!isset($_GET['action'])){
			
				
					header("Location: $base_url . 'transactions.php?action=index'");
				} else {
					
					$action = $_GET['action'];
		
					switch ($action){
						case "add-cc":
							$paymentselect = "credit card";
							$required = "add_cc_form.php";
							$message = "New Credit Card Transaction";
							break;
						case "validate-cc":	
							$paymentselect = "credit card";
							$required = "validate_cc_form.php";
							$message = "Validate Credit Card Transaction";
							break;
						case "add-check":
							$paymentselect = "check";
							$required = "add_check_form.php";
							$message = "New eCheck Transaction";
							break;
						case "auth-cc":
							$paymentselect = "auth";
							$required = "auth_cc_form.php";
							$message = "New Auth CC Transaction";
							break;
						case "auth-check":
							$paymentselect = "auth";
							$required = "auth_check_form.php";
							$message = "New Auth Check Transaction";
							break;							
						case "capture":
							$paymentselect = "capture";
							$required = "capture_cc.php";
							$transactionid = $_GET['transactionid'];
							$capture_message = "Capture Transaction";
							$process = 1;

							break; 
							
						case "credit":
							$paymentselect = "credit";
							$required = "credit.php";
							$transactionid = $_GET['transactionid'];
							$message = "Credit Transaction";
							
							break;
								
						case "void":
							$paymentselect = "void";
							$required = "void.php";
							$transactionid = $_GET['transactionid'];
							$message = "Void Transaction";
							
							$process = 1;
							
							break;

						case "refund":
							$paymentselect = "refund";
							$required = "refund.php";
							$transactionid = $_GET['transactionid'];
							$message = "Refund Transaction";
							
							$process = 1;
							
							break;

						case "update":
							$paymentselect = "update";
							$required = "update.php";
							$transactionid = $_GET['transactionid'];
							$message = "Update Transaction";	

							$process = 1;
							
							break;
							
						case "index":
							$required = "index.php";
							$message = "View Posted Transactions";
							break;							
							
						case "view":
							$id = $_GET['id'];
							$required = "view.php";
							$message = "View Posted Transactions";
							break;
					}
				}
			
			}// is post

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>Payscape PHP Developers Suite</title>

    <!-- Bootstrap core CSS -->

    
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/jumbotron-narrow.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/custom.css" />
    <!-- Custom styles for this template -->


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="<?php echo $base_url; ?>js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo $base_url; ?>favicon.ico" type="image/x-icon" rel="icon" /><link href="<?php echo $base_url; ?>favicon.ico" type="image/x-icon" rel="shortcut icon" />    
        <style>
	.odd {background-color:#ffffff;}
	.even {background-color:#eeeeee;}
	</style>  
    

    </head>

  <body>

    <div class="container">
<?php 
	require_once 'includes/navbar.php';
?>
      


      <div class="jumbotron">
        <h1>Payscape Development Lab</h1>
        		<a href="http://www.payscape.com/" target="_blank"><img src="<?php echo $base_url; ?>img/payscape_home_logo.png" alt="Payscape Advisor" border="0" /></a>        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="<?php echo $base_url; ?>">Sign up today</a></p>
      </div>

      <div class="span9">
      <div class="span4"></div>
      

	<?php 	require_once "includes/$required"; ?>
    
     <?php 
     echo "<pre>";
     echo "<p>$message</p>";
     
     echo "</pre>";
    
      
     ?>   

   
<footer>
   <div class="footer">
        <p>&copy; Payscape Advisors 2013</p>
      </div>

		<a href="http://www.payscape.com/" target="_blank"><img src="<?php echo $base_url; ?>img/payscape_footer_logo.png" alt="Payscape Advisor" border="0" /></a>

</footer>
  </div>
	    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
        
  
	
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo $base_url; ?>js/bootstrap.min.js"></script>
</body>
</html>
