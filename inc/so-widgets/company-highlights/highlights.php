<?php

class Fi_Print_Company_Highlights_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-company-highlights',
			__( 'Fi_Print: Company Highlights', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays an company-highlights details', 'siteorigin-widgets' ),

				),
			array(),
			array(
				'primary_title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Title', 'fi_print' ),
				),

				'title_content' => array(
					'type'  => 'text',
					'label' => __( 'Widget Sub Title', 'fi_print' ),
				),
				'company_highlights_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Contact Details.', 'fi_print'),
					'fields' => array(
									
							'icon' => array(
								'type'  => 'icon',
								'label' => __( 'Select Icon', 'fi_print' )
							),
							'title' => array(
								'type' => 'text',
								'label' => __('Tilte', 'fi_print'),
							),

							'sub_title' => array(
								'type' => 'text',
								'label' => __( 'Sub Title', 'fi_print' ),
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
siteorigin_widget_register('fi_print-company-highlights', __FILE__,'Fi_Print_Company_Highlights_Widget');
