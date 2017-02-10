<div class="row">
	<div class="table-responsive">
		<h3 ><span class="label label-default">Courses Details<small><a href="<?php echo base_url(); ?>admin/message_types" title="back to message types" class="btn btn-md btn-default pull-right">Back</a></small></span></h3>
	</div>
	<hr>
	<table class="table table-striped table-condensed table-responsive" style="width:100%;">
		<tbody >
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Name :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $message_type->name; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Description :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $message_type->description; ?></h5>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	
	<hr>
</div>
</div>