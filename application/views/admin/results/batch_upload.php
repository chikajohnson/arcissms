<div class="row">
	<h4><b>Upload Multiple Results</b></h4>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
			<?php  echo $this->upload->display_errors('<p class="alert alert-danger">', '</p>');?>
	</div>
	<?php if($this->session->flashdata('excel')): ?>
 	 <?php echo '<div class="alert alert-warning alert-dismissable">'.$this->session->flashdata('excel').'</div>'; ?>
	<?php endif;?>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>admin/results"><i class="fa fa-dashboard"></i>Results</a></li>
				<li class="active"><i class="fa fa-dashboard"></i> Upload Results</li>
			</ol>
		</div>
	</div>
	<div id="upload_div">
		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
		<h3 class="text-danger">
			<span class="sr-only">Loading...</span>
		</h3>
	</div>

	<div class="row">
		<?php echo form_open_multipart('admin/results/upload_result'); ?>
		<div class="row form-group">
			<div class="col-md-3">
				<h5><strong>Choose a file To upload :</strong> </h5><input type="file" name="file" id="file" class="" >
			</div>
		</div>
		
		<div class="form-group">
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
			<input type="submit" name="import" id="page_submit" value = "Upload results " onclick="validateInputs();" class="btn btn-lg btn-primary">
			<a  href="<?php echo base_url(); ?>admin/results"  class="btn btn-lg btn-default">Close</a>
		</div>
	</div>
	<?php echo form_close(); ?>

	<script type="text/javascript">
	  
	  function validateInputs() {
	    $('#upload_div').show();  
	  }
	</script>