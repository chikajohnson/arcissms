<div class="row">
	<h4><b>Add Student's Result</b></h4>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>examiner/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>examiner/results"><i class=" "></i>Results</a></li>
				<li class="active"><i class=" "></i> Add Result</li>
			</ol>
		</div>
	</div>
	<?php echo form_open('examiner/results/add'); ?>
	<div class="form-group">
		<div class="form-group">
			<label>Matric Number</label>
			<input name="matric" type="number" class="form-control" placeholder="Enter matric number" value="<?php echo set_value('matric'); ?>">
		</div>
		<div class="row">
			
			<div class="form-group col-sm-4">
				<label>Course</label>
				<select name="course" class="form-control">
					<option value="0" >Select course</option>
					<?php if($courses) : ?>
					<?php foreach($courses as $course): ?>
					<option value="<?php echo $course->id; ?>"><?php echo $course->code. ' - '. $course->title; ?></option>
					<?php endforeach; ?>
					<?php endif;?>
				</select>
			</div>
			<div class="form-group col-sm-4">
				<label>Academic Session</label>
				<select name="session" class="form-control">
					<option value="0">Select session</option>
					<?php if($sessions) : ?>
					<?php foreach($sessions as $session): ?>
					<option value="<?php echo $session->id; ?>"><?php echo $session->name; ?></option>
					<?php endforeach; ?>
					<?php endif;?>
				</select>
			</select>
		</div>
		<div class="form-group col-sm-4">
			<label>Semester</label>
			<select name="semester" class="form-control">
				<option value="0">Select Semester</option>
				<?php if($semesters) : ?>
				<?php foreach($semesters as $semester): ?>
				<option value="<?php echo $semester->id; ?>"><?php echo $semester->name; ?></option>
				<?php endforeach; ?>
				<?php endif;?>
			</select>
		</select>
	</div>
</div>
<div class="row">
	<div class="form-group col-sm-6">
		<label>Continuous Assessment</label>
		<input name="assessment" type="text" class="form-control" placeholder="Enter assessment" value="<?php echo set_value('assessment'); ?>">
	</div>
	<div class="form-group col-sm-6">
		<label>Exam Score </label>
		<input name="exam_score" type="number" class="form-control" placeholder="Enter the  total score" value="<?php echo set_value('exam_score'); ?>">
	</div>
</div>
<div class="form-group">
	<label>Total Mark</label>
	<input name="adjusted_mark" type="number" class="form-control" placeholder="Enter the adjusted score" value="<?php echo set_value('adjusted_mark'); ?>">
</div>
<div class="form-group">
	<label>Remark</label>
	<input name="remark" type="text" class="form-control" placeholder="Enter remark" value="<?php echo set_value('remark'); ?>">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Course Lecturer 1</label>
			<input name="course_lecturer1" type="text" class="form-control" placeholder="Enter the name of the course lecturer" value="<?php echo set_value('course_lecturer1'); ?>">
		</div>
		<div class="form-group">
			<label>Course Lecturer 2</label>
			<input name="course_lecturer2" type="text" class="form-control" placeholder="Enter the name of the course lecturer" value="<?php echo set_value('course_lecturer2'); ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Course Lecturer 3</label>
			<input name="course_lecturer3" type="text" class="form-control" placeholder="Enter the name of the course lecturer" value="<?php echo set_value('course_lecturer3'); ?>">
		</div>
		<div class="form-group">
			<label>Course Lecturer 4</label>
			<input name="course_lecturer4" type="text" class="form-control" placeholder="Enter the name of the course lecturer" value="<?php echo set_value('course_lecturer4'); ?>">
		</div>
	</div>
</div>
<div class="form-group">
	<label>Chief Examiner</label>
	<input name="chief_examiner" type="text" class="form-control" placeholder="Enter name Chief Examiner" value="<?php echo set_value('chief_examiner'); ?>">
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="submit" id="page_submit" value = "Add " class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>examiner/results" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>