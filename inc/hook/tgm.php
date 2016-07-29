<?php
/**
 * Recommended plugins.
 *
 * @package Fi Print
 */

add_action( 'tgmpa_register', 'fi_print_activate_recommended_plugins' );

/**
 * Register recommended plugins.
 *
 * @since 1.0.0
 */
function fi_print_activate_recommended_plugins() {

	$plugins = array(

		array(
			'name'     => __( 'Siteorigin-Panels', 'fi-print' ),
			'slug'     => 'siteorigin-panels',
			'required' => true,
		),
		array(
			'name'     => __( 'SiteOrigin Widgets Bundle', 'fi-print' ),
			'slug'     => 'fi-print',
			'required' => true,
		),

	);

	$config = array();

	tgmpa( $plugins, $config );

}
