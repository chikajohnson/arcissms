<div class="row">
	<div class="table-responsive">
		<h4><span class="label label-default">Message Details<small><a href="<?php echo base_url(); ?>admin/messages" title="back to messages" class="btn btn-md btn-default pull-right">Back</a></small></span></h4>
	</div>
	<br>
	<table class="table table-striped table-condensed table-responsive" style="width:100%;">
		<tbody >
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Title :</strong></h5>
					</div>
					<div class="col-md-9">
						<h4><?php echo $message->title; ?></h4>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Content :</strong></h5>
					</div>
					<div class="col-md-9">
						<h4><?php echo $message->message; ?></h4>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Message Type :</strong></h5>
					</div>
					<div class="col-md-9">
						<h5><?php echo $message->message_type; ?></h5>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Status :</strong></h5>	
					</div>
					<div class="col-md-9">
						<?php if($message->sent == 0): ?>
						<h5><?php echo "Not sent"; ?></h5>
						<?php elseif($message->sent == 1): ?>) ?>
						<h5><?php echo "Sent"; ?></h5>
						<?php endif; ?>
					</div>
				</td>
			</tr>			
			<tr>
				<td>
					<div class="col-md-3">
						<h5><strong>Sent Time :</strong></h5>	
					</div>
					<div class="col-md-9">
					<?php if(empty($message->sent_time)): ?>
						<h5><?php echo "NA"; ?></h5>
					<?php else: ?>
						<h5><?php $message->sent_time;?></h5>
					<?php endif; ?>
					</div>
				</td>
			</tr>
			
		</tbody>
	</table>
	<div>
	<br>
		<small><a href="<?php echo base_url(); ?>admin/messages/send/<?php echo $message->id; ?>" title="send message" class="btn btn btn-success">Send Message</a></small>
	</div>
	<br>
	
	<hr>
</div>
</div>