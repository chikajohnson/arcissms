<div class="container-fluid">
	<div id="print_html" class="row">
		<div class="text-center">
			<h3>
			<?php //var_dump($result); die(); ?>
			<?php if ($result): ?>
			Exam Result Detail
			
			<span class="pull-right">
				<small class="">
				<b>Matric Number : &nbsp; <?php echo $result->matric; ?>	</b>
				</small>
				<small class="">
				<b>&nbsp;     | &nbsp;  Session : &nbsp; <?php echo $result->session; ?></b>
				</small>
				<small class="">
				<b>&nbsp;     | &nbsp;  Semester : &nbsp; <?php echo $result->semester; ?>	</b>
				</small>
			</span>
			</h3>
		</div>
		<hr>
		<div class="row" style="font-size: 18px;">
			<div class="col-sm-4">
				<span class="label label-default" >Name : </span>
				<small class=""><b> &nbsp; <?php echo $result->last_name. ' &nbsp;'. $result->first_name. ' &nbsp;'. $result->other_names; ?>
				</b></small>
			</div>
			<div class="col-sm-6">
				<span class="label label-default">Program of Study : </span>
				<small class=""><b> &nbsp; <?php echo $result->program; ?></b></small>
			</div>
		</div>
		<div class="row text-left ">
			<div class="panel-body">
				<div class="list-group">
					<p class="list-group-item-text">
						<ul class="list-group">
							<li class="list-group-item label-default text-center" style="background: lightgrey;">
								<h4>
								<strong><?php echo $result->code.' : '.$result->course; ?></strong>
								</h4>
							</li>
							<li class="list-group-item ">Countinuous Assessment : <strong><?php echo $result->assessment; ?></strong></li>
							<li class="list-group-item ">Exam Total : <strong><?php echo $result->exam_score; ?></strong></li>
							<li class="list-group-item ">Total score : <strong><?php echo $result->adjusted_mark; ?> </strong></li>
							<li class="list-group-item ">
								Course Lecturer(s) &nbsp;: &nbsp;
								<?php if($result->course_lecturer1): ?>
								<strong><?php echo $result->course_lecturer1; ?></strong>
								<?php endif; ?>
								<?php if($result->course_lecturer2): ?>
								<strong><?php echo  '&nbsp; &nbsp; | &nbsp; &nbsp;' . $result->course_lecturer2; ?></strong>
								<?php endif; ?>
								<?php if($result->course_lecturer3): ?>
								<strong><?php echo '&nbsp; &nbsp; | &nbsp; &nbsp;'. $result->course_lecturer3 ?></strong>
								<?php endif; ?>
								<?php if($result->course_lecturer4): ?>
								<strong><?php echo  '&nbsp; &nbsp; | &nbsp; &nbsp;' . $result->course_lecturer4; ?></strong>
								<?php endif; ?>
							</li>
							<li class="list-group-item ">
								Chief Examiner &nbsp;: &nbsp;<strong> <?php echo $result->chief_examiner; ?></strong>
							</li>
							<li class="list-group-item text-center well">
								<h4>
								<strong><b>Total Score : <?php echo $result->adjusted_mark; ?> &nbsp; </b>
								<?php if($result->adjusted_mark >= 40): ?>
								<span class="label label-success" style="margin-left: 10px;"> &nbsp;PASS</span></strong>
								<?php elseif($result->adjusted_mark < 40): ?>
								<span class="label label-danger" style="margin-left: 10px;"> &nbsp;FAIL</span></strong>
								<?php endif; ?>
							</li>
						</ul>						
					</p>
				</div>
				<div class="col-sm-12 text-right">
					<a href="<?php echo base_url(); ?>admin/results" title="Back to results" class="btn btn-lg btn-default glyphicon glyphicon-arrow-left pull-left"></a>
					<a id="print" class="btn btn-lg btn-danger pull-right" onclick="hideButton(); printJS('print_html', 'html'); showButton();">Export Result as PDF</a>
				</div>
				<?php else: ?>
				<h3>
				<strong>Student Examination Results</strong>
				</h3>
				<hr>
				
				<div class="panel-body">
					<div class="list-group">
						<p class="list-group-item-text">
							<ul class="list-group">
								<li class="list-group-item  text-center">
									<h4 class="">
									<strong class="text-danger">Result does not exist !!!</strong>
									
									</h4>
								</li>
							</ul>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-2 text-right">
				<a href="<?php echo base_url(); ?>admin/results" title="Back to results" class="btn btn-lg btn-default glyphicon glyphicon-arrow-left"></a>
			</div>
			<?php endif; ?>			
		</div>
	</div>
</div>

<script type="text/javascript">
  
  function hideButton(){

  $('#print').hide();
  
  }

   function showButton(){

  $('#print').show();
  
  }
 </script>