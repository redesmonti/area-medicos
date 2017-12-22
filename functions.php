<?php 
if (function_exists('register_nav_menus')){
    register_nav_menus (array('superior'=>'Menú Principal Superior'));
}
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
?>