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
		'slug'     => 'so-widgets-bundle',
		'required' => true,
		),
		array(
		'name'     => __('Theme Addons','fi-print'), // The plugin name.
		'slug'     => __('fi-print-addons','fi-print'), // The plugin slug (typically the folder name).
		'source'   => get_stylesheet_directory() . '/inc/plugins/fi-print-addons.zip', // The plugin source.
		'required' => true, // If false, the plugin is only 'recommended' instead of required.
		), 

	);

	$config = array();

	tgmpa( $plugins, $config );

}
