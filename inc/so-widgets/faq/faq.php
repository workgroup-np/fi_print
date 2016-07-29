<?php

class Fi_Print_Faq_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-faq',
			__( 'Fi Print: Faq', 'fi-print' ),
			array(
				'description' => __('Fi Print FAQ', 'fi-print' ),

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
				'faq_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Faq Details.', 'fi-print'),
					'fields' => array(

						'question'=>  array(
							'type'  => 'text',
							'label' => __( 'Question', 'fi-print' )
						),

						'answer'=>  array(
							'type'  => 'text',
							'label' => __( 'Answer', 'fi-print' )

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
siteorigin_widget_register('fi-print-faq', __FILE__,'Fi_Print_Faq_Widget');
