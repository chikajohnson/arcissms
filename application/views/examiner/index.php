<div class="text-center">
	<h4> Welcome to ARCIS SMS RESULTCHECKING SYSTEM</h4>
	<hr>
</div>
<div class="col-sm-12">
	<h5>Recent Activities</h5>
	<?php $item_count = 1 ?>
	<?php if($activities): ?>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th style="width:25%" colspan="4">Date</th>				
				<th>Action</th>
				<th>Table</th>
				<th>User</th>
				<th>Message </th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($activities as $activity):?>		
			<tr>
				<td><?php echo $item_count; ?></td>
				<td colspan="4"><?php echo date('jS F Y  h:i:sa', strtotime($activity->create_date)); ?></td>
				<td><?php echo $activity->action; ?></td>
				<td><?php echo $activity->type; ?></td>
				<td><?php echo $activity->username; ?></td>
				<td><?php echo $activity->message; ?></td>				
			</tr>
		<?php $item_count ++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
	<hr>
	
<?php endif; ?>
</div>

