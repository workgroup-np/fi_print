<?php

class Fi_Print_Download_Buttons_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-download_buttons',
			__( 'Fi Print: Button Group', 'fi_print' ),
			array(
				'description' => __('Fi Print Button Collection', 'fi_print' ),

				),
			array(),
			array(
				'Description' => array(
					'type'  => 'textarea',
					'label' => __('Description', 'fi_print' )
				),
				'button_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Buttons Details.', 'fi_print'),
					'item_label' => array(
			            'selector'     => "[id*='btntext']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
					'fields' => array(
						'btntext' => array(
							'type'  => 'text',
							'label' => __('Button Text', 'fi_print' )
						),
						
						'btnurl' => array(
							'type'  => 'text',
							'label' => __( 'Button Url', 'fi_print' )
						),
						'buttontype' => array(
					        'type' => 'select',
					        'label' => __( 'Button Type', 'fi_print' ),
					        'options' => array(
					            'primary' => __( 'Theme Primary Style', 'fi_print' ),
					            'secondary' => __( 'Theme Secondary Style', 'fi_print' ),
					        ),
					        'default'=>'primary'
					    ),
					    'target' => array(
							'type'  => 'checkbox',
							'label' => __( 'Open in New Tab?', 'fi_print' )
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
siteorigin_widget_register('fi_print-download_buttons', __FILE__,'Fi_Print_Download_Buttons_Widget');
