<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
        <?php wp_head(); ?>
        </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
    <nav class="navegacion navbar-fixed-top" id="navbarjs" role="navigation">
      <div class="telefonos">  
      </div>
        <div class="container">
              <div class="navbar-header"> 
                <div class="navbar-brand">
                  <a href="<?php bloginfo('url'); ?>">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-monti.png" alt="">
                  </a>  
                </div> 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
                  <span class="sr-only">Toggle navigation</span> 
                  <span class="icon-bar"></span> 
                  <span class="icon-bar"></span> 
                  <span class="icon-bar"></span> 
                </button>  
              </div>
              <div class="smooth-scroll collapse navbar-collapse navbar-right navbar-ex1-collapse">
                <?php wp_nav_menu( array( 
                  'theme_location' => 'navegador',

                  'depth' => 4,
                  'container' => false,
                  'container_id' => 'navbar',
                  'container_class' => 'collapse navbar-collapse', 
                  'menu_class' => 'nav navbar-nav navbar-left',
                  'walker' => new WP_Bootstrap_Navwalker() ) ); ?>    
              </div>
            </div>
    </nav>