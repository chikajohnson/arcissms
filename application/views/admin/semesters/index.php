<h4 style="margin:0 0 10px 0 ;"><span class="col-lg-offset-3 "><b>Semesters</b></span></h4>
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
        <small class="pull-left"><a id="delete_button" href="<?php echo base_url(); ?>admin/semesters/add" title="add semester" class="btn btn-sm btn-success pull-left">Add New Semester</a></small>
      </div>
    </div>
  </div>  
  <br>
  <div class="row">
    <div class="table-responsive">
     
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th> Name of semester</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $item_count = 1; ?>
          <?php if($semesters) :?>
          <?php foreach($semesters as $semester):?>
          
          <tr>
            <td><?php echo $item_count; ?></td>
            <td><?php echo $semester->name; ?></td>
            <td>
              <a href="<?php echo base_url(); ?>admin/semesters/edit/<?php echo $semester->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
              <a href="<?php echo base_url(); ?>admin/semesters/delete/<?php echo $semester->id ;?>" onclick="confirmAction();" title="delete" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
            <?php $item_count ++ ;?>
            <?php endforeach;?>
            <?php endif; ?>
          </tbody>
        </table>
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