<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Admin Login Page</title>
    
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <div class="btn btn-sm"></div>
          
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong>ARCIS SMS RESULT-CHECKER</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="#">Home</a></li> -->
            <!-- <li><a href="#about">About</a></li> -->
            <!-- <li><a href="#contact">Contact</a></li> -->
            <!--  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li><?php echo anchor('Welcome/login', 'Login', 'title="Login"'); ?></li></ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

    <div class="container">
		<div class="row">		
			<span class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/arcis-logo.png" alt="Arcis logo"></span>
      <span class="text-center"><h3>ARCIS SMS RESULT CHECKING SYSTEM</h3></span>
      <span class="pull-right"><img src="<?php echo base_url(); ?>assets/images/ui-logo.png" alt="University of Ibadan logo"></span>
		</div>
      <div class="container row">
		 <form class="form-signin">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="form-signin-heading text-center">Reset Admin Password</h5>
				</div>
				<div class="panel-body">
					<input type="text" id="username" name="username" class="form-control" placeholder="Enter user name" required autofocus>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
					<input type="password" id="password" name="password2" class="form-control" placeholder="Confirm Password" required>
					<button class="btn btn-md btn-primary btn-block" type="submit"><strong>Reset Password</strong></button>
					<div class="form-group">										
					</div> 
					<hr />											
				</div>                           
			</div>
		</form>
	</div>  
    </div> <!-- /container -->
	<footer class="footer text-center">
      <div class="container">
        <p class="text-muted"> 
			<h5>ARCIS SMS RESULT-CHECKER</h5>
			<small>ARCIS </small>	&copy; 2016				
		</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap.js"></script>
  </body>
</html>








   