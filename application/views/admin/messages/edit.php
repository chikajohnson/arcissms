<div class="row">
	<div class="col-md-12">
		<h4><b>Edit Messages</b></h4>
	</div>	
	</div>
	<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>admin/messages"><i class=" "></i>Messages</a></li>
				<li class="active"><i class=" "></i> Edit Messages</li>
			</ol>
		</div>
	</div>

	<?php echo form_open('admin/messages/edit/'.$message->id); ?>
	<div class="form-group">
		<div class="form-group">
			<label>Title </label>
			<input name="title" type="text" class="form-control" placeholder="Enter title" value="<?php echo  $message->title; ?>">
		</div>
		<div class="form-group">
			<label>Messages</label>
			<textarea rows="4" name="message" placeholder="Messages" class="form-control"><?php echo  $message->message; ?></textarea>
		</div>
		<div class="form-group">
			<label>Program of study</label>
			<select name="message_type" class="form-control">
				<option value="0" >Select Message Type</option>
				
				<?php if($message_types) : ?>
				<?php foreach($message_types as $type): ?>
				<?php if ($type->id == $message->message_type_id): ?>
				<?php $selected = 'selected'; ?>
				<?php else: ?>
				<?php $selected = ''; ?>
				<?php endif; ?>
				<option value="<?php echo $type->id; ?>" <?php echo $selected; ?>><?php echo $type->name; ?> </option>
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