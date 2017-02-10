<div class="row">
	<div class="col-md-12">
		<h4><b>Edit education</b></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/educations"><i class=" "></i>educations</a></li>
			<li class="active"><i class=" "></i> Edit education</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/educations/edit/'.$education->id); ?>
<div class="form-group">
	<div class="form-group">
		<label>Matric Number</label>
		<input name="matric" type="number" class="form-control" placeholder="Enter matric number" value="<?php echo $education->matric; ?>">
	</div>
	<div class="form-group">
		<label>Name of Institution attended</label>
		<input name="school_attended" type="text" class="form-control" placeholder="Enter Institution attended" value="<?php echo $education->school_attended; ?>">
	</div>
	<div class="form-group">
		<label>City</label>
		<input name="city" type="text" class="form-control" placeholder="Enter city" value="<?php echo $education->city; ?>">
	</div>
	<div class="form-group">
		<label>Country</label>
		<input name="country" type="text" class="form-control" placeholder="Enter country" value="<?php echo $education->country; ?>">
	</div>
	<div class="form-group">
		<label>Start  Date</label>
		<input name="study_period_start" type="date" class="form-control" value="<?php echo $education->study_period_start; ?>">
	</div>
	<div class="form-group">
		<label>Graduation Date</label>
		<input name="study_period_end" type="date" class="form-control"  value="<?php echo $education->study_period_end; ?>">
	</div>
	<div class="form-group">
		<label>Award Date</label>
		<input name="award_date" type="date" class="form-control"  value="<?php echo $education->award_date; ?>">
	</div>
	<div class="form-group">
		<label>Discipline</label>
		<input name="discipline" type="text" class="form-control" placeholder="Enter discipline" value="<?php echo $education->discipline; ?>">
	</div>
	<div class="form-group">
		<label>Department</label>
		<input name="department" type="text" class="form-control" placeholder="Enter Department" value="<?php echo $education->department; ?>">
	</div>
	<div class="form-group">
		<label>Faculty</label>
		<input name="faculty" type="text" class="form-control" placeholder="Enter Faculty" value="<?php echo $education->faculty; ?>">
	</div>
	<div class="form-group">
		<label>Degree obtained</label>
		<input name="degree_obtained" type="text" class="form-control" placeholder="Enter qualification eg MSc Chemistry, LLB, PhD Psychology, Bsc Sociology etc" value="<?php echo $education->degree_obtained; ?>">
	</div>
	<div class="form-group">
		<label>Class of degree</label>
		<input name="degree_class" type="text" class="form-control" placeholder="Enter class of degree obtained" value="<?php echo $education->degree_class; ?>">
	</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="Edit" value="Edit " id="page_submit" class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>admin/educations" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>