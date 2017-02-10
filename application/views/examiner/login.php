<div class="container-fluid row">
  <?php echo form_open('login', 'class="form-signin"'); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h6 class="form-signin-heading text-center">Admin login</h6>
    </div>
    
    <?php if($this->session->flashdata('error')): ?>
    <?php echo '<div class="alert alert-danger alert-dismissable">'.$this->session->flashdata('error').'</div>'; ?>
    <?php endif;?>
    <?php echo validation_errors('<p class="alert alert-warning">'); ?>
      <div class="panel-body">
        <input type="email" id="email" name="email" class="form-control" placeholder="User Name" autofocus required value="<?php echo set_value('email'); ?>"">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <button class="btn btn-md btn-primary btn-block" type="submit"><strong>Log in </strong></button>
        <div class="form-group">
        </div>
        <hr />
        <span class="pull-right">
          <a href="<?php echo base_url(); ?>welcome/reset_password" >Forget password ? </a>
        </span>
      </div>
    </div>
    <?php echo form_open(); ?>   
      
  </div> <!-- /container -->