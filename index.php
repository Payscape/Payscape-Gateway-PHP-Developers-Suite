<?php 
	require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>Home</title>

    <!-- Bootstrap core CSS -->

    
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/bootstrap.css" /><link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/jumbotron-narrow.css" /><link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/custom.css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo $base_url; ?>css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo $base_url; ?>favicon.ico" type="image/x-icon" rel="icon" /><link href="<?php echo $base_url; ?>favicon.ico" type="image/x-icon" rel="shortcut icon" />    
  
</head>

  <body>

      <div class="container">
<?php 
	require_once 'includes/navbar.php';
?>
      

  
      <div class="jumbotron">
        <h1>Payscape PHP Developers Suite</h1>
        <p>Rapid eCommerce Web Development with PHP and the Payscape Direct Post API.
        </p> 
        
      </div>

      <div class="span9">
      <div class="span4"></div>
      
<h2>Payscape Direct Post API Development <br> with the PHP Developers Suite</h2>
<p>
Use the Payscape Class for Direct Post Transactions with the Payscape API
</p>

<h3>Full Feature Examples</h3>

	<ul>
		<li><strong>Sale</strong> - Credit Card</li>
		<li><strong>Sale</strong> - eChech ACH</li>
		<li><strong>Auth</strong> - authorize transaction</li>
		<li><strong>Capture</strong> - capture auth transaction</li>
		<li><strong>Refund</strong> - refund entire or part of credit card transaction</li>
		<li><strong>Credit</strong> - credit a credit card transaction to a credit card transaction</li>
		<li><strong>Update</strong> - add shipping information and other details for a credit card transaction</li>
		<li><strong>Validate</strong> - credit card validation</li> 
		<li><strong>Void</strong> - void a credit card transaction</li>
	
	
	</ul>



        
      </div>


	<footer>
	      <div class="footer">
	        <p>&copy; Payscape Advisors 2014</p>
	      </div>
	
			<a href="http://www.payscape.com/" target="_blank"><img src="<?php echo $base_url; ?>img/payscape_footer_logo.png" alt="Payscape Advisor" border="0" /></a>
	
	</footer>

	    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
        
  

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo $base_url; ?>js/bootstrap.min.js"></script>
</body>
</html>
