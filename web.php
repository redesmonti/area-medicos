<div class="contenedor-contendidos" name="web" id="web">
    <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
    <div class="contenedor-titulo">
        <hr>
        <h2>Web</h2>
        <hr>
    </div>
    <p class="texto-bajada">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
    <div class="contenedor-imagenes">
    <?php query_posts('category_name=Web&showposts=6'); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="link">
                <div class="bordes"></div>
                <div class="gradiente-link"></div>
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail('medium', array('class' => 'img-responsive'));
                } ?>  
                <div class="contenido">
                <img src="<?php echo get_field('imagen_logo'); ?>" alt="">
                <h3><?php the_title(); ?></h3>
                
                </div>
            </a>
        <?php endwhile; endif; ?>
    </div>
    <div class="contenedor-vermas">
        <hr>
        <button>Ver más</button>
        <hr>
    </div>
</div>