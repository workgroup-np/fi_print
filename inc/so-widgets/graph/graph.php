<?php

class Fi_Print_Graph_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-graph',
			__( 'Fi_Print: Graph', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays an contact graph details', 'siteorigin-widgets' ),

				),
			array(),
			array(

				'title' => array(
					'type' => 'text',
					'label' => __('Tilte', 'siteorigin-widgets'),
				),

				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'fi_print' ),
				),

				'graph_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Graph Details.', 'fi_print'),
					'fields' => array(
						'graph_label' => array(
							'type'  => 'text',
							'label' => __( 'Graph Label', 'fi_print' )
						),
						'x_axis_value' => array(
							'type'  => 'text',
							'label' => __( 'Value corresponds to X axis', 'fi_print' )
						),
						'x_axis_value' => array(
							'type'  => 'text',
							'label' => __( 'Value corresponds to Y axis', 'fi_print' )
						),
						'background_color' => array(
							'type'  => 'color',
							'label' => __( 'Background Color', 'fi_print' )
						),

						
					),
				),

			)
		);
	}
	

	function initialize() {
        $this->register_frontend_scripts(
            array(
                array(
                    'fi_print-graph',
                    get_template_directory_uri() . '/inc/so-widgets/graph/js/chart.min.js',
                    array('jquery')
                ),
            )
        );
        
	}
function get_template_name($instance){


		return 'default';
	}


}
siteorigin_widget_register('fi_print-graph', __FILE__,'Fi_Print_Graph_Widget');
