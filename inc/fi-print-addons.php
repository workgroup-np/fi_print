<?php
/*
Plugin Name: fi_print Addons
Description: This is addon for fi_print theme to generate custom post types and widgets
Version: 1.0
Author: Rafin/Sudip
Text Domain: fi_print-addons
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
class fi_printAddons{
 
    public function __construct() {
 
        load_plugin_textdomain( 'fi_print-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
        add_filter( 'init', array( $this, 'fi_print_addons_posttypes' ) );
        add_action( 'init', array( $this, 'custom_post_type' ) );
        add_action( 'init', array( $this, 'create_custom_post_taxonomies' ));
        add_filter( 'init', array( $this, 'fi_print_addons_shortcode' ) );
 
    }
    public function fi_print_addons_posttypes() {
    }
    public function fi_print_addons_shortcode() {
      add_shortcode( 'portfolio', array($this, 'portfolio_shortcode') );
    }
    function portfolio_shortcode( $atts ) {
      $test=extract( shortcode_atts(
              array(
                 
                  'category' => '',
                  
                  'excerpt' => 'false',
              ), $atts )
      );  $output = '';
     
    return $output;
    }    
    public function custom_post_type() {
    $labels = array(
        'name'                => _x( 'Advisors', 'Post Type General Name', 'fi_print' ),
        'singular_name'       => _x( 'Advisor', 'Post Type Singular Name', 'fi_print' ),
        'menu_name'           => __( 'Advisor', 'fi_print' ),
        'parent_item_colon'   => __( 'Parent Advisor:', 'fi_print' ),
        'all_items'           => __( 'All Advisors', 'fi_print' ),
        'view_item'           => __( 'View Advisor', 'fi_print' ),
        'add_new_item'        => __( 'Add New Advisor', 'fi_print' ),
        'add_new'             => __( 'Add New', 'fi_print' ),
        'edit_item'           => __( 'Edit Advisor', 'fi_print' ),
        'update_item'         => __( 'Update Advisor', 'fi_print' ),
        'search_items'        => __( 'Search Advisor', 'fi_print' ),
        'not_found'           => __( 'Not found', 'fi_print' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'fi_print' ),
    );
    $args = array(
        'label'               => __( 'advisor_member', 'fi_print' ),
        'description'         => __( 'You can add the advisors from here along with their details.', 'fi_print' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail',),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'advisor', $args );
    
     $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'fi_print' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'fi_print' ),
        'menu_name'           => __( 'Service', 'fi_print' ),
        'parent_item_colon'   => __( 'Parent Service:', 'fi_print' ),
        'all_items'           => __( 'All Services', 'fi_print' ),
        'view_item'           => __( 'View Service', 'fi_print' ),
        'add_new_item'        => __( 'Add New Service', 'fi_print' ),
        'add_new'             => __( 'Add New', 'fi_print' ),
        'edit_item'           => __( 'Edit Service', 'fi_print' ),
        'update_item'         => __( 'Update Service', 'fi_print' ),
        'search_items'        => __( 'Search Service', 'fi_print' ),
        'not_found'           => __( 'Not found', 'fi_print' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'fi_print' ),
    );
    $args = array(
        'label'               => __( 'service_member', 'fi_print' ),
        'description'         => __( 'You can add the services from here along with their details.', 'fi_print' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 60,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'service', $args );
}
    public function create_custom_post_taxonomies()
    {
    $labels = array(
        'name'                       => _x( 'Designations', 'Taxonomy General Name', 'fi_print' ),
        'singular_name'              => _x( 'Designation', 'Taxonomy Singular Name', 'fi_print' ),
        'menu_name'                  => __( 'Designation', 'fi_print' ),
        'all_items'                  => __( 'All Items', 'fi_print' ),
        'parent_item'                => __( 'Parent Item', 'fi_print' ),
        'parent_item_colon'          => __( 'Parent Item:', 'fi_print' ),
        'new_item_name'              => __( 'New Item Name', 'fi_print' ),
        'add_new_item'               => __( 'Add New Item', 'fi_print' ),
        'edit_item'                  => __( 'Edit Item', 'fi_print' ),
        'update_item'                => __( 'Update Item', 'fi_print' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'fi_print' ),
        'search_items'               => __( 'Search Items', 'fi_print' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'fi_print' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'fi_print' ),
        'not_found'                  => __( 'Not Found', 'fi_print' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'advisor_post', array( 'advisor' ), $args );
       
    
}
}
 
$addons = new fi_printAddons();