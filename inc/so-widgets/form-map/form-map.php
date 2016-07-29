<?php

class Fi_Print_Form_Map_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-form_map',
			__( 'Fi Print: Form_Map', 'fi-print' ),
			array(
				'description' => __('Fi Print Form_Map', 'fi-print' ),

				),
			array(),
			array(				
				'latitude' => array(
					'type'  => 'text',
					'label' => __( 'Latitude', 'fi-print' ),
					'description' => __( 'Provide the latitude value. eg:44.540', 'fi-print' )
				),
				'longitude' => array(
					'type'  => 'text',
					'label' => __( 'Longitude', 'fi-print' ),
					'description' => __( 'Provide the longitude value. eg:-78.556', 'fi-print' )
				),
				'marker' => array(
					'type'  => 'media',
					'label' => __( 'Upload Marker Image', 'fi-print' ),
					'library' => 'image',
        			'fallback' => true
				),
				'description' => array(
					'type'  => 'textarea',
					'label' => __( 'Location Description', 'fi-print' )
				),'contact_form' => array(
					'type'  => 'text',
					'label' => __( 'Contact Form 7 Shortcode', 'fi-print' ),
					'description' => __( 'Copy and paste contact form 7 shortcode here.', 'fi-print' )
				),
			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}
	function get_style_name($instance) {
		// We're not using a style
		return 'false';
	}

}
siteorigin_widget_register('fi-print-form_map', __FILE__,'Fi_Print_Form_Map_Widget');
