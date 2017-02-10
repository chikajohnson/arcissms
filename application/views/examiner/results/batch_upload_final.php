<h3><b>examiner Dashboard</b></h3>
<?php $alert = "No result has been added"; ?>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>

<?php if($this->session->flashdata('info')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('info').'</div>'; ?>
<?php endif;?>
<div class="row">
  <div class="table-responsive">    
    <span class="">
        <?php if($results) :?>
         <small><a href="<?php echo base_url(); ?>examiner/results/cancel_batch_upload/<?php echo $results[0]->batch_upload_code ;?>" title="Cancel the upload of results" class="btn btn-lg btn-danger pull-right">Cancel Upload</a></small>
         <small><a href="<?php echo base_url(); ?>examiner/results/commit_batch_upload/<?php echo $results[0]->batch_upload_code ;?>"  title="Commit uploaded results to databse" class="btn btn-lg btn-success pull-right">Finish Upload</a></small>
       <?php endif; ?>
    </span>
    <?php if($results) :?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Matric Number</th>
          <th>Course</th>
          <th>Semester</th>
          <th>Academic Session</th>
          <th>Total Score</th>
          <th>Upload Code</th>
          <th>Remark</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($results as $result):?>
        <tr>
          <td><?php echo $result->id; ?></td>
          <td><?php echo $result->matric; ?></td>
          <td><?php echo $result->code. ' - '.$result->course; ?></td>
          <td><?php echo $result->semester; ?></td>
          <td><?php echo $result->session ;?></td>
          <td><?php echo $result->adjusted_mark; ?></td>
          <td><?php echo $result->batch_upload_code; ?></td>
          <td><?php echo $result->remark;?></td>
        </tr>
        <?php endforeach;?>
        <?php else: ?>
      </tbody>
    </table>
    <div class=""><h4><?php echo $alert ?></h4></div>
    <?php endif; ?>
  </div>
</div>