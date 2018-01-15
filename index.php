<?php get_header(); ?>
    <?php if ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php  if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'img-responsive')); }?>
            <p><?php the_content(); ?></p>
    <?php endif; ?>
<?php get_footer(); ?>