<style type="text/css" media="screen">
.panel{
	width: 80%;
	align-content: center;
}
.container{
	margin: 0 auto;
}
</style>
<div class="container-fluid">
	<?php if($message): ?>
	<div class="alert alert-warning alert-dismissible fade in text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"> close</span>
		</button>
		<?php echo $message; ?>
	</div>
	<?php endif; ?>
	<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<h3 class="panel-title">
				<strong style="font-size:22px;">Check semester results with ease</strong>
				</h3>
			</div>
			<div class="panel-body">
				<?php echo form_open('site/check_result', 'class="form-horizontal"'); ?>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Matric Number</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="matric"
						placeholder="Enter matric number" autocomplete="false" value="<?php echo set_value('matric');?>"">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Academic session</label>
					<div class="col-sm-10">
						<select name="session" class="form-control">
							<option value="0" >Select session</option>
							<?php if($sessions) : ?>
							<?php foreach($sessions as $session): ?>
							<option value="<?php echo $session->id; ?>"><?php echo $session->name; ?></option>
							<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Semester</label>
					<div class="col-sm-10">
						<select name="semester" class="form-control">
							<option value="0" >Select semester</option>
							<?php if($semesters) : ?>
							<?php foreach($semesters as $semester): ?>
							<option value="<?php echo $semester->id; ?>"><?php echo $semester->name; ?></option>
							<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Course</label>
					<div class="col-sm-10">
						<div class="radio">
							<label>
								<input type="radio" name="course_radio" id="all-courses"
								value="all" checked="false"> Select All Courses in a semester
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="course_radio" id="course-radio" value="one">
								Select a specific Course
							</label>
						</div>
					</div>
				</div>
				<div class="form-group" id="course-div">
					<label  class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
						<select name="course" class="form-control">
							<option value="0" >Select course</option>
							<?php if($courses) : ?>
							<?php foreach($courses as $course): ?>
							<option value="<?php echo $course->id; ?>"><?php echo $course->code.'-'.$course->title; ?></option>
							<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" name="password" placeholder="Enter password" class="form-control" >
					</div>
				</div>`
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Check result</button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	<p class="col-md-4"><a class="btn btn-lg btn-default" href="<?php echo base_url(); ?>site" title="Back to Dashboard"><<<&nbsp;&nbsp;Back&nbsp;</a></p>