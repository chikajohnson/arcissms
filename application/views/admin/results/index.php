<h4 style="margin:0 0 10px 0;"><span class="col-lg-offset-3 "><b>Student Examination Results</b></span></h4><br>
<?php if($this->session->flashdata('success')): ?>
  <?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<?php if($this->session->flashdata('cancel_upload')): ?>
  <?php echo '<div class="alert alert-warning alert-dismissable">'.$this->session->flashdata('cancel_upload').'</div>'; ?>
<?php endif;?>
<div>
  <?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
  </div>
  <div class="row">
    <?php $item = 1; ?>
    <?php echo form_open('admin/results/search'); ?>
    <div class="row">
      <div class="col-sm-6">
        <small class="pull-left"><a id="delete_button" href="<?php echo base_url(); ?>admin/results/add" title="add result" class="btn btn-sm btn-success pull-left">Add New result</a></small>
        <small class="pull-left"><a  href="<?php echo base_url(); ?>admin/results/upload_result" title="Upload in batch" class="btn btn-sm btn-success pull-left">Upload Results in Batch</a></small>
      </div>
      <div class="col-sm-2">
        <select name="result" style="width:120%; height:35px;font-size:13px;" class="form-control">
          <option value="0" >Select Search Column</option>
          <option value="matric">Matric Number</option>
          <option value="remark">Remark</option>
          <option value="assessment">Assessment</option>
          <option value="total_score">Total Score</option>
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
    <form method="post" accept-charset="utf-8" method="POST" action="<?php echo base_url(); ?>admin/results/paginate">
      <div class="col-sm-1 pull-left" style="width:40px;" >
        <span class="label label-default" style="width:100px;">Show</span>
      </div>
      <div class="col-sm-2">
        <select name="result" style="width:45px; height:20px;font-size:13px;" onchange="this.form.submit()">
          <option value="<?php echo $index; ?>"><?php echo $index; ?></option>
          <option value="10" >10</option>
          <option value="100">100</option>
           <option value="200">200</option>
            <option value="500">500</option>
          <option value="1000">1000</option>
          <option value="<?php echo $count; ?>">All</option>
        </select>
      </div>      
    </div>
    <div class="row">
      <div class="">
      <br>
        <table class="table table-striped table table-responsive table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Matric Number</th>
              <th>Course</th>
              <th>Semester</th>
              <th>Academic Session</th>
              <th>Total Score</th>
              <th>Remark</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

          <?php if($results) :?>
            <?php foreach($results as $result):?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $result->matric; ?></td>
              <td><?php echo $result->code. ' - '.$result->course; ?></td>
              <td><?php echo $result->semester; ?></td>
              <td><?php echo $result->session ?></td>
              <td><?php echo $result->adjusted_mark ?></td>
              <td><?php echo $result->remark; ?></td>
              <td>
                <a href="<?php echo base_url(); ?>admin/results/edit/<?php echo $result->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
                <a href="<?php echo base_url(); ?>admin/results/detail/<?php echo $result->id ;?> " title="details" class="btn btn-sm btn-warning">Details</a><a href="<?php echo base_url(); ?>admin/results/delete/<?php echo $result->id ;?>" onclick="confirmAction();" title="delete" class="btn btn-sm btn-danger">Delete</a>
              </td>
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
  </div>
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