<div class="row">
	<h4><b>Compose and Send messages</b></h4>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>admin/messages"><i class=" "></i>messages</a></li>
				<li class="active"><i class=" "></i> Add message</li>
			</ol>
		</div>
	</div>
	<?php echo form_open('admin/messages/add'); ?>
	<div class="form-group">
			<label>Title</label>
			<input name="title" placeholder="Enter the title" class="form-control" value="<?php echo set_value('title'); ?>"/>
		</div>
	<div class="form-group">
		<div class="form-group">
			<label>Message Body</label>
			<textarea name="message" placeholder="Compose your messages" class="form-control"><?php echo set_value('message'); ?></textarea>
		</div>
		<div class="form-group">
			<label>Message Type</label>
			<select name="message_type" class="form-control">
				<option value="0" >Select Message Type</option>
				<?php if($message_types) : ?>
				<?php foreach($message_types as $msg_type): ?>
				<option value="<?php echo $msg_type->id; ?>"><?php echo $msg_type->name; ?></option>
				<?php endforeach; ?>
				<?php endif;?>
			</select>
		</div>
			
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<input type="submit" name="submit" id="page_submit" value = "Save " class="btn btn-sm btn-primary">
				<a href="<?php echo base_url(); ?>admin/messages" class="btn btn-sm btn-default">Close</a>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	