<?php

class Fi_Print_Youtube_Video_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-youtube_video',
			__( 'Fi Print: Youtube_Video', 'fi-print' ),
			array(
				'description' => __('Fi Print Youtube Video Builder', 'fi-print' ),

				),
			array(),
			array(

				'url' => array(
					'type'     => 'text',
					'label'    => __( 'Video Url', 'fi-print' ),
					'sanitize' =>'url'
				),
				
				'image' => array(
					'type'  => 'media',
					'label' => __( 'Select Thumbnail Image', 'fi-print' )
				),

				'icon' => array(
					'type' => 'select',
					'label' => __('Icon Type', 'fi-print'),
					'options' => array(
						'circle' => __('Circled', 'fi-print'),
						'square' => __('Squared', 'fi-print'),
					)
				),	
				
			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-youtube_video', __FILE__,'Fi_Print_Youtube_Video_Widget');
