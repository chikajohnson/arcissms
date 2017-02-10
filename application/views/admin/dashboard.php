<div>
	<div class="row text-center">
		<h4> Welcome to ARCIS SMS RESULTCHECKING SYSTEM </h4>
		<hr>
	</div>
	
	<div>
		<div>
			<div class="row text-center">
				<div span class="col-md-10">
					<div class="text-center">
						<div class="list-group col-sm-2" style="width:20%;">
							<div class="list-group-item bg-1">
								<span class="glyphicon glyphicon-user">&nbsp;<b>Number of Students</b></span>
							</div>
							<div  class="list-group-item"><h4><?php echo $student_count; ?></h4></div>
						</div>
						<div class="list-group col-sm-2" style="width:20%;">
							<div class="list-group-item bg-2">
								<span class="glyphicon glyphicon-book">&nbsp;<b>Examination Results</b></span>
							</div>
							<div  class="list-group-item"><h4><?php echo $result_count; ?></h4></div>
						</div>
						<div class="list-group col-sm-2" style="width:20%;">
							<div  class="list-group-item bg-3">
								<span class="glyphicon glyphicon-tasks">&nbsp;<b>Programs of Study</b></span>
							</div>
							<div  class="list-group-item"><h4><?php echo $program_count; ?></h4></div>
						</div>
						<div class="list-group col-sm-2" style="width:20%;">
							<div  class="list-group-item bg-4">
								<span class="glyphicon glyphicon-phone">&nbsp;<b>SMS Messages</b></span>
							</div> 
							<div  class="list-group-item"><h4><?php echo $sms_count; ?></h4></div>
						</div>
						<div class="list-group col-sm-2" style="width:20%;">
							<div class="list-group-item bg-5">
								<span class="glyphicon glyphicon-cloud">&nbsp;<b>Courses Registered</b></span>
							</div>
							<div  class="list-group-item"><h4><?php echo $course_count; ?></h4></div>
						</div>						
					</div>

					<div class="col-md-12 text-justify">
						<h2><span class="glyphicon glyphicon-cog">&nbsp;</span><strong>Services</strong> and <strong>Features</strong></h2>
						<p>
							Check students's results for the semester by providing the student's matric number and password .
							The students dashbaord allows the admin access to the students results in a semester.
							The admin can perform the following functions:
							<ul>
								<li>-- Check a students results in a semester</li>
								<li>-- Check the score for a particular courses in a semester</li>
								<li>-- Change a students login password</li>
								<li>-- View the statistics of students activities</li>
								<li>-- Monitor Activities of students on the system</li>
								<li>-- Print out results as PDF files</li>

							</ul>
							<div class="text-center">
								<a  class="btn btn-lg btn-default" style="height:50%" title="click to enter" href="<?php echo base_url(); ?>Site"><span class="glyphicon glyphicon-cog"></span>
								<strong><span class="text-success">Enter Students' Dashbaord</span></strong>
							</a>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>