<div class="row">
	<div class="table-responsive">
		<h4 ><span class="label label-default">Courses Details<small><a href="<?php echo base_url(); ?>admin/courses" title="back to courses" class="btn btn-md btn-default pull-right">Back</a></small></span></h4>
	</div>
	<hr>
	<table class="table table-striped table-condensed table-responsive" style="width:100%;">
		<tbody >
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Course Code :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $course->code; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Courses Title :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $course->title; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Description :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $course->description; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Credit Unit :</strong></h5>					</div>
					<div class="col-md-9">
						<h5><?php echo $course->credit; ?></h5>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	
	<hr>
</div>
</div>