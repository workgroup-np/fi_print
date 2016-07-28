<?php

class Fi_Print_Latest_Post_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-latest-post',
			__( 'Fi Print: Latest_Post', 'fi_print' ),
			array(
				'description' => __('Display Latest Post', 'fi_print' ),

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
				
				'post_number'=> array(
					'type'  => 'text',
					'label' => __( 'Post Number', 'fi_print' )

				),
				'post_style' => array(
					'type'     => 'select',
					'label'    => __( 'Post  Style', 'fi_print' ),
					'default'  => 'one',
					'options'  => array(
						'one' => __( 'Style One', 'fi_print' ),
						'two'  => __( 'Style Two', 'fi_print' ),
					),
				),


			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-latest-post', __FILE__,'Fi_Print_Latest_Post_Widget');
