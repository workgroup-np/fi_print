<?php

class Fi_Print_Download_Buttons_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-download_buttons',
			__( 'Fi Print: Button Group', 'fi-print' ),
			array(
				'description' => __('Fi Print Button Collection', 'fi-print' ),

				),
			array(),
			array(
				'Description' => array(
					'type'  => 'textarea',
					'label' => __('Description', 'fi-print' )
				),
				'button_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Buttons Details.', 'fi-print'),
					'item_label' => array(
			            'selector'     => "[id*='btntext']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
					'fields' => array(
						'btntext' => array(
							'type'  => 'text',
							'label' => __('Button Text', 'fi-print' )
						),
						
						'btnurl' => array(
							'type'  => 'text',
							'label' => __( 'Button Url', 'fi-print' )
						),
						'buttontype' => array(
					        'type' => 'select',
					        'label' => __( 'Button Type', 'fi-print' ),
					        'options' => array(
					            'primary' => __( 'Theme Primary Style', 'fi-print' ),
					            'secondary' => __( 'Theme Secondary Style', 'fi-print' ),
					        ),
					        'default'=>'primary'
					    ),
					    'target' => array(
							'type'  => 'checkbox',
							'label' => __( 'Open in New Tab?', 'fi-print' )
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
siteorigin_widget_register('fi-print-download_buttons', __FILE__,'Fi_Print_Download_Buttons_Widget');
