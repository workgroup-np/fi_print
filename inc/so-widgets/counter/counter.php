<?php

class Fi_Print_Counter_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-counter',
			__( 'Fi Print: Counter', 'fi_print' ),
			array(
				'description' => __('Fi Print Counter', 'fi_print' ),

				),
			array(),
			array(

				'counter_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Counter Details.', 'fi_print'),
					'fields' => array(

						'counter_title'=>  array(
							'type'  => 'text',
							'label' => __( 'Counter Title', 'fi_print' )
						),

						'counter_percent'=>  array(
							'type'  => 'text',
							'label' => __( 'Counter Number', 'fi_print' )

						),
						'suffix_text'=>  array(
							'type'  => 'text',
							'label' => __( 'Text', 'fi_print' ),
							'description' => __( 'Text to append after the counter number.eg %', 'fi_print' )
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
siteorigin_widget_register('fi_print-counter', __FILE__,'Fi_Print_Counter_Widget');
