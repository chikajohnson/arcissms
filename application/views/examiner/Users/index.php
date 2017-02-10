<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<?php $item_count = 1; ?>
<div class="row">
  <div class="table-responsive">
    <h4 ><span class="label label-default">User Information<small><a  href="<?php echo base_url(); ?>examiner/users/add" title="add user" class="btn btn-sm btn-success pull-right">Add User</a></small></span></h4>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>User Name</th>    
          <th>Full Name</th>
          <th>email</th>         
          <th>Phone Number</th>
          <!-- <th>Password</th> -->
          <th>UserGroup</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if($users) :?>
        <?php foreach($users as $user):?>
        <tr>
          <td><?php echo $item_count++; ?></td>
          <?php if($user->status == false): ?>
            <td><?php echo $user->user_name; ?>&nbsp;<span class="label label-danger">Inactive</span></td> 
          <?php elseif($user->status == true): ?>
            <td><?php echo $user->user_name; ?></td> 
          <?php endif; ?>
          <td><?php echo $user->last_name.' &nbsp;'.$user->first_name; ?></td> 
           <td><?php echo $user->email; ?></td> 
          <td><?php echo $user->phonenumber; ?></td>
          <!-- <td><?php echo $user->password; ?></td> -->
          <td><?php echo $user->group; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>examiner/users/edit/<?php echo $user->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a>
            <a href="<?php echo base_url(); ?>examiner/users/detail/<?php echo $user->id ;?> " title="details" class="btn btn-sm btn-warning">Details</a>
            <?php if($user->status == false): ?>
            <a  href="<?php echo base_url(); ?>examiner/users/activate/<?php echo $user->id ;?>" onclick="confirmActionActivate()" title="activate Account" class="btn btn-sm btn-success">activate</a>
            <?php elseif($user->status == true): ?>
              <?php if($user->group == "examiner"): ?><!-- 
                <a  href="<?php echo base_url(); ?>examiner/users/suspend/<?php echo $user->id ;?>"  title="suspend Account" class="btn btn-sm btn-danger">suspend</a> -->             
              <?php else: ?>
                <a  href="<?php echo base_url(); ?>examiner/users/suspend/<?php echo $user->id ;?>" onclick="confirmActionSuspend()" title="suspend Account" class="btn btn-sm btn-danger">suspend</a>
              <?php endif; ?>
              <?php endif; ?>
             
          </td>
          </tr>
          <?php endforeach;?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

 <script type="text/javascript">
     
     function confirmActionActivate() {
      
      response = confirm("Are you sure you want to Activate this account?");
      if(response == true){
        return true;
      }
      else if (response == false){       
         event.preventDefault();
      }
     
    }

     function confirmActionSuspend() {
      
      response = confirm("Are you sure you want to Suspend this account?");
      if(response == true){
        return true;
      }
      else if (response == false){       
         event.preventDefault();
      }
     
    }


</script>