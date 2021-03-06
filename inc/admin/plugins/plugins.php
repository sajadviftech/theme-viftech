<?php
require Theme_Config::$vif_theme_directory . 'inc/admin/plugins/class-tgm-plugin-activation.php';

function vif_register_required_plugins() {
	$data = Theme_Config()->vif_check_for_update_plugins();

	if (isset($data->plugins)) {
		foreach ($data->plugins as $plugin) {
			switch ($plugin->plugin_name) {
				case 'WPBakery Visual Composer':
				case 'WPBakery Page Builder':
					$slug = 'js_composer';
					break;
			}
			$plugins[] = array(
				'name'	=> $plugin->plugin_name,
				'slug'		=> $slug,
				'source' => $plugin->download_url,
				'force_activation' => false,
				'force_deactivation' => false,
				'version' => $plugin->version,
				'required' => true,
				'external_url'	 => '',
				'image_url' => Theme_Config::$vif_theme_directory_uri .'assets/img/admin/plugins/'.esc_attr($slug).'.png'
			);
		}
	} else {
		$plugins[] = array(
			'name'			=> 'WPBakery Visual Composer', // The plugin name
			'slug'			=> 'js_composer', // The plugin slug (typically the folder name)
			'source'			=> Theme_Config::$vif_theme_directory_uri . 'inc/admin/plugins/plugins/codecanyon-242431-visual-composer-page-builder-for-wordpress-wordpress-plugin.zip', 
			'version'				=> '5.1.1',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' 	=> '',
			'required'			=> true, // If false, the plugin is only 'recommended' instead of required
			'image_url' => Theme_Config::$vif_theme_directory_uri .'assets/img/admin/plugins/js_composer.png'
		);
	}
	
	$plugins[] = array(
		'name'     				=> esc_html__('Contact Form 7', 'viftech'), // The plugin name
		'slug'     				=> 'contact-form-7', // The plugin source
		'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		'force_deactivation' 	=> false // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	);
	$config = array(
		'id'              => 'thb',
		'domain'       		=> 'viftech',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug'       => 'themes.php',
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'return'       	=> esc_html__( 'Return to Theme Plugins', 'viftech' )
		)
	);
	tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'vif_register_required_plugins');