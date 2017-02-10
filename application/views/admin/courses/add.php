<div class="row">
	<div class="col-md-12">
		<h4><b>Add Course</b></h4>		
	</div>	
</div>
<div>
	<?php echo validation_errors('<br><p class="alert alert-dismissable alert-warning">'); ?>
</div>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/courses"><i class=" "></i>Courses</a></li>
			<li class="active"><i class=" "></i> Add course</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/courses/add'); ?>
<div class="form-group">
	<label>Course code</label>
	<input name="code" type="text" class="form-control" placeholder="Enter course code" value="<?php echo set_value('code'); ?>">
</div>
<div class="form-group">
	<label>Course Title</label>
	<input name="title" type="text" class="form-control" placeholder="Enter course title" value="<?php echo set_value('title'); ?>">
</div>
<div class="form-group">
	<label>Course Description</label>
	<textarea name="description" placeholder="Course Description" class="form-control"><?php echo set_value('description'); ?></textarea>
</div>
<div class="form-group">
	<label>Credit Unit</label>
	<input name="credit" type="number" class="form-control" placeholder="Enter course unit" value="<?php echo set_value('credit'); ?>">
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="submit" id="page_submit" value = "Add " class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>admin/courses" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>