<?php

class Fi_Print_Slider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-slider',
			__( 'Fi Print: Slider', 'fi_print' ),
			array(
				'description' => __('Fi Print Slider', 'fi_print' ),

				),
			array(),
			array(

				'slider_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Slider Details.', 'fi_print'),
					'fields' => array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Slider Image', 'fi_print' )
						),
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Slider Title', 'fi_print' )
						),
						'sub_title' => array(
							'type'  => 'text',
							'label' => __( 'Slider Subtitle', 'fi_print' )
						),
						'text' => array(
							'type' => 'text',
							'label' => __('Read More Text', 'fi_print'),
						),
						'url' => array(
							'type' => 'text',
							'label' => __('Destination URL', 'fi_print'),
						),
						'new_window' => array(
							'type' => 'checkbox',
							'label' => __('Open In New Window', 'fi_print'),
						),

					),
				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-slider', __FILE__,'Fi_Print_Slider_Widget');
