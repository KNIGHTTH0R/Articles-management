<?php include_once('articles_list_header.php');?>
<div class="container">
<h1>Search Results</h1>
<hr style="background-color:blue;"/>
<table class="table table-striped table-hover center">
  <thead>
     <tr>
       <th style="text-align: center;">Sr.No.</th>
       <th style="text-align: center;">Title</th>
       <th style="text-align: center;">Published On</th>
     </tr>
  </thead>
  <tbody>
  	 <tr>
  	 <?php if(count($articles) ):
  	 $count=$this->uri->segment(3,0);
  	 foreach ($articles as $article):
  	 	$count++;
  	 ?>
  	   <td style="text-align: center;"><?=$count;?></td>
  	   <td style="text-align: center;"><?=$article->title;?></td>
  	   <td style="text-align: center;"><?=date('d M y H:i:s', strtotime($article->created_at) );;?></td>
  	  </tr>
  	  <?php endforeach;?>
  	  <?php else:?>
  	  <tr>
  	  <td colspan="3">No Records Found.</td>
  	  </tr>
  	  <?php endif;?> 
  </tbody>
</table>
   
<?php include_once('footer.php');?>
