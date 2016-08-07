<?php



class Fi_Print_Client_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'fi-print-client',

			__( 'Fi Print: Client', 'fi-print' ),

			array(

				'description' => __('Display Client Logos', 'fi-print' ),



				),

			array(),

			array(

				'style'=>  array(

							'type'  => 'select',

							'label' => __( 'Widget Style', 'fi-print' ),

							'options'=> array(

								'single' => __('Single row style', 'fi-print'),
								
								'grid' => __('Grid style', 'fi-print') ,

							), 

							'default' => 'single',

						),

				'client_repeater' => array(

					'type'  => 'repeater',

					'label' => __('Client Details.', 'fi-print'),

					'fields' => array(



						'client_title'=>  array(

							'type'  => 'media',

							'label' => __( 'Client Image', 'fi-print' )

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

siteorigin_widget_register('fi-print-client', __FILE__,'Fi_Print_Client_Widget');

