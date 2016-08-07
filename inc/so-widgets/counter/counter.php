<?php

class Fi_Print_Counter_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-counter',
			__( 'Fi Print: Counter', 'fi-print' ),
			array(
				'description' => __('Fi Print Counter', 'fi-print' ),

				),
			array(),
			array(

				'counter_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Counter Details.', 'fi-print'),
					'fields' => array(

						'counter_title'=>  array(
							'type'  => 'text',
							'label' => __( 'Counter Title', 'fi-print' )
						),

						'counter_percent'=>  array(
							'type'  => 'text',
							'label' => __( 'Counter Number', 'fi-print' )

						),
						'suffix_text'=>  array(
							'type'  => 'text',
							'label' => __( 'Text', 'fi-print' ),
							'description' => __( 'Text to append after the counter number.eg %', 'fi-print' )
						),
						
					),
				),

				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Color Settings', 'fi-print' ),
					'hide' => true,
					'fields' => array(
						'number_color' => array(
							'type'    => 'color',
							'label'   => __( 'Number Color', 'fi-print' ),
							'default' => '#fff',
						),

						'title_color' => array(
							'type'    => 'color',
							'label'   => __( 'Title Color', 'fi-print' ),
							'default' => '#fff',
						),
						
	    			),
				),


			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

	function get_style_name( $instance ) {

		return 'fi-print-counter';
	}

	function get_less_variables( $instance ) {

		$less_vars = array();
		if ( ! empty( $instance['settings']['number_color'] ) ) {
			$less_vars['number_color'] = $instance['settings']['number_color'];
		}
		if ( ! empty( $instance['settings']['title_color'] ) ) {
			$less_vars['title_color'] = $instance['settings']['title_color'];
		}

		return $less_vars;
	}

}
siteorigin_widget_register('fi-print-counter', __FILE__,'Fi_Print_Counter_Widget');
