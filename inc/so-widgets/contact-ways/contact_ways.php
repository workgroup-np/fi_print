<?php

class Fi_Print_Contact_Ways_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-contact-ways',
			__( 'Fi_Print: Contact Ways', 'fi-print' ),
			array(
				'description' => __('Contact Ways for your company', 'fi-print' ),

				),
			array(),
			array(

				'contact_ways_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Contact Details.', 'fi-print'),
					'fields' => array(
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'fi-print' )
						),
						'content' => array(
							'type'  => 'text',
							'label' => __( 'Content', 'fi-print' )
						),
					),
				),
				'get_quote_text'=>  array(
					'type'  => 'text',
					'label' => __( 'Get a quote TEXT', 'fi-print' ),
				),
				'get_quote_link'=>  array(
					'type'  => 'link',
					'label' => __( 'Get a quote Link', 'fi-print' ),
				),
				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Color Settings', 'fi-print' ),
					'hide' => true,
					'fields' => array(
						'title_color' => array(
							'type'    => 'color',
							'label'   => __( ' Title Color', 'fi-print' ),
							'default' => '#fff',
						),
						'content_color' => array(
							'type'    => 'color',
							'label'   => __( 'Content Color', 'fi-print' ),
							'default' => '#fff',
						),
						'get_quote_text_color' => array(
							'type'    => 'color',
							'label'   => __( 'GET a Quote text Color', 'fi-print' ),
							'default' => '#fff',
						),
						'get_quote_text_background_color' => array(
							'type'    => 'color',
							'label'   => __( 'GET a Quote text Backgorund Color', 'fi-print' ),
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

		return 'fi-print-cw';
	}

	function get_less_variables( $instance ) {

		$less_vars = array();
		if ( ! empty( $instance['settings']['title_color'] ) ) {
			$less_vars['title_color'] = $instance['settings']['title_color'];
		}
		if ( ! empty( $instance['settings']['content_color'] ) ) {
			$less_vars['content_color'] = $instance['settings']['content_color'];
		}
		if ( ! empty( $instance['settings']['get_quote_text_color'] ) ) {
			$less_vars['get_quote_text_color'] = $instance['settings']['get_quote_text_color'];
		}
		
		if ( ! empty( $instance['settings']['get_quote_text_background_color'] ) ) {
			$less_vars['get_quote_text_background_color'] = $instance['settings']['get_quote_text_background_color'];
		}
		return $less_vars;
	}


}
siteorigin_widget_register('fi-print-contact-ways', __FILE__,'Fi_Print_Contact_Ways_Widget');
