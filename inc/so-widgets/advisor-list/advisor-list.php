<?php

class Fi_Print_Advisor_List_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-advisor_list',
			__( 'Fi Print: Advisor List', 'fi_print' ),
			array(
				'description' => __('Fi Print Displays a lists of advisors', 'fi_print' ),

				),
			array(),
			array(

				'title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Title', 'fi_print' ),

				),

				'sub-title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Sub-title', 'fi_print' ),

				),
				
				'number' => array(
					'type'  => 'number',
					'label' => __( 'Number of advisors to display', 'fi_print' ),

				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-advisor_list', __FILE__,'Fi_Print_advisor_list_Widget');
