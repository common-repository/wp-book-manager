<?php 
/*
Plugin Name: WP Book Manager
description: WP Book Manager plugin allows you to manage books and their informations in a website.
Version: 1.0.1
Author: Deepika
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

//Books Post Type Registration start here
function wpbm_register_book_post_type() { 
    $labels = array(
        'name'                => _x( 'Book Manager', 'Post Type General Name', 'wp_book_manager' ),
        'singular_name'       => _x( 'Book Manager', 'Post Type Singular Name', 'wp_book_manager' ),
        'menu_name'           => __( 'Book Manager', 'wp_book_manager' ),
        'parent_item_colon'   => __( 'Parent Book Manager', 'wp_book_manager' ),
        'all_items'           => __( 'All Books', 'wp_book_manager' ),
        'view_item'           => __( 'View Books', 'wp_book_manager' ),
        'add_new_item'        => __( 'Add New Books', 'wp_book_manager' ),
        'add_new'             => __( 'Add New', 'wp_book_manager' ),
        'edit_item'           => __( 'Edit Book', 'wp_book_manager' ),
        'update_item'         => __( 'Update Book', 'wp_book_manager' ),
        'search_items'        => __( 'Search Book', 'wp_book_manager' ),
        'not_found'           => __( 'Not Found', 'wp_book_manager' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'wp_book_manager' ),
    ); 
	$args = array(
        'label'               => __( 'books', 'wp_book_manager' ),
        'description'         => __( 'Books news and reviews', 'wp_book_manager' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
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
        'capability_type'     => 'page',
    );     

    register_post_type( 'book', $args );
 
}
add_action( 'init', 'wpbm_register_book_post_type', 0 );
// Books Post Type Registration end here

function wpbm_book_register_meta_boxes() {
    add_meta_box( 'book_management', __( 'Book Manager', 'book' ), 'wpbm_book_display_callback', 'book' );
}

add_action( 'add_meta_boxes', 'wpbm_book_register_meta_boxes' );

function wpbm_book_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . 'form.php';
	
}

function wpbm_book_save_meta_box( $post_id ) 
{
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = ['book_author','book_published_date','book_price','book_saleprice','book_publisher','book_genre','book_publisherwebsite','book_isbn'];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
	 
}

add_action( 'save_post', 'wpbm_book_save_meta_box' );

function wpbm_load_single_book_template($template) 
{
    global $post;
    if ($post->post_type == "book" && $template !== locate_template(array("single-book.php"))){
        return plugin_dir_path( __FILE__ ) . "single-book.php";
    }
    return $template;
}
add_filter('single_template', 'wpbm_load_single_book_template'); 

function wpbm_load_archive_book_template($archivetemplate) 
{
    global $post;
    if ($post->post_type == "book" && $archivetemplate !== locate_template(array("archive-book.php"))){
        return plugin_dir_path( __FILE__ ) . "archive-book.php";
    }
    return $archivetemplate;
}
add_filter('archive_template', 'wpbm_load_archive_book_template');
?>