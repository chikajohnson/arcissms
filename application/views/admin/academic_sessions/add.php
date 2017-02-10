<div class="row">
	<div class="col-md-12">
		<h4><b>Add Academic session</4></h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/academic_sessions"><i class=" "></i>Academic sessions</a></li>
			<li class="active"><i class=" "></i> Add Academic Session</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/academic_sessions/add'); ?>
<div class="form-group">
	<label>Name of Academic session </label>
	<input name="name" type="text" class="form-control" placeholder="Enter session  name" value="<?php echo set_value('name'); ?>">
</div>
<div class="form-group">
	<label>Session Description</label>
	<textarea name="description" placeholder="Academic session description" class="form-control"><?php echo set_value('description'); ?></textarea>
</div>
<div class="form-group">
	<label>Academic session Starts</label>
	<input name="session_starts" type="date" class="form-control" placeholder=" Academic session  starts in" value="<?php echo set_value('session_starts'); ?>">
</div>
<div class="form-group">
	<label>Academic session Ends</label>
	<input name="session_ends" type="date" class="form-control" placeholder=" Academic session  ends in" value="<?php echo set_value('session_ends'); ?>">
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="submit" id="page_submit" value = "Add " class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>admin/academic_sessions" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>