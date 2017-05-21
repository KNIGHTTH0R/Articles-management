<?php include_once('admin_header.php');?>

<div class="container" style="margin-top: 50px;">
<?php echo form_open("admin/update_article/{$article->sr_no}",['class'=>'form-horizontal']);?>

<fieldset>
    <legend style="text-align:center; margin-bottom: 50px; font-size: 30px;">Edit Article</legend>
 
      <div class="row">
      <div class="col-md-7">
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label"> Title <span class="text-danger">*</span></label>
      <div class="col-md-9">
<?php echo form_input(['name'=>'title', 'class'=>'form-control','placeholder'=>'Title Name','value'=>set_value('title',@$article->title)]);?>
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
<?php echo form_textarea(['name'=>'body', 'class'=>'form-control','placeholder'=>'Body','value'=>set_value('body',@$article->body)]); ?>
        <!--<input type="password" class="form-control" id="inputPassword" placeholder="Password">-->
       </div>
       </div>
       </div>
       <div class="col-md-5"><?php echo form_error('body',"<div class='text-danger'>","</div>");?>
       </div>
       </div>
    <div class="form-group" style="margin-top: 10px;">
      <div class="col-lg-10 col-lg-offset-2">
      <?php echo form_submit(['name'=>'submit', 'value'=>'Update','class'=>'btn btn-primary',]); ?>
      <?php echo form_reset(['name'=>'reset','value'=>'Reset', 'class'=>"btn btn-danger "]);?>
        <!--<button type="reset" class="btn btn-default">Cancel</button>-->
        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
      </div>
    </div>
  </fieldset>
</form>
</div></div>
<?php include_once('admin_footer.php');?>