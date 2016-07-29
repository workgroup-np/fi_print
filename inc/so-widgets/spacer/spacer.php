<?php

class Fi_Print_Spacer_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-spacer',
			__( 'Fi Print: Spacer', 'fi-print' ),
			array(
				'description' => __('Fi Print Spacer', 'fi-print' ),

				),
			array(),
			array(

				'space' => array(
					'type'  => 'text',
					'label' => __( 'Enter the value without px', 'fi-print' )
				),
				

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-spacer', __FILE__,'Fi_Print_spacer_Widget');
