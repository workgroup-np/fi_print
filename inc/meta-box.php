<?php
add_action( 'cmb2_admin_init', 'fi_print_cmb_metaboxes' );
function fi_print_cmb_metaboxes() {
    $prefix = 'fi_print_';
     $cmb = new_cmb2_box( array(
        'id'            => 'page_metabox',
        'title'         => __( 'Page Settings', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Page Title', 'cmb2' ),
        'desc'       => __( 'One line  description of the page', 'cmb2' ),
        'id'         => $prefix . 'title',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ) );

    $cmb->add_field( array(
        'name' => __( 'Breadcrumb Background image', 'cmb2' ),
        'id'   => $prefix . 'image',
        'type' => 'file',
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'advisor_metabox',
        'title'         => __( 'Adviso\'s Details', 'cmb2' ),
        'object_types'  => array( 'advisor', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true
    ) );

    $cmb->add_field( array(
    'name' => __('Advisor\'s Age','fi_print'),
    'id' => $prefix . 'age',
    'type' => 'text'
    ) );
    
    $cmb->add_field( array(
    'name' => __('Expert In:','fi_print'),
    'desc' => __('Please enter the advisor\'s area of expertise','fi_print'),
    'id' => $prefix . 'expertin',
    'type' => 'text'
    ) );

    $cmb->add_field(array(
    'name' => __('Advisor\'s Experience(in Years)','fi_print'),
    'id' => $prefix . 'experience',
    'type' => 'text'
    ) );

    $cmb->add_field( array(
    'name' => __('Advisor\'s Email','fi_print'),
    'id' => $prefix . 'email',
    'type' => 'text_email'
    ) );

    $cmb->add_field(  array(
    'name' => __('Advisor\'s Phone Number','fi_print'),
    'id' => $prefix . 'phone',
    'type' => 'text'
    ) );

    $cmb->add_field(  array(
    'name' => __('Personal Facebook Url','fi_print'),
    'desc' => __('Please enter the advisor\'s facebook url','fi_print'),
    'id' => $prefix . 'facebook',
    'type' => 'text_url'
    ) );

    $cmb->add_field( array(
    'name' => __('Personal Twitter Url','fi_print'),
    'desc' => __('Please enter the advisor\'s twitter url','fi_print'),
    'id' => $prefix . 'twitter',
    'type' => 'text_url'
    ) );

    $cmb->add_field( array(
    'name' => __('Personal Google Plus Url','fi_print'),
    'desc' => __('Please enter the advisor\'s Google Plus url','fi_print'),
    'id' => $prefix . 'googlep',
    'type' => 'text_url'
    ) );

    $cmb->add_field( array(
    'name' => __('Personal Linkedin Url','fi_print'),
    'desc' => __('Please enter the advisor\'s linkedin url','fi_print'),
    'id' => $prefix . 'linkedin',
    'type' => 'text_url'
    ) );

    $group_field_id = $cmb->add_field( array(
    'id'          => $prefix.'advisor_attribute_repeat_group',
    'type'        => 'group',
    'description' => __( 'Advisor\'s Attributes', 'cmb2' ),
    // 'repeatable'  => false, // use false if you want non-repeatable group
    'options'     => array(
    'group_title'   => __( 'Attribute {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    'add_button'    => __( 'Add Another Attribute', 'cmb2' ),
    'remove_button' => __( 'Remove Attribute', 'cmb2' ),
    'sortable'      => true, // beta
     'closed'     => true, // true to have the groups closed by default
    ),
    ) );
    
    $cmb->add_group_field( $group_field_id, array(
    'name' => 'Attribute Title',
    'id'   => 'title',
    'type' => 'text',
    ) );
    
    $cmb->add_group_field( $group_field_id, array(
    'name' => 'Attribute Description',
    'description' => 'Write a short description for this attribute',
    'id'   => 'description',
    'type' => 'textarea_small',
    ) );
    
    $cmb->add_group_field( $group_field_id, array(
    'name' => 'Bullet points',
    'description' => 'Some distinct points for this attribute',
    'id'   => 'bullet_points',
    'type' => 'text',
    'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'service_metabox',
        'title'         => __( 'Service Details', 'cmb2' ),
        'object_types'  => array( 'service', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Service Description', 'cmb2' ),
        'id'         => $prefix . 'service',
        'type'       => 'textarea',
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ) );

     $cmb = new_cmb2_box( array(
        'id'           => 'fi_print_portfolio_post_meta',
        'title'        => 'Custom Portfolio Options',
        'object_types' => array( 'portfolio' ),
    ) );

    $cmb->add_field( array(
        'name' => __('Project Budget','fi-print'),
        'desc' => __('Pleae give the project budget. eg:$300','fi-print'),
        'id' => 'portfolio_budget',
        'type' => 'text_medium'
    ) );$cmb->add_field( array(
        'name' => __('Project Advisor Subtitle','fi-print'),
        'desc' => __('Give a list of project advisor seperated by commas.','fi-print'),
        'id' => 'portfolio_advisor',
        'type' => 'text_medium'
    ) );
    $cmb->add_field(  array(
        'name' => __('Project Duration','fi-print'),
        'desc' => __('Please enter the project duration eg:3 months','fi-print'),
        'id' => 'portfolio_duration',
        'type' => 'text_medium'
    ));
    $cmb->add_field( array(
         'name' => __('Project Satisfaction','fi-print'),
        'desc' => __('Please enter the project satisfaction.eg:100%','fi-print'),
        'id' => 'portfolio_satisfaction',
        'type' => 'text_medium'
    ) );

}
?>