<div class="container" style="margin-top: 50px;">
<?php echo form_open('login/admin_login',['class'=>'form-horizontal'])?>
<fieldset>
    <legend style="text-align:center; margin-bottom: 50px; font-size: 30px;">Admin Login</legend>
    <?php if( $error=$this->session->flashdata('login_failed') ){?>
    <div class="row">
      <div class="col-md-6">
      <div class="alert alert-dismissible alert-danger">
      <?=$error?> 
  </div>
</div>
</div>
<?php };?>
    <div class="row">
      <div class="col-md-7">
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">User Name <span class="text-danger">*</span></label></label>
      <div class="col-md-9">
        <?php echo form_input(['name'=>'username', 'class'=>'form-control','placeholder'=>'Name','value'=>set_value('username')]); ?>
      </div>
      </div>
      </div>
      <div class="col-md-5"><?php echo form_error('username',"<div class='text-danger'>","</div>");?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-7">
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Password <span class="text-danger">*</span></label></label>
      <div class="col-md-9">
      <?php echo form_password(['name'=>'password', 'class'=>'form-control','placeholder'=>'Password']); ?>
        <!--<input type="password" class="form-control" id="inputPassword" placeholder="Password">-->
       </div>
       </div>
       </div>
       <div class="col-md-5"><?php echo form_error('password',"<div class='text-danger'>","</div>");?>
       </div>
       </div>
    <div class="form-group" style="margin-top: 10px;">
      <div class="col-lg-10 col-lg-offset-2">
      <?php echo form_submit(['name'=>'submit', 'value'=>'Login','class'=>'btn btn-primary']); ?>
      <?php echo form_reset(['name'=>'reset','value'=>'Reset', 'class'=>"btn btn-danger "]);?>
        <!--<button type="reset" class="btn btn-default">Cancel</button>-->
        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
      </div>
    </div>
  </fieldset>
</form>
</div>

