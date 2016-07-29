<?php

class Fi_Print_Latest_Post_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-latest-post',
			__( 'Fi Print: Latest_Post', 'fi-print' ),
			array(
				'description' => __('Display Latest Post', 'fi-print' ),

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
				
				'post_number'=> array(
					'type'  => 'text',
					'label' => __( 'Post Number', 'fi-print' )

				),
				'post_style' => array(
					'type'     => 'select',
					'label'    => __( 'Post  Style', 'fi-print' ),
					'default'  => 'one',
					'options'  => array(
						'one' => __( 'Style One', 'fi-print' ),
						'two'  => __( 'Style Two', 'fi-print' ),
					),
				),


			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-latest-post', __FILE__,'Fi_Print_Latest_Post_Widget');
