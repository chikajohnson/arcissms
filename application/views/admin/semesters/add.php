<div class="row">
	<div class="col-md-12">
		<h4><b>Add Semester</b></h4>
	</div>	
</div>
<div>
	<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
</div>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/semesters"><i class=" "></i>Semesters</a></li>
			<li class="active"><i class=" "></i> Add Semester</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/semesters/add'); ?>
<div class="form-group">
	<label>Name Semester</label>
	<input name="name" type="text" class="form-control" placeholder="Enter semester" value="<?php echo set_value('name'); ?>">
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="submit" id="page_submit" value = "Add " class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>admin/semesters" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>