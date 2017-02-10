<h4 style="margin:0 0 10px 0;"><span class="col-lg-offset-3 "><b>Student Records</b></span></h4><br>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<div>
  <?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
  </div>
  <div class="row">
    <?php $item = 1; ?>
    <?php echo form_open('admin/students/search'); ?>
    <div class="row">
      <div class="col-sm-6">
        <small class="pull-left"><a id="delete_button" href="<?php echo base_url(); ?>admin/students/add" title="add student" class="btn btn-sm btn-success pull-left">Add New student</a></small>
      </div>
      <div class="col-sm-2">
        <select name="student" style="width:120%; height:35px;font-size:13px;" class="form-control">
          <option value="0" >Select Search Column</option>
          <option value="matric">Matric Number</option>
          <option value="email">Email</option>
          <option value="last_name">Name</option>
          <option value="phonenumber1">Phonenumber</option>
          <option value="application_number">Application Number</option>          
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
    <form method="post" accept-charset="utf-8" method="POST" action="<?php echo base_url(); ?>admin/students/paginate">
      <div class="col-sm-1 pull-left" style="width:40px;" >
        <span class="label label-default" style="width:100px;">Show</span>
      </div>
      <div class="col-sm-2">
        <select name="student" style="width:45px; height:20px;font-size:13px;" onchange="this.form.submit()">
          <option value="<?php echo $index; ?>"><?php echo $index; ?></option>          
          <option value="100000">All</option>
          <option value="10">10</option>
          <option value="100">100</option>
          <option value="1000">1000</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="">
      <br>
        <table class="table table-striped table table-responsive table-condensed table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Matric Number</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Program of Studies</th>
              <th>Session</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if($students): ?>
            <?php foreach($students as $student):?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $student->matric; ?></td>
              <td><?php echo $student->last_name. '  '. $student->first_name; ?></td>
              <td><?php echo $student->phonenumber1; ?></td>
              <td><?php echo $student->email; ?></td>
              <td><?php echo $student->program; ?></td>
              <td><?php echo $student->session; ?></td>
              <td>
                <a href="<?php echo base_url(); ?>admin/students/edit/<?php echo $student->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
                <a href="<?php echo base_url(); ?>admin/students/detail/<?php echo $student->id ;?>" click="confirmAction();" title="detail" class="btn btn-sm btn-warning">Detail</a>
               </td> 
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