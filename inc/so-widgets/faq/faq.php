<?php

class Fi_Print_Faq_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-faq',
			__( 'Fi Print: Faq', 'fi_print' ),
			array(
				'description' => __('Fi Print FAQ', 'fi_print' ),

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
				'faq_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Faq Details.', 'fi_print'),
					'fields' => array(

						'question'=>  array(
							'type'  => 'text',
							'label' => __( 'Question', 'fi_print' )
						),

						'answer'=>  array(
							'type'  => 'text',
							'label' => __( 'Answer', 'fi_print' )

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
siteorigin_widget_register('fi_print-faq', __FILE__,'Fi_Print_Faq_Widget');
