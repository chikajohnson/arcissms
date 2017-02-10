<div class="row">
	<div class="col-md-12">
		<h4><b>Edit student</b></h4>
	</div>
	<?php //var_dump($student); die(); ?>
	<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>admin/students"><i class=" "></i>Students</a></li>
				<li class="active"><i class=" "></i> Edit student</li>
			</ol>
		</div>
	</div>
	<?php echo form_open('admin/students/edit/'.$student->id); ?>
	<div class="form-group">
		<div class="row">
			<div class="row col-md-6">
				<div class="form-group">
					<label>Matric Number </label>
					<input name="matric" type="text" class="form-control" placeholder="Enter student ID" value="<?php echo $student->matric ; ?>">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input name="last_name" type="text" class="form-control" placeholder="Enter last name" value="<?php echo $student->last_name; ?>">
				</div >
				<div  class="form-group">
					<label>First Name</label>
					<input name="first_name" type="text" class="form-control" placeholder="Enter first name" value="<?php echo $student->first_name; ?>">
				</div>
				<div class="form-group">
					<label>Other Names</label>
					<input name="other_names" type="text" class="form-control" placeholder="Enter other names" value="<?php echo $student->other_names; ?>">
				</div>
			</div>
			<div class="row col-md-6 pull-right">				
				<div class="form-group">
					<label>Phone Number </label>
					<input name="phonenumber1" type="number" class="form-control" placeholder="Enter Phonenumber" value="<?php echo $student->phonenumber1; ?>">
				</div>
				<div class="form-group">
					<label>Alternative Phone Number</label>
					<input name="phonenumber2" type="number" class="form-control" placeholder="Enter another phone number" value="<?php echo $student->phonenumber2; ?>">
				</div >
				<div  class="form-group">
					<label>Email</label>
					<input name="email" type="email" class="form-control" placeholder="Enter email address" value="<?php echo $student->email; ?>">
				</div>
				<div class="form-group">
					<label>Gender</label>
					
					<?php if ($student->email) : ?>
						<?php $checked = 'checked'; $female = '' ; $male = ''; ?>
						<?php if($student->gender == trim('male')): ?>
						<?php $male = $checked; ?>
					<?php elseif($student->gender == trim('female')): ?>
						<?php $female = $checked; ?>
					<?php endif; ?>
					<label class="radio-inline"><input type="radio" name="gender" value="male" <?php echo $male; ?>>Male</label>
					<label class="radio-inline"><input type="radio" name="gender" value="female" <?php echo $female; ?>> Female</label>
					<?php endif; ?>				
					
				</div>
			</div>
		</div>
		
		<hr>
		<div class="row">
			<div class="row col-md-6" >
				<div class="form-group">
					<label>Country of Origin</label>
					<input name="country" type="text" class="form-control" placeholder="Enter country of origin" value="<?php echo $student->country; ?>">
				</div>
				<div class="form-group">
					<label>State/Province</label>
					<input name="state" type="text" class="form-control" placeholder="Enter state/province" value="<?php echo $student->state; ?>">
				</div>
				<div class="form-group">
					<label>Local Government</label>
					<input name="lga" type="text" class="form-control" placeholder="Enter local government" value="<?php echo $student->lga; ?>">
				</div>
			</div>
			<div class="row col-md-6 pull-right">
				<div class="form-group">
					<label>Home Address</label>
					<textarea name="home_address" placeholder="Enter Home address" class="form-control"><?php echo $student->home_address; ?></textarea>
				</div>
				<div class="form-group">
					<label>Postal Address</label>
					<textarea name="postal_address" placeholder="Enter Postal address" class="form-control"><?php echo $student->postal_address; ?></textarea>
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
						<?php if ($program->id == $student->program_id): ?>
						<?php $selected = 'selected'; ?>
						<?php else: ?>
						<?php $selected = ''; ?>
						<?php endif; ?>
						<option value="<?php echo $program->id; ?>" <?php echo $selected; ?>><?php echo $program->name; ?> </option>
						<?php endforeach; ?>
						<?php endif;?>
					</select>
				</div>
				<div class="form-group">
					<label>Application Number</label>
					<input name="application_number" type="text" class="form-control" placeholder="Enter application number" value="<?php echo $student->application_number; ?>">
				</div >
			</div>
			<div class="row col-md-6 pull-right">
				<div class="form-group">
					<label>Academic Session</label>
					<select name="academic_session" class="form-control">
						<option value="0" >Select session</option>
						<?php if($sessions) : ?>
						<?php foreach($sessions as $session): ?>
						<?php if ($session->id == $student->academic_session): ?>
						<?php $selected = 'selected'; ?>
						<?php else: ?>
						<?php $selected = ''; ?>
						<?php endif; ?>
						<option value="<?php echo $session->id; ?>" <?php echo $selected; ?>><?php echo $session->name; ?> </option>
						<?php endforeach; ?>
						<?php endif;?>
					</select>
				</div>
				<div class="form-group">
					<label>Interests/hobbies</label>
					<textarea name="interests" placeholder="Enter areas of interests or hobbies" class="form-control"><?php echo $student->interests; ?></textarea>
				</div>
			</div>
		</div>
		<hr>
		<div class="col-md-12">
			<div class="btn-group pull-right">
				<input type="submit" name="submit" id="page_submit" value = "Update " class="btn btn-sm btn-primary">
				<a href="<?php echo base_url(); ?>admin/students" class="btn btn-sm btn-default">Close</a>
			</div>
		</div>
		
	</div>
	<?php echo form_close(); ?>