<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"> 
  <?php wp_head(); ?>
 </head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
<div id="logo">
<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" width="495" height="auto"></a>
</div>

<div id="navsticker">
<nav id="nav">

	<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	
		<div id="search">

			<div id="search-inner">

			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>">
				<div class="search-input">
					
					<input type="text" value="" name="s" id="s" placeholder="Search..." required="required" autocomplete="off">
					
				</div>
				<button>&nbsp;</button>
			</form>
			</div>

	</div>
</nav>
<nav id="navmobile">

	<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	
</nav>
<a href="#" id="navmobiletoggle"></a>

</div>
<div id="contents">





