<?php
/*
Template Name: Ver prensa
*/
?>

<?php get_header(); ?>
<div class="container">
	<div class="contenedor-imagenes">
		<?php 
        $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1 ; //cuenta el numero de post y si no existen vuelve a la primera pagina
        global $wp_query;
        $original_query = $wp_query;
        $args = array(
          'post_type' => 'noticia',
          'post_per_page'=> '5', 
          'showposts' => '6', //numero de noticias que treara
          'paged' => $currentPage ,
          'orderby' => 'date', 
          'order' => 'DESC', 
        );      
        $custom_post_type = new WP_Query( $args );
        $wp_query = $custom_post_type;
        if ( $custom_post_type->have_posts() ) : ?>
          <?php $i = 1; while ( $custom_post_type->have_posts() ) : $custom_post_type->the_post(); ?>
          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
          <?php if(!empty($url)){ ?>
          	<div class="contenedor-entradas">
          		<?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium', array('class' => 'img-responsive'));
                    } ?>  
          	</div>
          	<div>
          		<h3><?php the_title(); ?></h3>
          	</div>
          	<div class="contenedor-entradas"><?php the_content(); ?></div>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary" role="button" aria-pressed="true">Leer más</a>
		<?php } ?>
        <?php $i++;endwhile;  ?>   
        <?php endif; ?> 
        <div class="col-md-12">
          <?php 
          the_posts_pagination(
            array(
                'mid_size' => 2,
                'screen_reader_text'=> '&nbsp;',//poner texto sobre paginacion
                'prev_text' => __( '<i class="fa fa-arrow-left"></i>', 'textdomain' ),
                'next_text' => __( '<i class="fa fa-arrow-right"></i>', 'textdomain' ),
            )
          ); 
          wp_reset_postdata();
          $wp_query = $original_query;
          ?>
        </div>   
	</div>
	
</div>

<?php get_footer(); ?>