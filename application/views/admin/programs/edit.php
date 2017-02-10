<div class="row">
	<div class="col-md-12">
		<h4><b>Edit Program of study</b></h4>
	</div>	
</div>
<?php echo validation_errors('<p class="alert alert-warning">'); ?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/programs"><i class=" "></i>Programs</a></li>
			<li class="active"><i class=" "></i> Edit program</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/programs/edit/'.$program->id); ?>
<div class="form-group">
	<div class="form-group">
		<label>Name of Program</label>
		<input name="name" type="text" class="form-control" placeholder="Enter program of study" value="<?php echo $program->name ;?>">
	</div>
	<div class="form-group">
		<label>Program Mode</label>
		<input name="type" type="text" class="form-control" placeholder="Enter mode eg Full-Time, Part-Time etc" value="<?php echo $program->type; ?>">
	</div>
	<div class="form-group">
		<label>Program Description</label>
		<textarea name="description" placeholder="Program Description" class="form-control"><?php echo $program->description; ?></textarea>
	</div>
	<div class="form-group">
		<label>Department</label>
		<input name="department" type="text" class="form-control" placeholder="Enter Department" value="<?php echo $program->department; ?>">
	</div>
	<div class="form-group">
		<label>Faculty</label>
		<input name="faculty" type="text" class="form-control" placeholder="Enter Faculty" value="<?php echo $program->faculty; ?>">
	</div>
	<div class="col-md-12">
		<div class="btn-group pull-right">
			<input type="submit" name="Edit" value="Edit " id="page_submit" class="btn btn-sm btn-primary">
			<a href="<?php echo base_url(); ?>admin/programs" class="btn btn-sm btn-default">Close</a>
		</div>
	</div>
</div>
<?php echo form_close(); ?>