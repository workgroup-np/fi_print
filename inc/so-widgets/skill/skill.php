<?php

class Fi_Print_Skill_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-skill',
			__( 'Fi Print: Skill', 'fi_print' ),
			array(
				'description' => __('Fi Print Skill', 'fi_print' ),

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
				
				'image' => array(
					'type'  => 'media',
					'label' => __( 'Select Bacground Image', 'fi_print' )
				),	
				'skill_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Skill Details.', 'fi_print'),
					'fields' => array(

						'skill_title'=>  array(
							'type'  => 'text',
							'label' => __( 'Skill Title', 'fi_print' )
						),

						'skill_percent'=>  array(
							'type'  => 'text',
							'label' => __( 'Skill Percent', 'fi_print' )

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
siteorigin_widget_register('fi_print-skill', __FILE__,'Fi_Print_Skill_Widget');
