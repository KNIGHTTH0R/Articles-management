<?php include_once('admin_header.php');?>

<div class="container" style="margin-top: 50px;">
<?php echo form_open_multipart('admin/store_article',['class'=>'form-horizontal'])?>
<?php echo form_hidden('user_id',$this->session->userdata('user_id'));?>
<?=form_hidden('created_at',date('Y-m-d H:i:s'))?>
<fieldset>
    <legend style="text-align:center; margin-bottom: 50px; font-size: 30px;">Add Article</legend>
 
      <div class="row">
      <div class="col-md-7">
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label"> Title <span class="text-danger">*</span></label>
      <div class="col-md-9">
    <?php echo form_input(['name'=>'title', 'class'=>'form-control','placeholder'=>'Title Name','value'=>set_value('title')]);?>
      </div>
      </div>
      </div>
      <div class="col-md-5"><?php echo form_error('title',"<div class='text-danger'>","</div>");?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-7">
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label"> Body <span class="text-danger">*</span></label>
      <div class="col-md-9">
      <?php echo form_textarea(['name'=>'body', 'class'=>'form-control','placeholder'=>'Body','value'=>set_value('body')]); ?>
        <!--<input type="password" class="form-control" id="inputPassword" placeholder="Password">-->
       </div>
       </div>
       </div>
       <div class="col-md-5"><?php echo form_error('body',"<div class='text-danger'>","</div>");?>
       </div>
       </div>
       <div class="row">
      <div class="col-md-7">
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label"> File Upload</label>
      <div class="col-md-9">
    <?php echo form_upload(['name'=>'userfile', 'class'=>'form-control']);?>
      </div>
      </div>
      </div>
      <div class="col-md-5"><?php if(isset($upload_error)) echo $upload_error ?>
    </div>
    </div>
    <div class="form-group" style="margin-top: 10px;">
      <div class="col-lg-10 col-lg-offset-2">
      <?php echo form_submit(['name'=>'submit', 'value'=>'Add','class'=>'btn btn-primary',]); ?>
      <?php echo form_reset(['name'=>'reset','value'=>'Reset', 'class'=>"btn btn-danger "]);?>
        <!--<button type="reset" class="btn btn-default">Cancel</button>-->
        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
      </div>
    </div>
  </fieldset>
</form>
</div></div>
<?php include_once('admin_footer.php');?>