<div class="row">
	<h4><b>Add MessageType</b></h4>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>admin/message_types"><i class=" "></i>Message Type</a></li>
				<li class="active"><i class=" "></i> Add message type</li>
			</ol>
		</div>
	</div>
	<?php echo form_open('admin/message_types/add'); ?>
	<div class="form-group">
		<div class="form-group">
			<label>Type of Message</label>
			<input name="name" type="text" class="form-control" placeholder="Enter message type" value="<?php echo set_value('name'); ?>">
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" placeholder="Description" class="form-control"><?php echo set_value('description'); ?></textarea>
		</div>
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<input type="submit" name="submit" id="page_submit" value = "Add " class="btn btn-sm btn-primary">
				<a href="<?php echo base_url(); ?>admin/message_types" class="btn btn-sm btn-default">Close</a>
			</div>
		</div>
		<?php echo form_close(); ?>
		