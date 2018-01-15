    <div class="contenedor-contendidos con-azul" name="prensa" id="prensa">
      <div class="gradient-azul"></div>
        <i class="fa fa-newspaper-o prensa" aria-hidden="true"></i>
        <div class="contenedor-titulo">
            <hr>
            <h2>Prensa</h2>
            <hr>
        </div>
        <p class="texto-bajada">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
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
          <a href="<?php the_permalink(); ?>" class="link">
            <div class="bordes"></div>
            <div class="gradiente-link"></div>
            <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium', array('class' => 'img-responsive'));
                    } ?>  
            <div class="contenido">
              <img src="" alt="logo">
              <h3><?php the_title(); ?></h3>
              
            </div>
          </a>
          <?php } ?>
          <?php $i++;endwhile;  ?>   
        <?php endif; ?> 
        
        </div>
        <div class="contenedor-vermas">
            <hr>
            <button><a href="http://localhost/clinica_mc/ver-noticias/">Ver más</a></button>
            <hr>
          </div>
    </div>