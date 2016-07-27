<?php

class Fi_Print_Form_Map_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-form_map',
			__( 'Fi Print: Form_Map', 'fi_print' ),
			array(
				'description' => __('Fi Print Form_Map', 'fi_print' ),

				),
			array(),
			array(				
				'latitude' => array(
					'type'  => 'text',
					'label' => __( 'Latitude', 'fi_print' ),
					'description' => __( 'Provide the latitude value. eg:44.540', 'fi_print' )
				),
				'longitude' => array(
					'type'  => 'text',
					'label' => __( 'Longitude', 'fi_print' ),
					'description' => __( 'Provide the longitude value. eg:-78.556', 'fi_print' )
				),
				'marker' => array(
					'type'  => 'media',
					'label' => __( 'Upload Marker Image', 'fi_print' )
				),
				'description' => array(
					'type'  => 'textarea',
					'label' => __( 'Location Description', 'fi_print' )
				),'contact_form' => array(
					'type'  => 'text',
					'label' => __( 'Contact Form 7 Shortcode', 'fi_print' ),
					'description' => __( 'Copy and paste contact form 7 shortcode here.', 'fi_print' )
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
siteorigin_widget_register('fi_print-form_map', __FILE__,'Fi_Print_Form_Map_Widget');
