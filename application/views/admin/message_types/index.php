<h4 style="margin:0 0 10px 0;"><span class="col-lg-offset-3 "><b>Message Types</b></span></h4><br>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<div>
  <?php echo validation_errors('<br><p class="alert alert-warning">'); ?>
  </div>
  <div class="row">
    <?php $item = 1; ?>
    <div class="row">
      <div class="col-sm-12">
        <small class="pull-right"><a id="delete_button" href="<?php echo base_url(); ?>admin/message_types/add" title="add message type" class="btn btn-sm btn-success pull-right">Add New Message Type</a></small>
      </div>
    </div>
  </div>  
    <?php if($message_types) :?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Type of Message</th>
          <th>description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $item_count = 1; ?>
        <?php foreach($message_types as $message_type):?>
        <tr>
          <td><?php echo $item_count; ?></td>
          <td><?php echo $message_type->name; ?></td>
          <td><?php echo $message_type->description; ?></td>
          <td>
            <a id="edit_button" href="<?php echo base_url(); ?>admin/message_types/edit/<?php echo $message_type->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
            <a id="delete_button" href="<?php echo base_url(); ?>admin/message_types/delete/<?php echo $message_type->id ;?>" onclick="confirmAction();" title="delete" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
         <?php $item_count++ ; ?>
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