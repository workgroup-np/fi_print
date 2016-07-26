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
				'type' => array(
					'type' => 'select',
					'label' => __('Graph Type Icon Style', 'siteorigin-widgets'),
					'options' => array(
						'line' => __('Line Graph Style', 'siteorigin-widgets'),
						'bar' => __('Bar Graph Style', 'siteorigin-widgets'),						
					)
				),			

				'x_axis_value' => array(
					'type'  => 'text',
					'label' => __( 'Value corresponds to X axis', 'fi_print' ),
					'description' => __( 'Provide the set of values seperated by commas. eg:1st Jan,2nd Jan,3rd Jan,4th Jan', 'fi_print' )
				),
				'graph_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Graph Details.', 'fi_print'),
					'fields' => array(
						'graph_label' => array(
							'type'  => 'text',
							'label' => __( 'Graph Label', 'fi_print' )
						),
						'y_axis_value' => array(
							'type'  => 'text',
							'label' => __( 'Value corresponds to Y axis', 'fi_print' ),
							'description' => __( 'Provide the set of values seperated by commas. eg:1,2,3,4', 'fi_print' )
						),
						'color' => array(
							'type' => 'select',
							'label' => __('Select Color', 'siteorigin-widgets'),
							'options' => array(
								'red' => __('Red', 'siteorigin-widgets'),
								'yellow' => __('Yellow', 'siteorigin-widgets'),						
								'blue' => __('Blue', 'siteorigin-widgets'),						
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
