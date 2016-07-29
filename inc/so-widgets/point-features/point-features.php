<?php

class Fi_Print_Point_Features_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-point_features',
			__( 'Fi Print: Point Features', 'fi-print' ),
			array(
				'description' => __('Displays features in block style', 'fi-print' ),

				),
			array(),
			array(

				'title' => array(
					'type'  => 'text',
					'label' => __( 'widget Title', 'fi-print' )
				),
				'sub_title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Subtitle', 'fi-print' )
				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-point_features', __FILE__,'Fi_Print_Point_Features_Widget');
