<div class="row">
	<div class="col-md-12">
		<h4><b>Edit Academic session</b></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/academic_sessions"><i class=" "></i>Academic sessions</a></li>
			<li class="active"><i class=" "></i> Edit Academic session</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/academic_sessions/edit/'.$academic_session->id); ?>
<div class="form-group">
	<label>Academic session </label>
	<input name="name" type="text" class="form-control" placeholder="Enter session name" value="<?php echo $academic_session->name; ?>">
</div>
<div class="form-group">
	<label> Description of session</label>
	<textarea name="description" placeholder="Describe the academic session  " class="form-control" ><?php echo $academic_session->description; ?></textarea>
</div>
<div class="form-group">
	<label>Academic session Starts</label>
	<input name="session_starts" type="text" class="form-control" placeholder=" Academic session  starts in" value="<?php echo $academic_session->session_starts; ?>" >
</div>
<div class="form-group">
	<label>Academic session Ends</label>
	<input name="session_ends" type="text" class="form-control" placeholder=" Academic session  ends in" value="<?php echo $academic_session->session_ends; ?>" >
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="Edit" value="Edit " id="page_submit" class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>admin/academic_sessions" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>