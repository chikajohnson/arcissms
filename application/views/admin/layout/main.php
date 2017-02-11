<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ARCIS SMS HUB | ADMIN DASHBOARD</title>
		<!-- Bootstrap core CSS -->

		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo  base_url(); ?>assets/css/dashboard.css" rel="stylesheet">
		<link href="<?php echo  base_url(); ?>assets/css/custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">		
  
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
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
					<a class="navbar-brand" href="<?php echo base_url() ?>admin"><strong>ARCIS SMS RESULT CHECKING SYSTEM</strong></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<?php if($this->session->flashdata('login')): ?>
      				<li><?php echo '<span class="alert alert-success alert-dismissable">'.$this->session->flashdata('login').'</span>'; ?></li>
    				<?php endif;?>
    				<?php if ($this->session->userdata('logged_in')): ?>	
						<li><a href="<?php echo base_url(); ?>admin"><?php  ?></a></li>
					<?php endif; ?>
					<?php if ($this->session->userdata('user_type')  == 'examiner'): ?>	
						<li><a href="<?php echo base_url(); ?>examiner/dashboard/logout">Logout</a></li>
						<li class="text-info"><a class="text-info"><span class="glyphicon glyphicon-user"></span>
						<?php echo $this->session->userdata('full_name') ;?></a></li>
					<?php endif; ?>

					<?php if ($this->session->userdata('user_type')  == 'admin'): ?>	
						<li><a href="<?php echo base_url(); ?>admin/dashboard/logout">Logout</a></li>
						<li class="text-info"><a ><span class="glyphicon glyphicon-user"></span>
							<?php echo $this->session->userdata('full_name') ;?>
						</a></li>
					<?php endif; ?>
					</ul>					
				</div><!--/.nav-collapse -->
			</div>
			</nav>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3 col-md-2 sidebar">
						<ul class="nav nav-sidebar text-center">
							<li class="<?php if($this->uri->segment(1) == 'admin'){echo "active";} ?>"><?php echo anchor('admin', 'Admin Dashboard', 'title="Dashboard Home"'); ?></li>
							<li class="<?php if($this->uri->segment(2) == 'students'){echo "item";} ?>"><?php echo anchor('admin/students', 'Student Records', 'title="Student Records"'); ?></li>
							<li class="<?php if($this->uri->segment(2) == 'results'){echo "item";} ?>"><?php echo anchor('admin/results', 'Exam Results', 'title="Examination Results"'); ?></li>
							<li class="<?php if($this->uri->segment(2) == 'messages'){echo "item";} ?>"><?php echo anchor('admin/messages', 'Messages', 'title="Messages"'); ?></li>
							<li class="<?php if($this->uri->segment(2) == 'educations'){echo "item";} ?>"><?php echo anchor('admin/educations', 'Educational Qualifications', 'title="Educational Qualifications"'); ?></li>
							<hr>
							<li class="<?php if($this->uri->segment(2) == 'courses'){echo "item";} ?>"><?php echo anchor('admin/courses', 'Courses', 'title="Dashboard Home"'); ?></li>
							<li class="<?php if($this->uri->segment(2) == 'semesters'){echo "item";} ?>"><?php echo anchor('admin/semesters', 'Semesters', 'title="Academic Semesters"'); ?></li>							
							<li class="<?php if($this->uri->segment(2) == 'academic_sessions'){echo "item";} ?>"><?php echo anchor('admin/academic_sessions', 'Academic Sessions', 'title="Academic Sessions"'); ?></li>
							<!-- <li><?php echo anchor('admin/sponsors', 'Sponsors', 'title="Sponsors"'); ?></li> -->
							<!-- <li><?php echo anchor('admin/lecturers', 'Lecturers', 'title="ARCISS Lecturers"'); ?></li> -->
							<li class="<?php if($this->uri->segment(2) == 'programs'){echo "item";} ?>"><?php echo anchor('admin/programs', 'Program of Study', 'title="Program of Study"'); ?></li>
							<li class="<?php if($this->uri->segment(2) == 'message_types'){echo "item";} ?>"><?php echo anchor('admin/message_types', 'Message Types', 'title="Messages type"'); ?></li>
							
							
							
							<li class="active"><?php echo anchor('admin', 'Back To Dashboard', 'title="Back to Home"'); ?></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<?php
						$this->load->view($main);
					?>
				</div>
			</div>
			<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
			<!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->

			 <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
			<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script>			
			<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
			<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
		</body>
	</html>