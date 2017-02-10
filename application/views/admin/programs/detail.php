<div class="row">
	<div class="table-responsive">
		<h4 ><span class="label label-default">Program of Study Details<small><a href="<?php echo base_url(); ?>admin/programs" title="back to program of studies" class="btn btn-md btn-default pull-right">Back</a></small></span></h4>
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
						<h5><?php echo $program->name; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Type :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $program->type; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Description :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $program->description; ?></h5>
					</div>
				</td>
			</tr>			
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Departmemt :</strong></h5>					</div>
					<div class="col-md-9">
						<h5><?php echo $program->department; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Faculty :</strong></h5>					</div>
					<div class="col-md-9">
						<h5><?php echo $program->faculty; ?></h5>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	
	<hr>
</div>
</div>