<?php
/*-------------------------------------------------------
 * Divi UbuntuNet Child Theme Functions.php
------------------ ADD YOUR PHP HERE ------------------*/
 
function divichild_enqueue_styles() {
  
 $parent_style = 'parent-style';
  
 wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
 wp_enqueue_style( 'child-style',
 get_stylesheet_directory_uri() . '/style.css',
 array( $parent_style ),
 wp_get_theme()->get('Version')
 );
}
add_action( 'wp_enqueue_scripts', 'divichild_enqueue_styles' );


/* ----------------------------------------------------------------------------------- */
// Add Divi Builder to TEC Post Types
/* ----------------------------------------------------------------------------------- */
 
function add_tec_post_types( $post_types ) {
    $post_types[] = 'tribe_events';
    $post_types[] = 'tribe_venue';
    $post_types[] = 'tribe_organizer';
      
    return $post_types;
}
add_filter( 'et_builder_post_types', 'add_tec_post_types' );