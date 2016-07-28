<?php

class Fi_Print_Hero_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-hero',
			__( 'Fi Print: Hero', 'fi_print' ),
			array(
				'description' => __('Simple Hero Widget', 'fi_print' ),
				),
			array(),
			array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Hero Image', 'fi_print' )
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
siteorigin_widget_register('fi_print-hero', __FILE__,'Fi_Print_Hero_Widget');
