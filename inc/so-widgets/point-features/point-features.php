<?php

class Fi_Print_Point_Features_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-point_features',
			__( 'Fi Print: Point Features', 'fi_print' ),
			array(
				'description' => __('Displays features in block style', 'fi_print' ),

				),
			array(),
			array(

				'title' => array(
					'type'  => 'text',
					'label' => __( 'widget Title', 'fi_print' )
				),
				'sub_title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Subtitle', 'fi_print' )
				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-point_features', __FILE__,'Fi_Print_Point_Features_Widget');
