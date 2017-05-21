<?php include('admin_header.php');?>
<div class="container">
<h1><?php echo $article->title;?></h1>
<hr>
<?php if(  ! is_null($article->image_path) ) : ?>
<img style="text-align: center;" src="<?=$article->image_path ?>" alt="" width="500" height="350">
<?php endif; ?>
<p style="font-size: 1.3em; line-height: 1.25em; margin: 1.25em 0; text-align: justify; 
text-indent:1em;">
<?php echo $article->body;?></p>
</div>
<?php include('footer.php');?>