<?php include_once('admin_header.php');?>
<div class="container center">
<div class="row">
<div class="col-lg-6 col-lg-offset-6">
<a href="<?=base_url('admin/store_article')?>" class="btn btn- btn-primary pull-right">Add Article</a>

 </div>
 </div>
 <?php if( $feedback=$this->session->flashdata('feedback') ){
$feedback_class=$this->session->flashdata('feedback_class');
 	?>
    <div class="row">
      <div class="col-md-6 col-lg-offset-3">
      <div class="alert alert-dismissible <?=$feedback_class?>" >
      <?=$feedback?> 
  </div>
</div>
</div>
<?php };?>
<table class="table center" style="text-align: ; margin-top: 20px;">
	<thead>
		<th style="text-align: center;">Sr.No.</th>
		<th style="text-align: center;">Title</th>
		<th style="text-align: center;">Body</th>
		<th style="padding-left: 65px;">Action</th>
	</thead>
	<tbody style="overflow: scroll; text-align:center;">
	<?php if(count($articles) ):
	    $count=$this->uri->segment(3,0);
		foreach($articles as $article):
           $count++;
			?>
		<tr>
		    <td><?= $count ?></td>
		    <td><?php echo $article->title; ?></td>
			<td><?php echo $article->body; ?></td>
			<td>
			<div class="row">
			<div class="col-lg-6">
                  <?=anchor("admin/edit_article/{$article->sr_no}",'Edit',['class'=>'btn btn-default']);?>
				<!--<a href="" class="btn btn-default">Edit</a>-->
			</div>
			<div class="col-lg-2">
			<?=
			  form_open('admin/delete_article'),
			  form_hidden('article_id',$article->sr_no),
			  form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
			  form_close();
			  ?>
			  </div>
			  </div>
				<!--<a href="" class="btn btn-danger">Delete</a>-->
			</td>
		</tr>
	<?php endforeach;?>
<?php else:?>
	<tr>
	<td colspan="3">No Records Found</td>
	</tr>
<?php endif;?>
	</tbody>
</table>
 <?=$this->pagination->create_links();?>    
</div>
<?php include_once('admin_footer.php');?>