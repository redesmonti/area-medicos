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
        <p class="texto-bajada">Creamos videos corporativos, testimoniales, consejos prácticos, animaciones y endless,
según las necesidades de cada cliente.</p>
        <div class="contenedor-imagenes wow fadeIn">
        <?php query_posts('category_name=Videos&showposts=6'); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="link">
            <div class="bordes"></div>
            <div class="gradiente-link"></div>
            <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium', array('class' => 'img-responsive'));
                    } ?>  
            <div class="contenido">
            <img class="imagen-logo-noticia" src="<?php echo get_field('imagen_logo'); ?>" alt="">
              
              <h3><?php the_title(); ?></h3>
              
            </div>
          </a>
          <?php endwhile; endif; ?>
        </div>
        <div class="contenedor-vermas">
        
          <button><a href="http://192.168.100.9/clinica_mc/ver-videos/">Ver más</a></button>
        
        </div>
    </div>