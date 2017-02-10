<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h1 class="panel-title">
			<strong style="font-size:28px;">Check your semester results with ease</strong>
			</h1>
		</div>
		<div class="panel-body">
			<form class="form-horizontal method="post" action="#">
				<div class="form-group">
					<label  class="col-sm-2 control-label">Matric Number</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="matric"
						placeholder="Enter matric number" autocomplete="false">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Mobile Number</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="phonenumber"
						placeholder="Enter mobile number" autocomplete="false">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Academic session</label>
					<div class="col-sm-10">
						<select name="session" class="form-control">
							<option value="0" >Select session</option>
							<?php if($sessions) : ?>
							<?php foreach($sessions as $session): ?>
							<option value="<?php echo $session->id; ?>"><?php echo $session->name; ?></option>
							<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Semester</label>
					<div class="col-sm-10">
						<select name="semester" class="form-control">
							<option value="0" >Select semester</option>
							<?php if($semesters) : ?>
							<?php foreach($semesters as $semester): ?>
							<option value="<?php echo $semester->id; ?>"><?php echo $semester->name; ?></option>
							<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Course</label>
					<div class="col-sm-10">
						<div class="radio">
							<label>
								<input type="radio" name="course" id="all-courses"
								value="all_courses" checked> Select All Courses in a semester
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="course" id="course-radio" value="courses">
								Select a specific Course
							</label>
						</div>
					</div>
				</div>
				<div class="form-group" id="course-div">
					<label  class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
						<select name="user_group" class="form-control">
							<option value="0" >Select course</option>
							<?php if($courses) : ?>
							<?php foreach($courses as $course): ?>
							<option value="<?php echo $course->id; ?>"><?php echo $course->code.'-'.$course->title; ?></option>
							<?php endforeach; ?>
							<?php endif;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" name="password" placeholder="Enter password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Check result</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> 