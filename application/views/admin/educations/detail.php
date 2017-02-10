<div class="row">
	<div class="table-responsive">
		<h4 ><span class="label label-default">Educational Qualification Details<small><a href="<?php echo base_url(); ?>admin/educations" title="back to education" class="btn btn-md btn-default pull-right">Back</a></small></span></h4><br>
	</div>
	 <table class="table table-hover table-striped" style="width:60%">    
	    <tbody>
	    <tr>
	        <td><h5><strong>Name</strong></h5></td>
	        <td><h5><?php echo $education->last_name. ' '. $education->first_name. ' '. $education->other_names ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Matric Number</strong></h5></td>
	        <td><h5><?php echo $education->matric ;?></h5></td>
	     </tr>  
	      <tr >
	        <td><h5><strong>Institutiuon Attended</strong></h5></td>
	        <td><h5><?php echo $education->school_attended ;?></h5></td>
	        
	     </tr>  
	      <tr>
	        <td><h5><strong>Country</strong></h5></td>
	        <td><h5><?php echo $education->country ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>City</strong></h5></td>
	        <td><h5><?php echo $education->city ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Date of Admission</strong></h5></td>
	        <td><h5><?php echo date('jS F Y', strtotime($education->study_period_start ));?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Date of Graduation</strong></h5></td>
	        <td><h5><?php echo date('jS F Y', strtotime($education->study_period_end)) ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Date of Award of Certificate</strong></h5></td>
	        <td><h5><?php echo date('jS F Y', strtotime($education->award_date));?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Discipline</strong></h5></td>
	        <td><h5><?php echo $education->discipline ;?></h5></td>
	     </tr> 
	     <tr>
	        <td><h5><strong>Department</strong></h5></td>
	        <td><h5><?php echo $education->department ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Faculty</strong></h5></td>
	        <td><h5><?php echo $education->faculty ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Degree Obtained</strong></h5></td>
	        <td><h5><?php echo $education->degree_obtained ;?></h5></td>
	     </tr>  
	      <tr>
	        <td><h5><strong>Class of Degree</strong></h5></td>
	        <td><h5><?php echo $education->degree_class ;?></h5></td>
	     </tr>  
	       
	    </tbody>
  	</table>	
</div>
</div>