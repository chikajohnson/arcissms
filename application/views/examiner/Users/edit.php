<div class="row">
	<div class="col-md-12">
		<h4><b>Edit User</b></h4>
	</div>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>examiner/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>examiner/users"><i class=" "></i>Users</a></li>
				<li class="active"><i class=" "></i> Edit User</li>
			</ol>
		</div>
	</div>
	<!-- <?php var_dump($groups); var_dump($user); ?> -->
	<?php echo form_open('examiner/users/edit/'.$user->id); ?>
	<div class="form-group">
		<label>User Name</label>
		<input name="user_name" type="text" class="form-control" placeholder="Enter User Name" value="<?php echo $user->user_name; ?>">
	</div>
	<div class="form-group">
		<label>Last Name</label>
		<input name="last_name" type="text" class="form-control" placeholder="Enter last name" value="<?php echo $user->last_name; ?>">
	</div >
	<div  class="form-group">
		<label>First Name</label>
		<input name="first_name" type="text" class="form-control" placeholder="Enter first name" value="<?php echo $user->first_name; ?>">
	</div>
	<div class="form-group">
		<label>Other Names</label>
		<input name="other_names" type="text" class="form-control" placeholder="Enter other names" value="<?php echo $user->other_names; ?>">
	</div>
	<div  class="form-group">
		<label>Email</label>
		<input name="email" type="email" class="form-control" placeholder="Enter email address" value="<?php echo $user->email; ?>">
	</div>
	<div class="form-group">
		<label>Phonenumber</label>
		<input name="phonenumber" type="number" class="form-control" placeholder="Enter phonenumber" value="<?php echo $user->phonenumber; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input name="password" type="password" class="form-control" placeholder="Enter password " value="<?php echo $user->password_plain; ?>">
	</div>
	<div class="form-group">
		<label>Repeat Password</label>
		<input name="password2" type="password" class="form-control" placeholder="Enter password again " value="<?php echo $user->password_plain; ?>">
	</div>
	<div class="form-group">
		<label>User Group</label>
		<select name="user_group" class="form-control">
			<option  value="0">Select UserGroup</option>

			<?php if($groups) : ?>
			<?php foreach($groups as $group): ?>
			<?php if ($group->name == $user->user_group): ?>
				<?php $selected = 'selected'; ?>
			<?php else: ?>
			<?php $selected = ''; ?>
			<?php endif; ?>
			<option value="<?php echo $group->id; ?>" <?php echo $selected; ?>><?php echo $group->name; ?> </option>
			<?php endforeach; ?>
			<?php endif;?>
		</select>
	</select>
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="Edit" value="Edit " id="page_submit" class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>examiner/users" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>