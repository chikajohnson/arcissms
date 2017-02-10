<div class="container-fluid">
	<div class="panel panel-default">
	<?php echo validation_errors('<br><p class="alert alert-warning">'); ?>

	<?php if($message): ?>
			<div class="alert alert-warning alert-dismissible fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only"> close</span>
				</button>
				<?php echo $message; ?>
			</div>
	<?php endif; ?>
	
		<div class="panel-heading text-center">
			<h1 class="panel-title">
			<strong style="font-size:28px;">Change Login Password</strong>
			</h1>
		</div>
		<div class="panel-body" >
			<?php echo form_open('site/change_password', 'class="form-horizontal"'); ?>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Matric Number</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="matric"
						placeholder="Enter matric number" autocomplete="false" value="<?php echo set_value('matric');?>">
					</div>
				</div>							
				
				<div class="form-group">
					<label  class="col-sm-2 control-label">Old Password</label>
					<div class="col-sm-10">
						<input type="password" name="password" placeholder="Enter your password" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">New Password</label>
					<div class="col-sm-10">
						<input type="password" name="password1" placeholder="Enter new password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Repeat New Password</label>
					<div class="col-sm-10">
						<input type="password" name="password2" placeholder="Repeat new password" class="form-control">
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" title="Change login password">Change password</button>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div> 

<p class="col-md-4"><a class="btn btn-lg btn-default" href="<?php echo base_url(); ?>site" title="Back to Dashboard"><<<&nbsp;&nbsp;Back&nbsp;</a></p>