    <div class="contenedor-contendidos" name="videos" id="videos">

        <div class="contenedor-gradient2">
        </div>
        <i class="fa fa-video-camera" aria-hidden="true"></i> 
        <i class="fa fa-film" aria-hidden="true"></i>
        <div class="contenedor-titulo">
            <hr>
            <h2>Videos</h2>
            <hr>
        </div>
        <p class="texto-bajada">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        <div class="contenedor-imagenes">
        <?php query_posts('category_name=Videos&showposts=6'); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="link">
            <div class="bordes"></div>
            <div class="gradiente-link"></div>
            <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    } ?>  
            <div class="contenido">
              <img src="" alt="logo">
              <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
            </div>
          </a>
          <?php endwhile; endif; ?>
        </div>
        <div class="contenedor-vermas">
        
          <button>Ver más</button>
        
        </div>
    </div>