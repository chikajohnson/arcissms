
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<div class="row">

  <div class="table-responsive">
    <h4 ><span class="label label-default">Usergroup Information<small><a href="<?php echo base_url(); ?>examiner/usergroups/add" title="add usergroup" class="btn btn-sm btn-success pull-right">Add Usergroup</a></small></span></h4>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php $item_count = 1; ?>
        <?php if($usergroups) :?>
        <?php foreach($usergroups as $usergroup):?>
        <tr>
          <td><?php echo $item_count++; ?></td>
          <td><?php echo $usergroup->name; ?></td>
          <td><?php echo $usergroup->description; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>examiner/usergroups/edit/<?php echo $usergroup->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
            <a href="<?php echo base_url(); ?>examiner/usergroups/detail/<?php echo $usergroup->id ;?> "title="details" class="btn btn-sm btn-warning">Details</a>
            <!-- <a href="<?php echo base_url(); ?>examiner/usergroups/delete/<?php echo $usergroup->id ;?>"title="delete" onclick="confirmAction();"; class="btn btn-click btn-sm btn-danger">Delete</a></td> -->
          </tr>          
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