<h4 class="text-justify" style="margin:  0 0 10px 0;"><span class="col-lg-offset-3 "><b>Courses</b></span></h4> <br>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<div>
  <?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
  </div> 
  
  <div class="row">
   <?php $item = 1; ?>
    <?php echo form_open('admin/courses/search'); ?>
    <div class="row">
      <div class="col-sm-6">
        <small class="pull-left"><a id="delete_button" href="<?php echo base_url(); ?>admin/courses/add" title="add course" class="btn btn-sm btn-success pull-left">Add New Course</a></small>
      </div>
      <div class="col-sm-2">
        <select name="course" style="width:120%; height:35px;font-size:13px;" class="form-control">
          <option value="0" >Select Search Column</option>
          <option value="title">Course Title</option>
          <option value="description">Description</option>
          <option value="code">Code</option>
          <option value="credit">Credit Unit</option>
        </select>
      </div>
      <div class="col-sm-2">
        <div class="form-group" style="dispaly:inline;">
          <input type="text" id="search" name="search_param" style="width:120%; height:35px;" class="form-control" placeholder="Enter Search item">
        </div>
      </div>
      <div class="col-sm-1">
        <button type="submit" class="btn-sm btn-default" style="width:148%; height:35px;">Search</button>
      </div>
      <?php echo form_close(); ?>
      <div class="col-sm-1">
        <button type="link" class="btn-sm btn-success" style="width:130%; height:35px;">Refresh</button>
      </div>
    </div>
  </div>
  <div class="row">
    <form method="post" accept-charset="utf-8" method="POST" action="<?php echo base_url(); ?>admin/courses/paginate">
      <div class="col-sm-1 pull-left" style="width:40px;" >
        <span class="label label-default" style="width:100px;">Show</span>
      </div>
      <div class="col-sm-2">
        <select name="course" style="width:45px; height:20px;font-size:13px;" onchange="this.form.submit()">
          <option value="<?php echo $index; ?>"><?php echo $index; ?></option>
          <option value="5"> 5</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="50">50</option>
          <option value="100">100</option>
          <option value="<?php echo $count; ?>">All</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Course Code</th>
              <th>Course Title</th>
              <th>Credit Unit</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            
            <?php if($courses) :?>
            <?php foreach($courses as $course):?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $course->code; ?></td>
              <td><?php echo $course->title; ?></td>
              <td><?php echo $course->credit; ?></td>
              <td>
                <a href="<?php echo base_url(); ?>admin/courses/edit/<?php echo $course->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
                <a href="<?php echo base_url(); ?>admin/courses/detail/<?php echo $course->id ;?> "title="details" class="btn btn-sm btn-warning">Details</a>
                <!-- <a href="<?php echo base_url(); ?>admin/courses/delete/<?php echo $course->id ;?>" onclick="confirmAction();" disabled title="delete" class="btn btn-sm btn-danger">Delete</a></td> -->
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <div>
            <h5>Showing : <?php echo $item - 1; ?> of <?php echo $count; ?> records</h5>
          </div>
        </div>
      </div>
      <?php else: ?>
       <h5>Showing : <?php echo $item - 1; ?> of <?php echo $count; ?> records</h5>
        <?php endif; ?>

      <script type="text/javascript">
      
      function confirmAction() {
      
      response = confirm("Are you sure you want to delete the item?");
      if(response == true){
      return true;
      }
      else if (response == false){
      event.preventDefault();
      }
      
      }
      </script>