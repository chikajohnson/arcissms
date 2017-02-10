<h4 style="margin:0 0 10px 0;"><span class="col-lg-offset-3 "><b>Programs Of Study</b></span></h4><br>
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
        <small class="pull-left"><a id="delete_button" href="<?php echo base_url(); ?>admin/programs/add" title="add program of study" class="btn btn-sm btn-success pull-left">Add New Program</a></small>
      </div>
    </div>
  </div>  
  
  <div class="row">
    <div class="table-responsive">
    <?php if($programs) :?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nameof Program</th>
            <th>Type</th>
            <th>Department</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $item_count= 1; ?>
          <?php foreach($programs as $program):?>
          <tr>
            <td><?php echo $item_count; ?></td>
            <td><?php echo $program->name; ?></td>
            <td><?php echo $program->type; ?></td>
            <td><?php echo $program->department ?></td>
            <td>
              <a href="<?php echo base_url(); ?>admin/programs/edit/<?php echo $program->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
              <a href="<?php echo base_url(); ?>admin/programs/detail/<?php echo $program->id ;?>" title="details" class="btn btn-sm btn-warning">Details</a>
              <a href="<?php echo base_url(); ?>admin/programs/delete/<?php echo $program->id ;?>" onclick="confirmAction();" title="delete" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
          <?php $item_count ++ ; ?>
          <?php endforeach;?>
          <?php else: ?>
        </tbody>
      </table>
      <div class=""><h4><?php echo $alert ?></h4></div>
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