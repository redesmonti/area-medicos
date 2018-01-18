<?php 

function areamedicos_styles(){
  wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
  wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
    //wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css');
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrapjs', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", array('jquery'), true);
  wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '', true );
  wp_enqueue_script( 'modernizr-2.8.3-respond-1.4.2', get_stylesheet_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), '', true );
  
  wp_enqueue_style('slider', get_stylesheet_directory_uri() . '/css/slider.css');
  wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css');
  wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/css/animate.css');
  wp_enqueue_style('bootstrap-theme', get_stylesheet_directory_uri() . '/css/bootstrap-theme.min.css');
  wp_enqueue_style('style', get_stylesheet_uri()); //usa el style.css, debe ser la ultima hoja de estilos
}
add_action('wp_enqueue_scripts', 'areamedicos_styles'); //Hook para llamar al la funcion en wordpress

//* Enqueue script to activate WOW.js
add_action('wp_enqueue_scripts', 'sk_wow_init_in_footer');
function sk_wow_init_in_footer() {
  add_action( 'print_footer_scripts', 'wow_init' );
}
//* Add JavaScript before </body>
function wow_init() { ?>
  <script type="text/javascript">
    new WOW().init();
  </script>
<?php }


/*Menus*/

require_once('wp-bootstrap-navwalker.php');
//Permite agregar los menus
function mis_menus() {
  register_nav_menus(
    array(
      'navegador' => __( 'Menú de navegación de area_medicos'),
    )
  );
}
add_action( 'after_setup_theme', 'mis_menus' );

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
 }

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s" col-md-3>',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
} 


/*Noticias*/

// La función no será utilizada antes del 'init'.
add_action( 'init', 'news_init' );
/* Here's how to create your customized labels */
function news_init() {
  $labels = array(
  'name' => _x( 'Noticias', 'post type general name' ),
        'singular_name' => _x( 'Noticia', 'post type singular name' ),
        'add_new' => _x( 'Añadir nueva', 'news' ),
        'add_new_item' => __( 'Añadir nuevo Noticia' ),
        'edit_item' => __( 'Editar Noticia' ),
        'new_item' => __( 'Nuevo Noticia' ),
        'view_item' => __( 'Ver Noticia' ),
        'search_items' => __( 'Buscar Noticias' ),
        'not_found' =>  __( 'No se han encontrado Noticias' ),
        'not_found_in_trash' => __( 'No se han encontrado Noticias en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
 
    register_post_type( 'noticia', $args ); /* Registramos y a funcionar */
}

// Lo enganchamos en la acción init y llamamos a la función create_book_taxonomies() cuando arranque
add_action( 'init', 'create_news_taxonomies', 0 );
 
// Creamos dos taxonomías, Categoria y autor para el custom post type "libro"
function create_news_taxonomies() {

  // Añadimos nueva taxonomía y la hacemos jerárquica (como las categorías por defecto)
  $labels = array(
  'name' => _x( 'Categorias', 'taxonomy general name' ),
  'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
  'search_items' =>  __( 'Buscar por Categoria' ),
  'all_items' => __( 'Todos los Categorias' ),
  'parent_item' => __( 'Categoria padre' ),
  'parent_item_colon' => __( 'Categoria padre:' ),
  'edit_item' => __( 'Editar Categoria' ),
  'update_item' => __( 'Actualizar Categoria' ),
  'add_new_item' => __( 'Añadir nuevo Categoria' ),
  'new_item_name' => __( 'Nombre del nuevo Categoria' ),
);
register_taxonomy( 'categoria', array( 'noticia' ), array(
  'hierarchical' => true,
  'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
  'show_ui' => true,
  'query_var' => true,
  'capability_type' => 'post',
  'rewrite' => array( 'slug' => 'categoria' ),
));

// Añado otra taxonomía, esta vez no es jerárquica, como las etiquetas.
$labels = array(
  'name' => _x( 'Etiquetas', 'taxonomy general name' ),
  'singular_name' => _x( 'Escritor', 'taxonomy singular name' ),
  'search_items' =>  __( 'Buscar Etiquetas' ),
  'popular_items' => __( 'Etiquetas populares' ),
  'all_items' => __( 'Todos los Etiquetas' ),
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Editar Escritor' ),
  'update_item' => __( 'Actualizar Escritor' ),
  'add_new_item' => __( 'Añadir nuevo Escritor' ),
  'new_item_name' => __( 'Nombre del nuevo Escritor' ),
  'separate_items_with_commas' => __( 'Separar Etiquetas por comas' ),
  'add_or_remove_items' => __( 'Añadir o eliminar Etiquetas' ),
  'choose_from_most_used' => __( 'Escoger entre los Etiquetas más utilizados' )
);
 
register_taxonomy( 'etiqueta', 'noticia', array(
  'hierarchical' => false,
  'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'etiqueta' ),
));
} // Fin de la función create_book_taxonomies().



?>