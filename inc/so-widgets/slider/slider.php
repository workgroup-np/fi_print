<?php

class Fi_Print_Slider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-slider',
			__( 'Fi Print: Slider', 'fi-print' ),
			array(
				'description' => __('Fi Print Slider', 'fi-print' ),

				),
			array(),
			array(

				'slider_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Slider Details.', 'fi-print'),
					'item_name' => __('Frame', 'fi-print'),
					'item_label' => array(
						'selector' => "[id*='frames-url']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Slider Image', 'fi-print' )
					),

					'content' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'fi-print' ),
					),
					'content_align' => array(
						'type'     => 'select',
						'label'    => __( 'Content Alignment', 'fi-print' ),
						'default'  => 'the_other_thing',
						'options'  => array(
							'left'   => __( 'Align Left', 'fi-print' ),
							'right'  => __( 'Align Right', 'fi-print' ),
							'center' => __( 'Align Center', 'fi-print' ),
						),
					),
					'overlay_checkbox' => array(
					        'type' => 'checkbox',
					        'label' => __( 'Enable Overlay?', 'fi-print' ),
					        'default' => false
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
siteorigin_widget_register('fi-print-slider', __FILE__,'Fi_Print_Slider_Widget');
