<?php

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

add_action('wp_enqueue_scripts', 'main_load_scripts');
function main_load_scripts() {
	if ( !is_admin() ) wp_deregister_script('jquery');
	wp_enqueue_style('main', get_template_directory_uri() . '/dist/main.css?v=' . time());
	wp_enqueue_style('hamburger', get_template_directory_uri() . '/dist/hamburger.css?v=' . time());
	wp_enqueue_script('main', get_template_directory_uri() . '/dist/main-bundle.js', [], time());

  // $data = array( 
  //       'ajax_url' => admin_url( 'admin-ajax.php' ),
  //       'nonce'    => wp_create_nonce( 'nonce' )
  //   );
  // wp_localize_script( 'main', 'ajax_data', $data );
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
	));
}

if ( !function_exists('write_log') ) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

if ( !function_exists('no_orphans') ) {
  function no_orphans($string) {
    $pos = strrpos($string, " ");
    return substr_replace($string, '&nbsp;', $pos, 1);
  }
}

// disable the gutenburg editor
add_filter('use_block_editor_for_post', '__return_false', 10);

function create_post_types() {
  register_post_type('producers',
        array(
            'labels' => array(
                'name' => __('Producers'),
                'singular_name' => __('Producer')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'producers'
            ),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}

add_action( 'init', 'create_post_types' );

function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function strPrettify($str) {
    // $words = ;
    $region = implode(' ', explode('-', $str));
    $region = ucwords($region);
    return $region;
}
