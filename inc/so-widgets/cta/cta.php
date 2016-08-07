<?php

class Fi_Print_Cta_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-cta',
			__( 'Fi_Print: CTA', 'fi-print' ),
			array(
				'description' => __( 'A simple call to action widget.', 'fi-print' ),
			),
			array(),
			array(
				'primary_title' => array(
					'type'  => 'text',
					'label' => __( 'Primary Title', 'fi-print' ),
				),

				'secondary_title' => array(
					'type'  => 'text',
					'label' => __( 'Subtitle', 'fi-print' ),
				),

				'btntext' => array(
					'type'  => 'text',
					'label' => __( 'Button Text', 'fi-print' ),
				),
				'btnurl' => array(
					'type'  => 'text',
					'label' => __( 'Button Url', 'fi-print' ),
				),
				'target' => array(
					'type'  => 'checkbox',
					'label' => __( 'Open in New Tab?', 'fi-print' ),
				),
			)
		);
	}

	function get_style_name( $instance ) {

		return 'fi-print-title';
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'fi-print-cta', __FILE__, 'Fi_Print_Cta_Widget' );
