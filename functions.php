<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

 // register menu in WP
 register_nav_menus(
	array(
		'primary_menu' => __( 'Primary Menu', 'text_domain' ),
		'footer_menu'  => __( 'Footer Menu', 'text_domain' )
	)
	);

	// add class in li tag of menu
	function add_additional_class_on_li($classes, $item, $args) {
		if(isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

	// add class in anchor tag of menu
	function add_menu_link_class( $atts, $item, $args ) {
		if (property_exists($args, 'link_class')) {
		  $atts['class'] = $args->link_class;
		}
		return $atts;
	  }
	add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

	
	add_theme_support( 'post-thumbnails' ); // enable thumbnails image
	add_theme_support( 'custom-header' ); // enable custom header
	
	register_sidebar( array(
		"name" =>'Sidebar Location',
		"id"  =>'sidebar'
	) );

	add_post_type_support('page','excerpt');


	// custom Post

	/*
* Creating a function to create our CPT
*/
  
function custom_post_type() {
  
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Movies', 'Post Type General Name', '' ),
			'singular_name'       => _x( 'Movie', 'Post Type Singular Name', '' ),
			'menu_name'           => __( 'Movies', '' ),
			'parent_item_colon'   => __( 'Parent Movie', '' ),
			'all_items'           => __( 'All Movies', '' ),
			'view_item'           => __( 'View Movie', '' ),
			'add_new_item'        => __( 'Add New Movie', '' ),
			'add_new'             => __( 'Add New', '' ),
			'edit_item'           => __( 'Edit Movie', '' ),
			'update_item'         => __( 'Update Movie', '' ),
			'search_items'        => __( 'Search Movie', '' ),
			'not_found'           => __( 'Not Found', '' ),
			'not_found_in_trash'  => __( 'Not found in Trash', '' ),
		);
		  
	// Set other options for Custom Post Type
		  
		$args = array(
			'label'               => __( 'movies', '' ),
			'description'         => __( 'Movie news and reviews', '' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'genres' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
		);      
		// Registering your Custom Post Type
		register_post_type( 'movies', $args );  
	}
	  
	
	  
	add_action( 'init', 'custom_post_type', 0 );



//hook into the init action and call create_book_taxonomies when it fires  
add_action( 'init', 'create_movies_taxonomy', 0 );
//create a custom taxonomy name it Movietypes for your posts
function create_movies_taxonomy() {
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  
  $labels = array(
    'name' => _x( 'Movietype', 'taxonomy general name' ),
    'singular_name' => _x( 'Movietype', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Movietype' ),
    'all_items' => __( 'All Movietype' ),
    'parent_item' => __( 'Parent Movietype' ),
    'parent_item_colon' => __( 'Parent Movietype:' ),
    'edit_item' => __( 'Edit Movietype' ), 
    'update_item' => __( 'Update Movietype' ),
    'add_new_item' => __( 'Add New Movietype' ),
    'new_item_name' => __( 'New Movietype Name' ),
    'menu_name' => __( 'Movietypes' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('Movietypes',array('movies'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'movietype' ),
  ));
  
}


function ctheme_search_url() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	  }   
  }
  add_action( 'template_redirect', 'ctheme_search_url' );