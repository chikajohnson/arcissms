<div class="row">
	<h4><b>Add student</b></h4>
	<div>
		<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=""></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>admin/students"><i class=""></i>Students</a></li>
				<li class="active"><i class=""></i> Add student</li>
				<!-- <div class="pull-right btn-success">&nbsp;&nbsp;<span class="badge"> 1</span> &nbsp;&nbsp;Personal Information&nbsp;&nbsp;</div> -->
			</ol>
		</div>
		
	</div>
	<?php echo form_open('admin/students/add'); ?>
	<div class="form-group">
	<?php if($this->session->flashdata('unique')): ?>
	<?php echo '<div class="alert alert-warning alert-dismissable">'.$this->session->flashdata('unique').'</div>'; ?>
	<?php endif;?>
		<div class="row">
			<div class="row col-md-6">
				<div class="form-group">
					<label>Matric Number </label>
					<input name="matric" type="text" class="form-control" placeholder="Enter student ID" value="<?php echo set_value('matric'); ?>">
				</div>
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
			</div>
			<div class="row col-md-6 pull-right">
				
				<div class="form-group">
					<label>Phone Number </label>
					<input name="phonenumber1" type="number" class="form-control" placeholder="Enter Phonenumber" value="<?php echo set_value('phonenumber1'); ?>">
				</div>
				<div class="form-group">
					<label>Alternative Phone Number</label>
					<input name="phonenumber2" type="number" class="form-control" placeholder="Enter another phone number" value="<?php echo set_value('phonenumber2'); ?>">
				</div >
				<div  class="form-group">
					<label>Email</label>
					<input name="email" type="email" class="form-control" placeholder="Enter email address" value="<?php echo set_value('email'); ?>">
				</div>
				<div class="form-group">
					<label>Gender</label>
					<label class="radio-inline"><input type="radio" name="gender" checked value="male">Male</label>
					<label class="radio-inline"><input type="radio" name="gender" value="female"> Female</label>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="row col-md-6" >
				<div class="form-group">
					<label>Country of Origin</label>
					<input name="country" type="text" class="form-control" placeholder="Enter country of origin" value="<?php echo set_value('country'); ?>">
				</div>
				<div class="form-group">
					<label>State/Province</label>
					<input name="state" type="text" class="form-control" placeholder="Enter state/province" value="<?php echo set_value('state'); ?>">
				</div>
				<div class="form-group">
					<label>Local Government</label>
					<input name="lga" type="text" class="form-control" placeholder="Enter local government" value="<?php echo set_value('lga'); ?>">
				</div>
			</div>
			<div class="row col-md-6 pull-right">
				<div class="form-group">
					<label>Home Address</label>
					<textarea name="home_address" placeholder="Enter Home address" class="form-control"><?php echo set_value('home_address'); ?></textarea>
				</div>
				<div class="form-group">
					<label>Postal Address</label>
					<textarea name="postal_address" placeholder="Enter Postal address" class="form-control"><?php echo set_value('postal_address'); ?></textarea>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			
		</div>
		<div class="row">
			<div class="row col-md-6">
				<div class="form-group">
					<label>Program of study</label>
					<select name="program" class="form-control">
						<option value="0" >Select UserGroup</option>
						<?php if($programs) : ?>
						<?php foreach($programs as $program): ?>
						<option value="<?php echo $program->id; ?>"><?php echo $program->name; ?></option>
						<?php endforeach; ?>
						<?php endif;?>
					</select>
				</div>
				<div class="form-group">
					<label>Application Number</label>
					<input name="application_number" type="text" class="form-control" placeholder="Enter application number" value="<?php echo set_value('application_number'); ?>">
				</div >
			</div>
			<div class="row col-md-6 pull-right">
				<div class="form-group">
					<label>Academic Session</label>
					<select name="academic_session" class="form-control">
						<option value="0" >Select session</option>
						<?php if($academic_sessions) : ?>
						<?php foreach($academic_sessions as $academic_session): ?>
						<option value="<?php echo $academic_session->id; ?>"><?php echo $academic_session->name; ?></option>
						<?php endforeach; ?>
						<?php endif;?>
					</select>
				</div>
				<div class="form-group">
					<label>Interests/hobbies</label>
					<textarea name="interests" placeholder="Enter areas of interests or hobbies" class="form-control"><?php echo set_value('interests'); ?></textarea>
				</div>
			</div>
		</div>
		<hr>
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<input type="submit" name="submit" id="page_submit" value = "Continue " class="btn btn-sm btn-primary">
				<a href="<?php echo base_url(); ?>admin/students" class="btn btn-sm btn-default">Close</a>
			</div>
		</div>
		
	</div>
	<?php echo form_close(); ?>