<?php

class Fi_Print_Accordion_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-accordion',
			__( 'Fi Print: Accordion', 'fi_print' ),
			array(
				'description' => __('Fi Print Accordion', 'fi_print' ),

				),
			array(),
			array(

				'accordion_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Accordion Details.', 'fi_print'),
					'item_label' => array(
			            'selector'     => "[id*='title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
					'fields' => array(
						'title' => array(
							'type'  => 'text',
							'label' => __('Title', 'fi_print' )
						),
						'textarea' => array(
							'type' => 'tinymce',
					        'label' => __( 'Description', 'fi_print' ),
					        'rows' => 10,
					        'default_editor' => 'html',
					        'button_filters' => array(
					            'mce_buttons' => array( $this, 'filter_mce_buttons' ),
					            'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
					            'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
					            'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
					            'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
					        ),
						),	
						'active' => array(
							'type'  => 'checkbox',
							'label' => __( 'Active Tab?', 'fi_print' )
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
siteorigin_widget_register('fi_print-accordion', __FILE__,'Fi_Print_Accordion_Widget');
