<div class="row">
	<h4><b>Add user</b></h4>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>examiner/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>examiner/users"><i class=" "></i>users</a></li>
				<li class="active"><i class=" "></i> Add user</li>
			</ol>
		</div>
	</div>
	<?php echo form_open('examiner/users/add', 'autocomplete'); ?>
	<!-- <div class="form-group">
		<label>User Name</label>
		<input name="user_name" type="text" class="form-control" placeholder="Enter User Name" value="<?php echo set_value('user_name'); ?>">
	</div> -->
	<div class="form-group">
		<label>Last Name</label>
		<input name="last_name" type="text" class="form-control" placeholder="Enter last name" value="<?php echo set_value('last_name'); ?>">
	</div >
	<div  class="form-group">
		<label>First Name</label>
		<input name="first_name" type="text" class="form-control" placeholder="Enter first name" value="<?php echo set_value('first_name'); ?>">
	</div>
	<div class="form-group">
		<label>Other Names</label>
		<input name="other_names" type="text" class="form-control" placeholder="Enter other names" value="<?php echo set_value('other_names'); ?>">
	</div>
	<div  class="form-group">
		<label>Email</label>
		<input name="email" type="email" class="form-control" placeholder="Enter email address" value="<?php echo set_value('email'); ?>">
	</div>
	<div class="form-group">
		<label>Phonenumber</label>
		<input name="phonenumber" type="number" class="form-control" placeholder="Enter phonenumber" value="<?php echo set_value('phonenumber'); ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input name="password" type="password" class="form-control" placeholder="Enter password" >
	</div>
	<div class="form-group">
		<label>Repeat Password</label>
		<input name="password2" type="password" class="form-control" placeholder="Enter password again">
	</div>
	<div class="form-group">
		<label>User Group</label>
		<select name="user_group" class="form-control">
			<option value="0" >Select UserGroup</option>
			<?php if($groups) : ?>
			<?php foreach($groups as $group): ?>
			<option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
			<?php endforeach; ?>
			<?php endif;?>
		</select>
	</div>
	<div class="col-md-12">
		<div class="btn-group pull-right">
			<input type="submit" name="submit" id="page_submit" value = "Add " class="btn btn-sm btn-primary">
			<a href="<?php echo base_url(); ?>examiner/users" class="btn btn-sm btn-default">Close</a>
		</div>
	</div>
	<?php echo form_close(); ?>