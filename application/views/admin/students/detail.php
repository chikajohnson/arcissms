<div class="row">
	<div class="table-responsive">
		<h4 ><span class="label label-default">Student Details<small><a href="<?php echo base_url(); ?>admin/students" title="back to students page" class="btn btn-md btn-default pull-right">Back</a></small></span></h4>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<h4><strong>Name &nbsp;: </strong><?php echo $student->last_name. ' '. $student->first_name. ' '. $student->other_names; ?> </h4>
		</div>
		<div class="col-md-3">
			<h4><strong>Matric Number &nbsp;:</strong> &nbsp;<?php echo $student->matric; ?></h4>
		</div>
		<div class="col-md-3">
			<h4><strong>Aplication No &nbsp;:</strong> &nbsp;<?php echo $student->application_number; ?></h4>
		</div>
	</div>
	<table class="table table-striped table-condensed table-responsive" style="width:100%;">
		<tbody >
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Email &nbsp; : &nbsp;</strong><?php echo $student->email;?></h5>
					</div>
					<div class="col-md-3">
						<h5><strong>PhoneNumber &nbsp; : &nbsp;</strong><?php echo $student->phonenumber1;?></h5>
					</div>
					<div class="col-md-3">
						<h5><strong>Alternate Phonenumber &nbsp; : &nbsp;</strong><?php echo $student->phonenumber2;?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-12">
						<h5><strong>Gender &nbsp; : &nbsp;</strong><?php echo $student->gender;?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-12">
						<h5><strong>Program of study &nbsp; : &nbsp;</strong><?php echo $student->program;?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-12">
						<h5><strong>Academic Session &nbsp; : &nbsp;</strong><?php echo $student->session;?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Country of origin &nbsp; : &nbsp;</strong><?php echo $student->country;?></h5>
					</div>
					<div class="col-md-3">
						<h5><strong>State/Province &nbsp; : &nbsp;</strong><?php echo $student->state;?></h5>
					</div>
					<div class="col-md-3">
						<h5><strong>local Government &nbsp; : &nbsp;</strong><?php echo $student->lga;?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-md-6">
						
						<h5><strong>Home Address &nbsp; :&nbsp;</strong> <?php echo $student->home_address;?></h5>
					</div>
					<div class="col-md-6">
						<h5><strong>Postal Address &nbsp; :&nbsp;</strong> <?php echo $student->postal_address;?></h5>					
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-12">
						<h5><strong>Interests &nbsp; : &nbsp;</strong><?php echo $student->interests;?></h5>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	
	<hr>
</div>
</div>