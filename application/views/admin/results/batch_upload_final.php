<?php $alert = "No result has been added"; ?>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif;?>

<?php if($this->session->flashdata('info')): ?>
<?php echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('info').'</div>'; ?>
<?php endif;?>
<div id="upload_div">
    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
    <h3 class="text-danger">
      <span class="sr-only">Loading...</span>
    </h3>
  </div> 
<div class="row">
  <div class="table-responsive">
    <span class="">
        <?php if($results) :?>
         <small><a href="<?php echo base_url(); ?>admin/results/cancel_batch_upload/<?php echo $results[0]->batch_upload_code ;?>" title="Cancel the upload of results" class="btn btn-sm btn-danger pull-right">Cancel Upload</a></small>
         <small><a href="<?php echo base_url(); ?>admin/results/commit_batch_upload/<?php echo $results[0]->batch_upload_code ;?>"  title="Commit uploaded results to databse" onclick="confirmUpload();" class="btn btn-sm btn-success pull-right ">Finish Upload</a></small>
       <?php endif; ?>
    </span>
    <?php $item_count = 1; ?>
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
          <td><?php echo $item_count; ?></td>
          <?php if($result->isvalid == 0): ?>
          <td><?php echo $result->matric; ?>&nbsp;<span class="text-warning" title="Invalid matric number"><b>&nbsp;invalid</b></span></td>
          <?php else: ?>
          <td><?php echo $result->matric; ?></td>
          <?php endif ?>
          <td><?php echo $result->code. ' - '.$result->course; ?></td>
          <td><?php echo $result->semester; ?></td>
          <td><?php echo $result->session ;?></td>
          <td><?php echo $result->adjusted_mark; ?></td>
          <td><?php echo $result->batch_upload_code; ?></td>
          <td><?php echo $result->remark;?></td>
        </tr>
        <?php $item_count++  ; ?>
        <?php endforeach;?>
        <?php else: ?>
      </tbody>
    </table>
    <div class=""><h4><?php echo $alert ?></h4></div>
     
    <?php endif; ?>
  </div>
</div>

<script type="text/javascript">
     
      function validateInputs() {
      $('#upload_div').show();  
    }
  
    
     function confirmUpload() {
      
      response = confirm("Are you sure you want to upload the results? Only valid results will be uploaded. ");
      if(response == true){
        validateInputs()
        return true;
      }
      else if (response == false){       
         event.preventDefault();
      }
     
    }


   



</script>