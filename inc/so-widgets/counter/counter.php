<?php

class Fi_Print_Counter_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-counter',
			__( 'Fi Print: Counter', 'fi-print' ),
			array(
				'description' => __('Fi Print Counter', 'fi-print' ),

				),
			array(),
			array(

				'counter_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Counter Details.', 'fi-print'),
					'fields' => array(

						'counter_title'=>  array(
							'type'  => 'text',
							'label' => __( 'Counter Title', 'fi-print' )
						),

						'counter_percent'=>  array(
							'type'  => 'text',
							'label' => __( 'Counter Number', 'fi-print' )

						),
						'suffix_text'=>  array(
							'type'  => 'text',
							'label' => __( 'Text', 'fi-print' ),
							'description' => __( 'Text to append after the counter number.eg %', 'fi-print' )
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
siteorigin_widget_register('fi-print-counter', __FILE__,'Fi_Print_Counter_Widget');
