<?php

function arganee_load_js() {
    wp_enqueue_script( 'arganee', get_stylesheet_directory_uri() . '/js/arganee.js', array( 'jquery' ), '1.12' );
}
add_action( 'wp_enqueue_scripts', 'arganee_load_js' );

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/* Add custom functions below */

function my_em_posttype_fix(){
register_taxonomy_for_object_type('category',EM_POST_TYPE_EVENT);
register_taxonomy_for_object_type('category',EM_POST_TYPE_LOCATION);
}
add_action('init','my_em_posttype_fix',100);

function my_em_posttype_cat_default($EM_Object){
    global $post;
        if( $post->post_type == EM_POST_TYPE_EVENT || $post->post_type == EM_POST_TYPE_LOCATION ){
            $categories = get_the_category();
            if( count($categories) == 0 ){
            //assign a category to this
            wp_set_object_terms($post->ID, 'uncategorized','category');
            }
        }
    }
add_action('template_redirect','my_em_posttype_cat_default', 1,1);

/**
 * Theme Setup
 */
function academica_setup() {

	// Custom Background
	add_theme_support( 'custom-background' );

	// Custom Menus
	register_nav_menus( array(
		'primary' => __( 'Top Menu', 'academica' ),
		'footer'  => __( 'Footer Menu', 'academica' ),
	) );

	// Featured Image
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 120, 80, true ); // Normal post thumbnails
	add_image_size( 'academica-featured-thumb', 960, 300, true );
	add_image_size( 'academica-gallery', 300, 225, true );

	// Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// Feed Links
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'academica_get_featured_posts',
		'description'             => __( 'The featured content section displays on the front page above the first post in the content area.', 'academica' ),
		'max_posts'               => 10,
	) );

	add_theme_support( 'infinite-scroll', array(
		'footer_widgets' => 'sidebar-9',
		'container'      => 'column-content',
		'wrapper'        => false,
		'footer'         => 'footer',
	) );
}
add_action( 'after_setup_theme', 'academica_setup' );


function replace_howdy( $wp_admin_bar ) {
 $my_account=$wp_admin_bar->get_node('my-account');
 $newtitle = str_replace( 'Howdy,', 'Welcome,', $my_account->title );
 $wp_admin_bar->add_node( array(
 'id' => 'my-account',
 'title' => $newtitle,
 ) );
 }
 add_filter( 'admin_bar_menu', 'replace_howdy',25 );


/* Remove Wordpress News and Welcome */

function disable_dashboard_widgets() {

  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box('dashboard_secondary','dashboard','side');
  remove_meta_box('dashboard_right_now','dashboard', 'normal');
  remove_action('welcome_panel', 'wp_welcome_panel');

}

add_action('wp_dashboard_setup', 'disable_dashboard_widgets');


/* Remove WP logo */

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}


/* Remove Theme and Plugin Editors from menu*/

function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);


function my_remove_menu_elements() {
  remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}

add_action('admin_init', 'my_remove_menu_elements');


/* Create list of pages, with some exceptions */

function my_list_pages(){
  wp_list_pages(
    array(
	'exclude' => '971, 235, 236, 237, 238, 6, 991, 1480',
    'title_li' => '',));
}

add_shortcode( 'listpages', 'my_list_pages' );


/* Admin footer modification */

function remove_footer_admin ()
{
    echo 'Created by David Robertson. Powered by <a href="https://wordpress.org/">WordPress</a>.</span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/* Remove comment box for all attachments */

function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );



/*
    Add this into a custom plugin or your active theme's functions.php
*/
add_filter("pmpro_besecure", "__return_false");


function academica_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar: Left', 'academica' ),
		'id'            => 'sidebar-1',
	   ) );

               	register_sidebar( array(
               		'name'          => __( 'Sidebar: Right', 'academica' ),
               		'id'            => 'sidebar-2',
               	) );

               	register_sidebar( array(
               		'name'          => __( 'Sidebar: Homepage (Left)', 'academica' ),
               		'id'            => 'sidebar-6',
               	) );

               	register_sidebar( array(
               		'name'          => __( 'Sidebar: Homepage (Right)', 'academica' ),
               		'id'            => 'sidebar-7',
               	) ); // BAD GUY

               	register_sidebar( array(
               		'name'          => __( 'Sidebar: Homepage (Middle)', 'academica' ),
               		'id'            => 'sidebar-8',
               	) );

                   register_sidebar( array(
               		'name'          => __( 'Sidebar: Archive Pages', 'academica' ),
               		'id'            => 'sidebar-3',
               	) );

                   register_sidebar( array(
               		'name'          => __( 'Sidebar: Pages (Left)', 'academica' ),
               		'id'            => 'sidebar-4',
               	) );

               	register_sidebar( array(
               		'name'          => __( 'Sidebar: Pages (Right)', 'academica' ),
               		'id'            => 'sidebar-5',
               	) );


	// Custom Theme Widget
	//require_once get_template_directory() . '/inc/widgets.php';
}
add_action( 'widgets_init', 'academica_widgets_init' );


?>
