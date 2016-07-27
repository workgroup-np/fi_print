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
					'item_name' => __('Frame', 'so-widgets-bundle'),
					'item_label' => array(
						'selector' => "[id*='frames-url']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Slider Image', 'fi_print' )
					),

					'content' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'so-widgets-bundle' ),
					),
					'content_align' => array(
						'type'     => 'select',
						'label'    => __( 'Content Alignment', 'widget-form-fields-text-domain' ),
						'default'  => 'the_other_thing',
						'options'  => array(
							'left'   => __( 'Align Left', 'widget-form-fields-text-domain' ),
							'right'  => __( 'Align Right', 'widget-form-fields-text-domain' ),
							'center' => __( 'Align Center', 'widget-form-fields-text-domain' ),
						),
					),
					'overlay_checkbox' => array(
					        'type' => 'checkbox',
					        'label' => __( 'Enable Overlay?', 'widget-form-fields-text-domain' ),
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
siteorigin_widget_register('fi_print-slider', __FILE__,'Fi_Print_Slider_Widget');
