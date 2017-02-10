<div class="row">
	<div class="col-md-12">
		<h4><b>Edit Course</b></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class=" "></i> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>admin/courses"><i class=" "></i>Courses</a></li>
			<li class="active"><i class=" "></i> Edit course</li>
		</ol>
	</div>
</div>
<?php echo form_open('admin/courses/edit/'.$course->id); ?>
<div class="form-group">
	<label>Course code</label>
	<input name="code" type="text" class="form-control" placeholder="Enter course code" value="<?php echo $course->code; ?>">
</div>
<div class="form-group">
	<label>Course Title</label>
	<input name="title" type="text" class="form-control" placeholder="Enter course title" value="<?php echo $course->title; ?>">
</div>
<div class="form-group">
	<label>Course Description</label>
	<textarea name="description" placeholder="Course Description" class="form-control" ><?php echo $course->description; ?></textarea>
</div>
<div class="form-group">
	<label>Credit Unit</label>
	<input name="credit" type="number" class="form-control" placeholder="Enter course unit" value="<?php echo $course->credit; ?>">
</div>
<div class="col-md-12">
	<div class="btn-group pull-right">
		<input type="submit" name="Edit" value="Edit " id="page_submit" class="btn btn-sm btn-primary">
		<a href="<?php echo base_url(); ?>admin/courses" class="btn btn-sm btn-default">Close</a>
	</div>
</div>
<?php echo form_close(); ?>