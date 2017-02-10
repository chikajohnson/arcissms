<h3><b>Dashboard</b></h3>
<div class="row">
	<div class="table-responsive">
		<h3 ><span class="label label-primary">User Details<small><a href="<?php echo base_url(); ?>examiner/users" title="back to users" class="btn btn-md btn-primary pull-right">Back</a></small></span></h3>
	</div>
	<hr>
	<table class="table table-striped table-condensed table-responsive" style="width:100%;">
		<tbody >
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Name :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo $user->last_name .' &nbsp;'. $user->first_name . ' &nbsp;'. $user->other_names; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>User Name :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo $user->user_name; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>user Group :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo $user->user_group; ?></h5>
					</div>
				</td>
			</tr>			
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Email :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo $user->email; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Password Encrypted :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo $user->password; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Password :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo $user->password_plain; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Phone Number :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo $user->phonenumber; ?></h5>
					</div>
				</td>				
			</tr>
			<?php if($user->status == '0'): ?>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>User Status :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo 'Suspended' ?></h5>
					</div>
				</td>
			</tr>
			<?php elseif($user->status == '1'): ?>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>User Status :</strong></h5>
					</div>
					<div class="col-md-6">
						<h5><?php echo 'Active' ?></h5>
					</div>
				</td>
			</tr>
			<?php endif; ?>					
		</tbody>
	</table>
	
	<hr>
</div>
</div>