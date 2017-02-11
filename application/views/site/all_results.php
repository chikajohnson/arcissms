<div class="container-fluid">
	<div  id="print_html" class="row col-sm-11">
		<div class="page-header text-center">
			<h3>
			<?php $item_count = 1; ?>
			<?php //var_dump($results); die(); ?>
			<?php if($results): ?>
			Examination Results
			<span class="pull-right">
				<small class="">
				<b>Matric Number : &nbsp; <?php echo $results[0]->matric; ?>
				</b>
				</small>
				<small class="">
				<b>&nbsp;     | &nbsp;  Session : &nbsp; <?php echo $results[0]->session; ?>
				</b>
				</small>
				<small class="">
				<b>&nbsp;     | &nbsp;  Semester : &nbsp; <?php echo $results[0]->semester; ?>
				</b>
				</small>
			</span>
			</h3>
		</div>
		
		<div class="row" style="font-size: 18px;">
			<div class="col-sm-5">
				<span class="label label-default">Name : </span>
				<small class=""><b> &nbsp; <?php echo $results[0]->last_name.' '.$results[0]->first_name.' '. $results[0]->other_names; ?></b></small>
			</div>
			<div class="col-sm-6">
				<span class="label label-default">Program of Study : </span>
				<small class=""><b> &nbsp; <?php echo $results[0]->program; ?></b></small>
			</div>
			<div class="col-sm-1 back">
				<a href="" title="" class="btn btn-sm btn-default"><strong>&nbsp;Back&nbsp;</strong></a>
			</div>
		</div>
		<div class="row text-left ">
			<table class="table table-condensed table-hover table-striped table-bordered table-responsive" style="margin-top:20px">
				<thead>
					<tr>
						<th>#</th>
						<th>Course</th>
						<th>Assessement</th>
						<th>Exam Total</th>
						<th>Total Score</th>
						<th>Remarks</th>
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
					
					<?php foreach($results as $result):?>
					<tr>
						<td><?php echo $item_count; ?></td>
						<td><?php echo $result->course; ?></td>
						<td><?php echo $result->assessment; ?></td>
						<td><?php echo $result->exam_score; ?></td>
						<?php if($result->adjusted_mark >= 40): ?>
						<td>
							<span><strong> &nbsp;<?php echo $result->adjusted_mark;
								?>
							</strong></span>
						</td>
						<?php elseif($result->adjusted_mark < 40): ?>
						<td>
							<span><strong> &nbsp;<?php echo $result->adjusted_mark; ?>
							</strong></span>
						</td>
						<?php endif; ?>
						<?php if($result->adjusted_mark >= 40): ?>
						<td><h3 class="label label-success" style="margin-left: 10px; padding:5px 20px;font-size:14px"> &nbsp;PASS</h3></td>
						<?php elseif($result->adjusted_mark < 40): ?>
						<td><h3 class="label label-danger" style="margin-left: 10px; padding:5px 20px;font-size:14px"> &nbsp;PASS</h3></td>
						<?php endif; ?>
						<!-- <td>
							<a href="<?php echo base_url(); ?>site/check_result/<?php echo $result->id ;?>" title="" class="btn btn-sm btn-primary">Detail</a>
						</td> -->
					</tr>
					<?php $item_count ++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<div class="col-sm-offset-3">
				<h3>Total Number of Courses : <?php echo $item_count - 1; ?></h3>
			</div>
			<div class="row">
				<a href="" title="Back to results" class="pull-left btn btn-lg btn-default glyphicon glyphicon-arrow-left"></a>
				<a id="print" class="btn btn-lg btn-danger pull-right" 
				onclick="hideButton(); printJS({ printable: 'print_html', type: 'html', maxWidth: 800, showModal: true}); showButton();">Export Result as PDF</a>
			</div>
		</div>
	</div>
	<?php else:?>
	<h3>
	<strong>Student Examination Results</strong>
	</h3>
	<hr>
	
	<div class="panel-body">
		<div class="list-group">
			<p class="list-group-item-text">
				<ul class="list-group">
					<li class="list-group-item  text-center">
						<h4 class="">
						<strong class="text-danger">Result is not available!!!</strong>
						<a href="" title="Back to results" class="pull-right btn btn-lg btn-default glyphicon glyphicon-arrow-left"></a>	
						</h4>
					</li>
				</ul>
			</p>
		</div>
	</div>
	<?php endif; ?>
</div>
</div>
<script type="text/javascript">
	function hideButton(){
		$('.back').hide();
		$('#print').hide();
	}
	function showButton(){
		$('#print').show();
		$('.back').show();
	}
</script>