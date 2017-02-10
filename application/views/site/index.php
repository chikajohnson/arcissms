<div class="container-fluid">
	<div class="text-center">
		<h4>ARCIS SMS RESULTCHECKING SYSTEM</h4>
	</div>
	<hr>
	<?php if($message): ?>
			<div class="alert alert-success alert-dismissible fade in text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only"> close</span>
				</button>
				<?php echo $message; ?>
			</div>
	<?php endif; ?>
	<div class="row">
		<p class="col-md-4"><a class="btn btn-lg btn-primary"  href="<?php echo base_url(); ?>site/check_result" title="Check Result">
		<span class="glyphicon glyphicon-list-alt"></span>&nbsp;Check result&nbsp;</a></p>
		<p class="col-md-4"><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>site/change_password" title="Change Password">
		<span class="glyphicon glyphicon-lock"></span>&nbsp;Change Password&nbsp;</a></p>
		<p class="col-md-4"><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>site/get_help" title="Read Instruction">
		<span class="glyphicon glyphicon-question-sign"></span>&nbsp;Read Instructions&nbsp;</a></p>
	</div>
	<hr>
	<br>
	<br>
	<p class="col-md-4 col-lg-offset-4"><a class="btn btn-lg btn-default" href="<?php echo base_url(); ?>admin" title="Back To Admi Dashboard"><span class="glyphicon glyphicon-backward"></span> &nbsp; Back To Admin Dashboard&nbsp;</a></p>
	</div>
	