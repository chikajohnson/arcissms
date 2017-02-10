<div class="row">
	<div class="table-responsive">
		<h4 ><span class="label label-default">Academic Session Details<small><a href="<?php echo base_url(); ?>admin/academic_sessions" title="Back to academic session" class="btn btn-md btn-default pull-right">Back</a></small></span></h4>
	</div>
	<hr>
	<table class="table table-hover table-striped" style="width:60%">    
	    <tbody>
	    <tr>
	        <td><h5><strong>Name of Academic Session</strong></h5></td>
	        <td><h5><?php echo $session->name ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Description of Academic Session</strong></h5></td>
	        <td><h5><?php echo $session->description ;?></h5></td>
	     </tr>  
	      <tr >
	        <td><h5><strong>Academic session Start Date</strong></h5></td>
	        <td><h5><?php echo date('jS F Y', strtotime($session->session_starts)); ?></h5></td>
	        
	     </tr>  
	      <tr>
	        <td><h5><strong>Academic sesion End Date</strong></h5></td>
	        <td><h5><?php echo date('jS F Y', strtotime($session->session_starts)); ?></h5></td>
	     </tr>  
	      	       
	    </tbody>
  	</table>	
	
</div>