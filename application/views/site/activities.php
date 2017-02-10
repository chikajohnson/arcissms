<div class="col-md-offset-3">
	<h4> Students Activities</h4>	
</div>
<hr>
<div class="col-sm-12">
	<?php $item_count = 1 ?>
	<?php if($activities): ?>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th style="width:25%" colspan="4">Date</th>				
				<th>Action</th>
				<th>User</th>
				<th>Phonenumber</th>
				<th>Message </th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($activities as $activity):?>		
			<tr>
				<td><?php echo $item_count; ?></td>
				<td colspan="4"><?php echo date('jS F Y  h:i:sa', strtotime($activity->request_time)); ?></td>
				<td><?php echo $activity->sms_type; ?></td>
				<td><?php echo $activity->matric; ?></td>
				<td><?php echo $activity->phonenumber; ?></td>
				<td><?php echo $activity->sms_message; ?></td>				
			</tr>
		<?php $item_count ++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
	<hr>
	
<?php endif; ?>
</div>

