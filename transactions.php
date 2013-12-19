<?php 

	


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
						
			}			
		
			
		} else {
				if(!isset($_GET['action'])){
					redirect('/');
				} else {
					
					$action = $_GET['action'];
					switch ($action){
						case "add-cc":
							$paymentselect = "credit card";
							$required = "add_cc_form.php";
							$message = "New Credit Card Transaction";
							break;
						case "add-check":
							$paymentselect = "check";
							$required = "add_check_form.php";
							$message = "New eCheck Transaction";
							break;
						case "view":
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

  <title>Payscape PHP Wrappers</title>

    <!-- Bootstrap core CSS -->

    
    <link rel="stylesheet" type="text/css" href="/sporty.localdomain/css/bootstrap.css" /><link rel="stylesheet" type="text/css" href="/sporty.localdomain/css/jumbotron-narrow.css" /><link rel="stylesheet" type="text/css" href="/sporty.localdomain/css/custom.css" />
    <!-- Custom styles for this template -->


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link href="/sporty.localdomain/favicon.ico" type="image/x-icon" rel="icon" /><link href="/sporty.localdomain/favicon.ico" type="image/x-icon" rel="shortcut icon" />    
</head>

  <body>

    <div class="container">
<?php 
	require_once 'includes/navbar.php';
?>
      


      <div class="jumbotron">
        <h1>Payscape Development Lab</h1>
        		<a href="http://www.payscape.com/" target="_blank"><img src="/sporty.localdomain/img/payscape_home_logo.png" alt="Payscape Advisor" border="0" /></a>        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>

      <div class="span9">
      <div class="span4"></div>
      

	<?php 
	/*
		$server = 'localhost';
		$userid = 'veracini_5_w';
		$userpass = 'zC2HKGSB';
		$dbname = 'veracini_dogwood66';
		$conn = mysql_connect($server, $userid, $userpass) or die('No luck for you, boy.');
        mysql_select_db($conn, $dbname);
    */    
        
        $server = 'localhost';
        $userid = 'root';
        $userpass = '';
        $dbname = 'payscape';
        $conn = mysqli_connect($server, $userid, $userpass) or die('No luck for you, boy.');
        mysqli_select_db($conn, $dbname);
        
	?>
		
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

		<a href="http://www.payscape.com/" target="_blank"><img src="/sporty.localdomain/img/payscape_footer_logo.png" alt="Payscape Advisor" border="0" /></a>

</footer>
  </div>
	    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
        
  
	
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
