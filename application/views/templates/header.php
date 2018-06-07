<html>
	<head>
		<title>ciBlog</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
		<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/style.css">
		<script src="http://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
	</head>
	<body>
		<nav class="navbar  navbar-expand-sm">
	    <div class="container">
	        <a class="navbar-brand" href="<?php echo base_url(); ?>">BgBro</a>
	    <ul class="navbar-nav ml-auto">
	      	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>
	      	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>about">About</a></li>
	      	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a></li>
	      	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>categories">Categotries</a></li>

	    </ul>
	    <ul class="navbar-nav navbar-left">
	    	<?php if(!$this->session->userdata('logged_in')) :?>
		    	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a></li>
		    	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a></li>
	        <?php endif; ?>
	        <?php if($this->session->userdata('logged_in')) :?>
		      	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Blog</a></li>
		      	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
		      	<li class="nav-list"><a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
	      	<?php endif; ?>
	    </ul>
	    </div>
    </nav>
    <div class="container">

    <!-- Flash message -->
    <?php if($this->session->flashdata('user_registered')) : ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_created')) : ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_updated')) : ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_created')) : ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_deleted')) : ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
    <?php endif; ?>
	
	<?php if($this->session->flashdata('login_failed')) : ?>
    	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

	<?php if($this->session->flashdata('user_loggedin')) : ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')) : ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>

	