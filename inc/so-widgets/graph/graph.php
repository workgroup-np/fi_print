<?php

class Fi_Print_Graph_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-graph',
			__( 'Fi_Print: Graph', 'fi-print' ),
			array(
				'description' => __('Displays an contact graph details', 'fi-print' ),

				),
			array(),
			array(
				'type' => array(
					'type' => 'select',
					'label' => __('Graph Type Icon Style', 'fi-print'),
					'options' => array(
						'line' => __('Line Graph Style', 'fi-print'),
						'bar' => __('Bar Graph Style', 'fi-print'),						
					)
				),			

				'x_axis_value' => array(
					'type'  => 'text',
					'label' => __( 'Value corresponds to X axis', 'fi-print' ),
					'description' => __( 'Provide the set of values seperated by commas. eg:1st Jan,2nd Jan,3rd Jan,4th Jan', 'fi-print' )
				),
				'graph_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Graph Details.', 'fi-print'),
					'fields' => array(
						'graph_label' => array(
							'type'  => 'text',
							'label' => __( 'Graph Label', 'fi-print' )
						),
						'y_axis_value' => array(
							'type'  => 'text',
							'label' => __( 'Value corresponds to Y axis', 'fi-print' ),
							'description' => __( 'Provide the set of values seperated by commas. eg:1,2,3,4', 'fi-print' )
						),
						'color' => array(
							'type' => 'select',
							'label' => __('Select Color', 'fi-print'),
							'options' => array(
								'red' => __('Red', 'fi-print'),
								'yellow' => __('Yellow', 'fi-print'),						
								'blue' => __('Blue', 'fi-print'),						
							)
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
                    'fi-print-graph',
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
siteorigin_widget_register('fi-print-graph', __FILE__,'Fi_Print_Graph_Widget');
