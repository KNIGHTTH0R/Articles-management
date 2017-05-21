<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/styles.css">
</head>
<style>
p + p {
text-indent: 1em;
}
</style>
<body>
<nav class="navbar navbar-inverse">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand" href="#">Admin Panel</a>
</div>
<div id="navbar">
<ul class="nav navbar-nav">
<li><a href="<?=base_url('articles_list')?>">All Articles</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="<?=base_url('login/logout')?>">Logout</a></li>
</ul>
</div>
</div>
</nav>
