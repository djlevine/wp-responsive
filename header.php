<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>DLevine</title><!--[if lt IE 9]>
	<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<?php wp_head(); ?>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<style>
	html{margin:0 !important;}
	#wpadminbar{display: none !important;}
</style> 
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);?>
</head>
<body>
<div class="container">
	<div class="row">
	    <nav>
	       <div class="navbar-header">
	       	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            </button>
	            <!-- <h1> --><a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a><!-- </h1> -->
	       </div>
	       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	       <?php /* Primary navigation */
			wp_nav_menu( array(
			  'menu' => 'top_menu',
			  'depth' => 2,
			  'container' => false,
			  'theme_location' => 'primary', 
			  'menu_class' => 'nav navbar-nav navbar-right',
			  //Process nav menu using our custom nav walker
			  'walker' => new wp_bootstrap_navwalker())
			);
			?>
	       </div>     
		</nav>
	</div>