
<?php $alert = "No result has been added"; ?>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>
<?php if($this->session->flashdata('warning')): ?>
<?php echo '<div class="alert alert-warning alert-dismissable">'.$this->session->flashdata('warning').'</div>'; ?>
<?php endif;?>
<?php $item_count = 1; ?>
<div class="row">
  <div class="table-responsive table-condensed">
    <h4 >
    <span class="label label-default">Students Result
       
       <!--  <small><a href="<?php echo base_url(); ?>examiner/results/upload_result" title="Upload multiple results at once " class="btn btn-md btn-primary pull-right">Upload in batch </a></small>
         <small><a href="<?php echo base_url(); ?>examiner/results/add" title="add result" class="btn btn-md btn-primary pull-right">Add Result</a></small> -->
    </span></h4>
    <?php if($results) :?>
    <table class="table table-responsive table-condensed table-striped table-hover table-bordered">
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
        
        <?php foreach($results as $result):?>

        <tr>
          <td><?php echo $item_count++; ?></td>
          <td><?php echo $result->matric; ?></td>
          <td><?php echo $result->code. ' - '.$result->course; ?></td>
          <td><?php echo $result->semester; ?></td>
          <td><?php echo $result->session ?></td>
          <td><?php echo $result->adjusted_mark ?></td>
          <td><?php echo $result->remark; ?></td>
          <td>
            <!-- <a href="<?php echo base_url(); ?>examiner/results/edit/<?php echo $result->id ;?>" title="edit" class="btn btn-sm btn-primary">Edit</a> -->
            <a href="<?php echo base_url(); ?>examiner/results/detail/<?php echo $result->id ;?> "title="details" class="btn btn-sm btn-warning">Details</a>
            <!-- <a href="<?php echo base_url(); ?>examiner/results/delete/<?php echo $result->id ;?>"title="delete" class="btn btn-sm btn-danger">Delete</a> -->
          </td>
        </tr>
        <?php endforeach;?>
        <?php else: ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>
</div>