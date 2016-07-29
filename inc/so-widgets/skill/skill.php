<?php

class Fi_Print_Skill_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-skill',
			__( 'Fi Print: Skill', 'fi-print' ),
			array(
				'description' => __('Fi Print Skill', 'fi-print' ),

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
				
				'image' => array(
					'type'  => 'media',
					'label' => __( 'Select Bacground Image', 'fi-print' )
				),	
				'skill_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Skill Details.', 'fi-print'),
					'fields' => array(

						'skill_title'=>  array(
							'type'  => 'text',
							'label' => __( 'Skill Title', 'fi-print' )
						),

						'skill_percent'=>  array(
							'type'  => 'text',
							'label' => __( 'Skill Percent', 'fi-print' )

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
siteorigin_widget_register('fi-print-skill', __FILE__,'Fi_Print_Skill_Widget');
