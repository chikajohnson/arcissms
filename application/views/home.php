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
    <title>ARCIS SMS | Home </title>
    

   
    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
          
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong>ARCIS SMS RESULT CHECKING SYSTEM</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
          <?php if ($this->session->userdata('logged_in')): ?>  
              <?php if ($this->session->userdata('user_type')  == 'examiner'): ?> 
                  <li><a href="<?php echo base_url(); ?>examiner/dashboard">Dashboard</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/dashboard/logout">Logout</a></li>
              <?php endif; ?>

              <?php if ($this->session->userdata('user_type')  == 'admin'): ?>  
                <li><a href="<?php echo base_url(); ?>admin">Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>admin/dashboard/logout">Logout</a></li>
              <?php endif; ?>
          <?php else: ?>
            <li><?php echo anchor('login', 'Admin', 'title="Login"'); ?></li>
            <li><?php echo anchor('examiner', 'Chief Examiner', 'title="Login"'); ?></li>
          <?php endif; ?>
           </ul>
            </div>
          </div>
        </nav>
        <div class="container">
          <div class="row">
            <span class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/arcis-logo.png" alt="Arcis logo"></span>           
            <span class="text-center"><h3>ARCIS SMS RESULT CHECKING SYSTEM</h3></span>            
            <span class="pull-right"><img src="<?php echo base_url(); ?>assets/images/ui-logo.png" alt="University of Ibadan logo"></span>
          </div>
          <h4>Welcome To <strong>Africa Regional Centre For Information Science</strong></h4>
          <hr>
            <div class="container row">
              <div class="col-md-6">
                <h2 class="lead"><strong> Examination Results Via SMS</strong></h2>
                <p>
                  Students cannow check the results of their examination result from the comfort of their mobile phones.
                  No need to visit the Centre to check one's results. The ARCIS SMS Result-checker allows
                  students to request for the grade of a particular course or all the courses in a semester.
                  <br>
                  Students can change their passwword and seek help effortlessly by SMS.
                </p>
              </div>
              
              <div class="col-md-6">
                <h2 class="lead"><strong>Services Supported</strong></h2>
                <p>
                  The SMS Result Checking System provides a range of servies relation to examination results. Some of these services include
                  <ul>
                    <li>Alert students when results are released</li>
                    <li>Check results</li>
                    <li>Change password</li>
                    <li>Request help on correct message format</li>
                    <li>Views a summary of exam results</li>
                    <li>Backup results etc.</li>
                  </ul>
                </div>
                </div> <!-- /container -->
              </div>
              
              <footer class="footer text-center">
                <div class="container">
                  <p class="text-muted">
                    <h5>ARCIS SMS RESULT-CHECKER</h5>
                    <small>ARCIS </small> &copy; 2016
                  </p>
                </div>
              </footer>
              <!-- Bootstrap core JavaScript
              ================================================== -->
              <!-- Placed at the end of the document so the pages load faster -->
              <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
              <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
              <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
            </body>
          </html>