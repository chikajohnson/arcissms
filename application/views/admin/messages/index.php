<h4 style="margin:0 0 10px 0;"><span class="col-lg-offset-3 "><b>Messages</b></span></h4><br>
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
        <small class="pull-right"><a id="delete_button" href="<?php echo base_url(); ?>admin/messages/add" title="add message" class="btn btn-sm btn-success pull-right">Add New Message</a></small>
      </div>
    </div>
  </div>  
  <div class="row">
    <div class="table-responsive">
      <?php if($messages) :?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>Message Type</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $item_count  =1; ?>
          <?php foreach($messages as $message):?>
          <tr>
            <td><?php echo $item_count; ?></td>
            <td><?php echo $message->title; ?></td>
            <td><?php echo $message->message_type; ?></td>
            <?php if($message->sent == 0): ?>
            <td><?php echo "Not sent"; ?></td>
            <?php elseif($message->sent == 1): ?>
            <td><?php echo "sent" ?></td>
            <?php endif; ?>
            <td>
              <a href="<?php echo base_url(); ?>admin/messages/edit/<?php echo $message->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
              <a href="<?php echo base_url(); ?>admin/messages/detail/<?php echo $message->id ;?> "title="details" class="btn btn-sm btn-warning">Details</a>
              <a href="<?php echo base_url(); ?>admin/messages/delete/<?php echo $message->id ;?>" onclick="confirmAction();" title="delete" class="btn btn-sm btn-danger">Delete</a>
              <a href="<?php echo base_url(); ?>admin/messages/detail/<?php echo $message->id ;?>" title="send message" class="btn btn-sm btn-success">Send</a>
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