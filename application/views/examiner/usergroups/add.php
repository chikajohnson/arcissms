<div class="row">
	<div class="col-md-12">
		<h4><b>Add User Group</b></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>examiner/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>examiner/usergroups"><i class=" "></i>Usergroups</a></li>
			<li class="active"><i class=" "></i> Add User group</li>
		</ol>
	</div>
</div>
<?php echo form_open('examiner/usergroups/add'); ?>
<div class="form-group">
	<label>Name</label>
	<input name="name" type="text" class="form-control" placeholder="Enter name of usergroup" value="<?php echo set_value('name'); ?>">
</div>
<div class="form-group">
	<label>Description</label>
	<textarea name="description" placeholder="Describe the group" class="form-control"><?php echo set_value('description'); ?></textarea>
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="submit" id="page_submit" value = "Add " class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>examiner/usergroups" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>