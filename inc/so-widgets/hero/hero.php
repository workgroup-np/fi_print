<?php

class Fi_Print_Hero_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-hero',
			__( 'Fi Print: Hero', 'fi-print' ),
			array(
				'description' => __('Simple Hero Widget', 'fi-print' ),
				),
			array(),
			array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Hero Image', 'fi-print' )
					),

					'content' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'so-widgets-bundle' ),
					),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-hero', __FILE__,'Fi_Print_Hero_Widget');
