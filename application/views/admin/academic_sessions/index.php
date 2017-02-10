<h4 style="margin: 0 0 10px 0;"><span class="col-lg-offset-3 "><b>Academic Sessions</b></span></h4><br>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<div>
  <?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
  </div>
  <div class="row">    
    <?php $item_count = 1; ?> 
    <?php echo form_open('admin/academic_sessions/search'); ?>  
    <div class="row">
      <div class="col-sm-6">
        <small class="pull-left"><a id="delete_button" href="<?php echo base_url(); ?>admin/academic_sessions/add" title="add new session" class="btn btn-sm btn-success pull-left">Add New Session</a></small>
      </div>
      <div class="col-sm-2">
        <select name="academic_session" style="width:120%; height:35px;font-size:13px;" class="form-control">
          <option value="0" >Select Search Column</option>
          <option value="name">Academic Session</option>
          <option value="session_starts">Start of session</option>
          <option value="session_ends">End of Session</option>
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
    <form method="post" accept-charset="utf-8" method="POST" action="<?php echo base_url(); ?>admin/academic_sessions/paginate">
      <div class="col-sm-1 pull-left" style="width:40px;" >
        <span class="label label-default" style="width:100px;">Show</span>
      </div>
      <div class="col-sm-2">
        <select name="academic_session" style="width:45px; height:20px;font-size:13px;" onchange="this.form.submit()">
          <option value="<?php echo $index; ?>"><?php echo $index; ?></option>
          <option value="1">5</option>
          <option value="2">10</option>
          <option value="3">100</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Academic Session</th>
              <th>Session Begins </th>
              <th>Session Ends</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if($academic_sessions) :?>
            <?php foreach($academic_sessions as $academic_session):?>
            <tr>
              <td><?php echo  $item_count ;  ?></td>
              <td><?php echo $academic_session->name; ?></td>
              <td><?php echo date('jS F Y', strtotime($academic_session->session_starts)) ; ?></td>
              <td><?php echo date('jS F Y', strtotime($academic_session->session_ends)); ?></td>
              <td>
                <a href="<?php echo base_url(); ?>admin/academic_sessions/edit/<?php echo $academic_session->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
                <a href="<?php echo base_url(); ?>admin/academic_sessions/detail/<?php echo $academic_session->id ;?> "title="details" class="btn btn-sm btn-warning">Details</a><a href="<?php echo base_url(); ?>admin/academic_sessions/delete/<?php echo $academic_session->id ;?>"title="delete" onclick="confirmAction();"  class="btn btn-sm btn-danger">Delete</a></td>
              </tr>
              <?php $item_count ++; ?>
              <?php endforeach;?>
              
            </tbody>
          </table>
        </div>
      </div>
      <div>
        <h5>Showing : <?php echo $item_count - 1; ?> of <?php echo $count; ?> records</h5>
      </div>
    </div>
  </div>
  <?php else: ?>
  <h5>Showing : <?php echo $item_count - 1; ?> of <?php echo $count; ?> records</h5>
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