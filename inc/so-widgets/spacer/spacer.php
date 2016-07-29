<?php

class Fi_Print_Spacer_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-spacer',
			__( 'Fi Print: Spacer', 'fi_print' ),
			array(
				'description' => __('Fi Print Spacer', 'fi_print' ),

				),
			array(),
			array(

				'space' => array(
					'type'  => 'text',
					'label' => __( 'Enter the value without px', 'fi_print' )
				),
				

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-spacer', __FILE__,'Fi_Print_spacer_Widget');
