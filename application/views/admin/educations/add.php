<div class="row">
	<h4><b>Add educational qualifications</b></h4>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>admin/educations"><i class=" "></i>Educational Qualifications</a></li>
				<li class="active"><i class=" "></i> Add qualification</li>
				<!-- <div class="pull-right btn-success">&nbsp;&nbsp;<span class="badge"> 1</span> &nbsp;&nbsp;Personal Information&nbsp;&nbsp;</div> -->
			</ol>
		</div>
	</div>
	<?php echo form_open('admin/educations/add'); ?>
	<div class="form-group">
		<div class="form-group">
			<label>Matric Number</label>
			<input name="matric" type="number" class="form-control" placeholder="Enter matric number" value="<?php echo set_value('matric'); ?>">
		</div>
		<div class="form-group">
			<label>Name of Institution attended</label>
			<input name="school_attended" type="text" class="form-control" placeholder="Enter Institution attended" value="<?php echo set_value('school_attended'); ?>">
		</div>
		<div class="form-group">
			<label>City</label>
			<input name="city" type="text" class="form-control" placeholder="Enter city" value="<?php echo set_value('city'); ?>">
		</div>
		<div class="form-group">
			<label>Country</label>
			<input name="country" type="text" class="form-control" placeholder="Enter country" value="<?php echo set_value('country'); ?>">
		</div>
		<div class="form-group">
			<label>Start  Date</label>
			<input name="study_period_start" type="date" class="form-control" value="<?php echo set_value('study_period_start'); ?>">
		</div>
		<div class="form-group">
			<label>Graduation Date</label>
			<input name="study_period_end" type="date" class="form-control"  value="<?php echo set_value('study_period_end'); ?>">
		</div>
		<div class="form-group">
			<label>Award Date</label>
			<input name="award_date" type="date" class="form-control"  value="<?php echo set_value('award_date'); ?>">
		</div>		
		<div class="form-group">
			<label>Discipline</label>
			<input name="discipline" type="text" class="form-control" placeholder="Enter discipline" value="<?php echo set_value('discipline'); ?>">
		</div>
		<div class="form-group">
			<label>Department</label>
			<input name="department" type="text" class="form-control" placeholder="Enter Department" value="<?php echo set_value('department'); ?>">
		</div>
		<div class="form-group">
			<label>Faculty</label>
			<input name="faculty" type="text" class="form-control" placeholder="Enter Faculty" value="<?php echo set_value('faculty'); ?>">
		</div>
		<div class="form-group">
			<label>Degree obtained</label>
			<input name="degree_obtained" type="text" class="form-control" placeholder="Enter qualification eg MSc Chemistry, LLB, PhD Psychology, Bsc Sociology etc" value="<?php echo set_value('degree_obtained'); ?>">
		</div>
		<div class="form-group">
			<label>Class of degree</label>
			<input name="degree_class" type="text" class="form-control" placeholder="Enter class of degree obtained" value="<?php echo set_value('degree_class'); ?>">
		</div>
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<input type="submit" name="submit" id="page_submit" value = "Finish " class="btn btn-sm btn-primary">
				<a href="<?php echo base_url(); ?>admin/educations" class="btn btn-sm btn-default">Close</a>
			</div>
		</div>
		<?php echo form_close(); ?>