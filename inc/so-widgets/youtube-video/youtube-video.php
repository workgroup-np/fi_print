<?php

class Fi_Print_Youtube_Video_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-youtube_video',
			__( 'Fi Print: Youtube_Video', 'fi_print' ),
			array(
				'description' => __('Fi Print Youtube Video Builder', 'fi_print' ),

				),
			array(),
			array(

				'url' => array(
					'type'     => 'text',
					'label'    => __( 'Video Url', 'fi_print' ),
					'sanitize' =>'url'
				),
				
				'image' => array(
					'type'  => 'media',
					'label' => __( 'Select Thumbnail Image', 'fi_print' )
				),

				'icon' => array(
					'type' => 'select',
					'label' => __('Icon Type', 'fi_print'),
					'options' => array(
						'circle' => __('Circled', 'fi_print'),
						'square' => __('Squared', 'fi_print'),
					)
				),	
				
			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-youtube_video', __FILE__,'Fi_Print_Youtube_Video_Widget');
