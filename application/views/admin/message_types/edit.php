<div class="row">
	<div class="col-md-12">
		<h4><b>Edit Message Type</b></h4>
	</div>	
</div>
<?php echo validation_errors('<p class="alert alert-warning">'); ?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/message_types"><i class=" "></i>Message Type</a></li>
			<li class="active"><i class=" "></i> Edit Message type</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/message_types/edit/'.$message_type->id); ?>
<div class="form-group">
	<div class="form-group">
		<label>Message Type</label>
		<input name="name" type="text" class="form-control" placeholder="Enter message type" value="<?php echo $message_type->name ;?>">
	</div>
	<div class="form-group">
		<label>Description</label>
		<textarea name="description" placeholder="message_type Description" class="form-control"><?php echo $message_type->description; ?></textarea>
	</div>
	<div class="col-md-12">
		<div class="btn-group pull-right">
			<input type="submit" name="Edit" value="Edit " id="page_submit" class="btn btn-sm btn-primary">
			<a href="<?php echo base_url(); ?>admin/message_types" class="btn btn-sm btn-default">Close</a>
		</div>
	</div>
</div>
<?php echo form_close(); ?>