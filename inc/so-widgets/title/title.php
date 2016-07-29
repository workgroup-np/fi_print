<?php

class Fi_Print_Title_Subtitle_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-title-subtitle',
			__( 'Fi_Print: Title', 'fi-print' ),
			array(
				'description' => __( 'A simple title and subtitle widget.', 'fi-print' ),
			),
			array(),
			array(
				'primary_title' => array(
					'type'  => 'text',
					'label' => __( 'Primary Title', 'fi-print' ),
				),

				'secondary_title' => array(
					'type'  => 'text',
					'label' => __( 'Secondary Title', 'fi-print' ),
				),

				'title_content' => array(
					'type'  => 'textarea',
					'label' => __( 'Sub Title', 'fi-print' ),
				),

				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Color Settings', 'fi-print' ),
					'hide' => true,
					'fields' => array(
						'color_primary_title' => array(
							'type'    => 'color',
							'label'   => __( 'Primary Title Color', 'fi-print' ),
							'default' => '#fff',
						),
						'color_secondary_title' => array(
							'type'    => 'color',
							'label'   => __( 'Secondary Title Color', 'fi-print' ),
							'default' => '#fff',
						),
						'color_title_content' => array(
							'type'    => 'color',
							'label'   => __( 'Content Color', 'fi-print' ),
							'default' => '#fff',
						),
	    			),
				),

			)
		);
	}

	function get_style_name( $instance ) {

		return 'fi-print-title';
	}

	function get_less_variables( $instance ) {

		$less_vars = array();
		if ( ! empty( $instance['settings']['color_primary_title'] ) ) {
			$less_vars['color_primary_title'] = $instance['settings']['color_primary_title'];
		}
		if ( ! empty( $instance['settings']['color_secondary_title'] ) ) {
			$less_vars['color_secondary_title'] = $instance['settings']['color_secondary_title'];
		}
		if ( ! empty( $instance['settings']['color_title_content'] ) ) {
			$less_vars['color_title_content'] = $instance['settings']['color_title_content'];
		}
		return $less_vars;
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'fi-print-title-subtitle', __FILE__, 'Fi_Print_Title_Subtitle_Widget' );
