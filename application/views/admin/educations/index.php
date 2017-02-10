<h4 style="margin:0 0 10px 0;"><span class="col-lg-offset-3 "><b>Students Educational Qualifications</b></span></h4><br>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<div>
  <?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
  </div>
  <div class="row">
    <?php $item_count = 1; ?>
    <?php echo form_open('admin/educations/search'); ?>
    <div class="row">
      <div class="col-sm-6">
        <small class="pull-left"><a id="delete_button" href="<?php echo base_url(); ?>admin/educations/add" title="add educational qualification" class="btn btn-sm btn-success pull-left">Add New Qualification</a></small>
      </div>
      <div class="col-sm-2">
        <select name="education" style="width:120%; height:35px;font-size:13px;" class="form-control">
          <option value="0" >Select Search Column</option>
          <option value="school_attended">Institution Attended</option>
          <option value="matric">Matric Obtained</option>
          <option value="discipline">Discipline</option>
          <!-- <option value="credit">Credit Unit</option> -->
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
    <form method="post" accept-charset="utf-8" method="POST" action="<?php echo base_url(); ?>admin/educations/paginate">
      <div class="col-sm-1 pull-left" style="width:40px;" >
        <span class="label label-default" style="width:100px;">Show</span>
      </div>
      <div class="col-sm-2">
        <select name="education" style="width:45px; height:20px;font-size:13px;" onchange="this.form.submit()">
          <option value="<?php echo $index; ?>"><?php echo $index; ?></option>
          <option value="1" >1</option>
          <option value="5">5</option>
          <option value="3">3</option>
          <option value="7">7</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="table-responsive">
        <?php if($educations) :?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Matric Number</th>
              <th>Institution Attended</th>
              <th>Discipline</th>
              <th>Degree Obtained</th>
              <!-- <th>Class of degree</th> -->
              <th>Award date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($educations as $education):?>
            <tr>
              <td><?php echo $item_count;  ?></td>
              <td><?php echo $education->matric; ?></td>
              <td><?php echo $education->school_attended; ?></td>
              <td><?php echo $education->discipline ?></td>
              <td><?php echo $education->degree_obtained ?></td>
              <!-- <td><?php echo $education->degree_class; ?></td> -->
              <td><?php echo date('jS F Y', strtotime($education->award_date)); ?></td>
              <td>
                <a href="<?php echo base_url(); ?>admin/educations/edit/<?php echo $education->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
                <a href="<?php echo base_url(); ?>admin/educations/detail/<?php echo $education->id ;?> "title="details" class="btn btn-sm btn-warning">Details</a><a href="<?php echo base_url(); ?>admin/educations/delete/<?php echo $education->id ;?>" onclick="confirmAction();";  title="delete" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            <?php $item_count++; ?>
            <?php endforeach;?>            
          </tbody>
        </table>
        <div>
          <h5>Showing : <?php echo $item_count - 1; ?> of <?php echo $count; ?> records</h5>
        </div>
      </div>
      <?php else: ?>
         <h5>Showing : <?php echo $item_count - 1; ?> of <?php echo $count; ?> records</h5>
      <?php endif; ?>
    </div>
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