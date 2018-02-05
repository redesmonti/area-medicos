<?php
/*
Template Name: Ver videos
*/
?>

<?php get_header(); ?>

<div class="contenedor-imagenes wow fadeIn">
        <?php query_posts('category_name=Videos&showposts=-1'); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	        <a href="<?php the_permalink(); ?>" class="link">
		        <div class="bordes">
		        <div class="gradiente-link"></div>
	            <?php if ( has_post_thumbnail() ) {
	                    the_post_thumbnail('medium', array('class' => 'img-responsive'));
	            } ?>  
	            <div class="contenido">
	              	<img src="" alt="logo">
	              	<h3><?php the_title(); ?></h3>
	              
	            </div>
	            </div>
          	</a>
        <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>