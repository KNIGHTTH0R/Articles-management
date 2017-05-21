<html>
<head>
<title>Codeigniter with Faisal</title>
<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand" href="<?php echo base_url();?>">ArtiCles</a>
</div>
<div id="navbar">
<ul class="nav navbar-nav">
<?=form_open('users/search',['class'=>'navbar-form navbar-left','role'=>'search'])?>
<!--<form class="navbar-form navbar-right" role="search">-->
<div class="form-group">
<input type="text" name="query" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-primary">Search</button>
<?=form_close();?>
<?=form_error('query',"<p class='navbar-text text-danger'>","</p>");?>
</form>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="<?=base_url('login/admin_login')?>">Login</a></li>
</ul>
</div>
</div>
</nav>
