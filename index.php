<?php get_header(); ?>
<div class="contenedor-imagenes wow fadeIn">
    <?php if ( have_posts() ) : the_post(); ?>
    	<div class="contenido">
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php  if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'img-responsive')); }?>
            <p><?php the_content(); ?></p>
        </div>
    <div class="col-md-12">
        <?php previous_post_link('%link', '<i class="fa fa-arrow-left"></i> Atras '); ?><!--hacia atras-->
        <?php next_post_link('%link', ' Siguiente <i class="fa fa-arrow-right"></i>'); ?><!--hacia adelante-->
    </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>