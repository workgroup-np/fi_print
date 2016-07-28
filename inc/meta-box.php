<?php
global $metaboxes;
$metaboxes = array(
    'link' => array(
        'title' => __('Link Settings', 'fi_print'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-link',
        'priority' => 'high',
        'fields' => array(
            'link_title' => array(
                'title' => __('Link Title:', 'fi_print'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            ),
            'link_url' => array(
                'title' => __('link url:', 'fi_print'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),

    'video_code' => array(
        'title' => __('Video Settings', 'fi_print'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-video',
        'priority' => 'high',
        'fields' => array(
            'video_id' => array(
                'title' => __('Video url:', 'fi_print'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),

    'audio_code' => array(
        'title' => __('Audio Settings', 'fi_print'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-audio',
        'priority' => 'high',
        'fields' => array(
            'audio_id' => array(
                'title' => __('Audio url:', 'fi_print'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),
    'quote_author' => array(
        'title' => __('Quote Settings', 'fi_print'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-quote',
        'priority' => 'high',
        'fields' => array(
            'q_content' => array(
                'title' => __('Quote content:', 'fi_print'),
                'type' => 'textarea',
                'description' => '',
                'size' => 20
            ),
            'q_author' => array(
                'title' => __('quote author:', 'fi_print'),
                'type' => 'text',
                'description' => '',
                'size' => 20
            )
        )
    )
);
add_action( 'add_meta_boxes', 'fi_print_add_post_format_metabox' );

function fi_print_add_post_format_metabox() {
    global $metaboxes;

    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'fi_print_show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}
function fi_print_show_metaboxes( $post, $args ) {
    global $metaboxes;

    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];

    /** Nonce **/
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                default:
                case "text":
                    if(isset($custom[$id][0])) {
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" size="' . $field['size'] . '" />';
                    } else {
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input id="' . $id . '" type="text" name="' . $id . '" value="" size="' . $field['size'] . '" />';
                    }
                    break;
            }
        }
    }

    echo $output;
}
add_action( 'save_post', 'fi_print_save_metaboxes' );

function fi_print_save_metaboxes( $post_id ) {
    global $metaboxes;

    // verify nonce

    if(isset($_POST['post_format_meta_box_nonce'])){
    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( isset( $_POST['post_type'] ) &&  'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $post_type = get_post_type();
    // loop through fields and save the data
    foreach ( $metaboxes as $id => $metabox ) {
        // check if metabox is applicable for current post type
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];

            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                if(isset($_POST[$id])) {
                    $new = $_POST[$id];

                    if ( $new && $new != $old ) {
                        update_post_meta( $post_id, $id, $new );
                    }
                    elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                        delete_post_meta( $post_id, $id, $old );
                    }
                }
            }
        }
    }
}
add_action( 'admin_print_scripts', 'fi_print_display_metaboxes', 1000 );
function fi_print_display_metaboxes() {
    global $metaboxes;
    if ( get_post_type() == "post" ) :
        ?>
        <script type="text/javascript">// <![CDATA[
            $ = jQuery;

            <?php
            $formats = $ids = array();
            foreach ( $metaboxes as $id => $metabox ) {
                array_push( $formats, "'" . $metabox['display_condition'] . "': '" . $id . "'" );
                array_push( $ids, "#" . $id );
            }
            ?>

            var formats = { <?php echo implode( ',', $formats );?> };
            var ids = "<?php echo implode( ',', $ids ); ?>";
             function displayMetaboxes() {
                // Hide all post format metaboxes
                $(ids).hide();
                // Get current post format
                var selectedElt = $("input[name='post_format']:checked").attr("id");

                // If exists, fade in current post format metabox
                if ( formats[selectedElt] )
                    $("#" + formats[selectedElt]).fadeIn();
            }

            $(function() {
                // Show/hide metaboxes on page load
                displayMetaboxes();

                // Show/hide metaboxes on change event
                $("input[name='post_format']").change(function() {
                    displayMetaboxes();
                });
            });

        // ]]></script>
        <?php
    endif;
}
function fi_print_be_attachment_field_credit( $form_fields, $post ) {
    $form_fields['destination_url'] = array(
        'label' => 'Destination',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'destination_url', true ),
        'helps' => 'Add destination URL',
    );
    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'fi_print_be_attachment_field_credit', 10, 2 );
function fi_print_be_attachment_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['destination_url'] ) )
    update_post_meta( $post['ID'], 'destination_url', esc_url( $attachment['destination_url'] ) );
    return $post;
}
add_filter( 'attachment_fields_to_save', 'fi_print_be_attachment_field_credit_save', 10, 2 );
add_filter( 'cmb_meta_boxes', 'fi_print_cmb_metaboxes' );
function fi_print_cmb_metaboxes( array $meta_boxes ) {
    $prefix = 'fi_print_';
     $meta_boxes['page_metabox'] = array(
        'id'         => 'page_metabox',
        'title'      => __( 'fi_print Page Settings', 'fi_print' ),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(

           array(
                'name'    => __( 'Page Title ', 'fi_print' ),
                'id'      => $prefix . 'pagetitle_title',
                'type'    => 'text',
            ),
			array(
                'name'    => __( 'Page Sub Title ', 'fi_print' ),
                'id'      => $prefix . 'pagetitle_subtitle',
                'type'    => 'text',
            ),
            array(
                'name' => __(' Background Bread Crumb Image', 'fi_print') ,
                'desc' => __('Upload an image or enter a URL.', 'fi_print') ,
                'id' => $prefix . 'pagetitle_image',
                'type' => 'file',
            ) ,
            array(
                'name' => __('Hide Page Title Line','fi_print'),
                'desc' => __('Do not display page line below subtitle','fi_print'),
                'id' => $prefix . 'pagetitle_line',
                'type' => 'checkbox'
            ),

        )
    );
    $meta_boxes['menu_metabox'] = array(
            'id'         => 'menu_metabox',
            'title'      => __( 'Menu Option', 'fi_print' ),
            'pages'      => array( 'page', ), // Post type
            'context'    => 'side',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                array(
                    'name'     => __( 'Menus', 'bella' ),
                    'desc'     => __( 'Select menu for this page', 'bella' ),
                    'id'       => $prefix . 'menu_select',
                    'type'     => 'taxonomy_select',
                    'taxonomy' => 'nav_menu', // Taxonomy Slug
                    'default' => 'bella-main-menu',
                ),
            )
        );
    $meta_boxes['team_metabox'] = array(
            'id'         => 'team_metabox',
            'title'      => __( 'Custom Team Options', 'fi_print' ),
            'pages'      => array( 'team' ),
            'context'    => 'normal',
            'normal'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                array(
                    'name' => __('Personal Facebook Url','fi_print'),
                    'desc' => __('Please enter the client\'s facebook url','fi_print'),
                    'id' => $prefix . 'facebook',
                    'type' => 'text_medium'
                ),
                 array(
                    'name' => __('Personal Twitter Url','fi_print'),
                    'desc' => __('Please enter the client\'s twitter url','fi_print'),
                    'id' => $prefix . 'twitter',
                    'type' => 'text_medium'
                ),
                array(
                    'name' => __('Personal Linkedin Url','fi_print'),
                    'desc' => __('Please enter the client\'s linkedin url','fi_print'),
                    'id' => $prefix . 'linkedin',
                    'type' => 'text_medium'
                ),
            )
        );
     $meta_boxes['portfolio_metabox'] = array(
        'id'         => 'portfolio_metabox',
        'title'      => __( 'Custom Portfolio Options', 'fi_print' ),
        'pages'      => array( 'portfolio' ),
        'context'    => 'normal',
        'normal'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
             array(
                'name' => __('Project Budget','fi_print'),
                'desc' => __('Pleae give the project budget. eg:$300','fi_print'),
                'id' => $prefix . 'portfolio_budget',
                'type' => 'text_medium'
            ),
             array(
                'name' => __('Project Advisor Subtitle','fi_print'),
                'desc' => __('Give a list of project advisor seperated by commas.','fi_print'),
                'id' => $prefix . 'portfolio_advisor',
                'type' => 'text_medium'
            ),
             array(
                'name' => __('Project Duration','fi_print'),
                'desc' => __('Please enter the project duration eg:3 months','fi_print'),
                'id' => $prefix . 'portfolio_duration',
                'type' => 'text_medium'
            ),
             array(
                'name' => __('Project Satisfaction','fi_print'),
                'desc' => __('Please enter the project satisfaction.eg:100%','fi_print'),
                'id' => $prefix . 'portfolio_satisfaction',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Project Subtitle','fi_print'),
                'desc' => __('Please enter the short intro of project as subtitle','fi_print'),
                'id' => $prefix . 'portfolio_subtitle',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Facebook Url','fi_print'),
                'desc' => __('Please enter the facebook url','fi_print'),
                'id' => $prefix . 'facebook',
                'type' => 'text_medium'
                ),
            array(
                'name' => __('Twitter Url','fi_print'),
                'desc' => __('Please enter the twitter url','fi_print'),
                'id' => $prefix . 'twitter',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Google Url','fi_print'),
                'desc' => __('Please enter the google url','fi_print'),
                'id' => $prefix . 'google',
                'type' => 'text_medium'
            ),
             array(
                'name' => __('Linkedin Url','fi_print'),
                'desc' => __('Please enter the linkedin url','fi_print'),
                'id' => $prefix . 'linkedin',
                'type' => 'text_medium'
                ),
            array(
                'name' => __('RSS Url','fi_print'),
                'desc' => __('Please enter the rss url','fi_print'),
                'id' => $prefix . 'rss',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Youtube Url','fi_print'),
                'desc' => __('Please enter the youtube url','fi_print'),
                'id' => $prefix . 'youtube',
                'type' => 'text_medium'
            ),

        )
    );

    return $meta_boxes;
}
// cmb2
function fi_print_post_meta() {

    $cmb = new_cmb2_box( array(
        'id'           => 'fi_print_portfolio_post_meta',
        'title'        => 'Custom Portfolio Options',
        'object_types' => array( 'portfolio' ),
    ) );

    $cmb->add_field( array(
        'name' => __('Project Budget','fi_print'),
        'desc' => __('Pleae give the project budget. eg:$300','fi_print'),
        'id' => $prefix . 'portfolio_budget',
        'type' => 'text_medium'
    ) );$cmb->add_field( array(
        'name' => __('Project Advisor Subtitle','fi_print'),
        'desc' => __('Give a list of project advisor seperated by commas.','fi_print'),
        'id' => $prefix . 'portfolio_advisor',
        'type' => 'text_medium'
    ) );
    $cmb->add_field(  array(
        'name' => __('Project Duration','fi_print'),
        'desc' => __('Please enter the project duration eg:3 months','fi_print'),
        'id' => $prefix . 'portfolio_duration',
        'type' => 'text_medium'
    ));
    $cmb->add_field( array(
         'name' => __('Project Satisfaction','fi_print'),
        'desc' => __('Please enter the project satisfaction.eg:100%','fi_print'),
        'id' => $prefix . 'portfolio_satisfaction',
        'type' => 'text_medium'
    ) );

}
add_action( 'cmb2_admin_init', 'fi_print_post_meta' );
?>