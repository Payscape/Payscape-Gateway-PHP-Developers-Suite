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
  
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>debug_kit/css/debug_toolbar.css" />
<script type="text/javascript">
//<![CDATA[
window.DEBUGKIT_JQUERY_URL = "<?php echo $base_url; ?>debug_kit/js/jquery.js";
//]]>
</script><script type="text/javascript" src="<?php echo $base_url; ?>debug_kit/js/js_debug_toolbar.js"></script>
</head>

  <body>

      <div class="container">
<?php 
	require_once 'includes/navbar.php';
?>
      

  
      <div class="jumbotron">
        <h1>Payscape Development Lab</h1>
        		<a href="http://www.payscape.com/" target="_blank"><img src="<?php echo $base_url; ?>img/payscape_home_logo.png" alt="Payscape Advisor" border="0" /></a>        
        		<p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>

      <div class="span9">
      <div class="span4"></div>
      
<h2>Release Notes for CakePHP 2.4.3.</h2>
<p>
	<a href="http://cakephp.org/changelogs/2.4.3">Read the changelog </a>
</p>
<p id="url-rewriting-warning" style="background-color:#e32; color:#fff;">
	URL rewriting is not properly configured on your server.	1) <a target="_blank" href="http://book.cakephp.org/2.0/en/installation/url-rewriting.html" style="color:#fff;">Help me configure it</a>
	2) <a target="_blank" href="http://book.cakephp.org/2.0/en/development/configuration.html#cakephp-core-configuration" style="color:#fff;">I don't / can't use URL rewriting</a>
</p>
<p>
<span class="notice success">Your version of PHP is 5.2.8 or higher.</span></p>
<p>
	<span class="notice success">Your tmp directory is writable.</span></p>
<p>
	<span class="notice success">The <em>FileEngine</em> is being used for core caching. To change the config edit APP/Config/core.php</span></p>
<p>
	<span class="notice success">Your database configuration file is present.</span></p>
<p>
	<span class="notice success">CakePHP is able to connect to the database.</span></p>

<p>
	<span class="notice success">DebugKit plugin is present</span></p>

<h3>Editing this Page</h3>
<p>
To change the content of this page, edit: APP/View/Pages/home.ctp.<br />
To change its layout, edit: APP/View/Layouts/default.ctp.<br />
You can also add some CSS styles for your pages at: APP/webroot/css.</p>

<h3>Getting Started</h3>
<p>
	<a href="http://book.cakephp.org/2.0/en/" target="_blank"><strong>New</strong> CakePHP 2.0 Docs</a></p>
<p>
	<a href="http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/blog.html" target="_blank">The 15 min Blog Tutorial</a></p>

<h3>Official Plugins</h3>
<p>
<ul>
	<li>
		<a href="https://github.com/cakephp/debug_kit">DebugKit</a>:
		provides a debugging toolbar and enhanced debugging tools for CakePHP applications.	</li>
	<li>
		<a href="https://github.com/cakephp/localized">Localized</a>:
		contains various localized validation classes and translations for specific countries	</li>
</ul>
</p>

<h3>More about CakePHP</h3>
<p>
CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.</p>
<p>
Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.</p>

<ul>
	<li><a href="http://cakephp.org">CakePHP</a>
	<ul><li>The Rapid Development Framework</li></ul></li>
	<li><a href="http://book.cakephp.org">CakePHP Documentation </a>
	<ul><li>Your Rapid Development Cookbook</li></ul></li>
	<li><a href="http://api.cakephp.org">CakePHP API </a>
	<ul><li>Quick API Reference</li></ul></li>
	<li><a href="http://bakery.cakephp.org">The Bakery </a>
	<ul><li>Everything CakePHP</li></ul></li>
	<li><a href="http://plugins.cakephp.org">CakePHP Plugins </a>
	<ul><li>A comprehensive list of all CakePHP plugins created by the community</li></ul></li>
	<li><a href="http://community.cakephp.org">CakePHP Community Center </a>
	<ul><li>Everything related to the CakePHP community in one place</li></ul></li>
	<li><a href="https://groups.google.com/group/cake-php">CakePHP Google Group </a>
	<ul><li>Community mailing list</li></ul></li>
	<li><a href="irc://irc.freenode.net/cakephp">irc.freenode.net #cakephp</a>
	<ul><li>Live chat about CakePHP</li></ul></li>
	<li><a href="https://github.com/cakephp/">CakePHP Code </a>
	<ul><li>Find the CakePHP code on GitHub and contribute to the framework</li></ul></li>
	<li><a href="https://github.com/cakephp/cakephp/issues">CakePHP Issues </a>
	<ul><li>CakePHP Issues</li></ul></li>
	<li><a href="https://github.com/cakephp/cakephp/wiki#roadmaps">CakePHP Roadmaps </a>
	<ul><li>CakePHP Roadmaps</li></ul></li>
	<li><a href="http://training.cakephp.org">Training </a>
	<ul><li>Join a live session and get skilled with the framework</li></ul></li>
	<li><a href="http://cakefest.org">CakeFest </a>
	<ul><li>Don't miss our annual CakePHP conference</li></ul></li>
	<li><a href="http://cakefoundation.org">Cake Software Foundation </a>
	<ul><li>Promoting development related to CakePHP</li></ul></li>
</ul>
        
      </div>


	<footer>
	      <div class="footer">
	        <p>&copy; Payscape Advisors 2013</p>
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
