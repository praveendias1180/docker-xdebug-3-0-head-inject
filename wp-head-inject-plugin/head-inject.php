<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://praveendias1180.github.io/
 * @since             1.0.0
 * @package           Head_Inject
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Head Inject
 * Plugin URI:        https://praveendias1180.github.io/
 * Description:       Inject custom code snippets in every page. Just paste the code and it'll be there in the head of every page.
 * Version:           1.0.0
 * Author:            Praveen Dias
 * Author URI:        https://praveendias1180.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       head-inject
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HEAD_INJECT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-head-inject-activator.php
 */
function activate_head_inject() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-head-inject-activator.php';
	Head_Inject_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-head-inject-deactivator.php
 */
function deactivate_head_inject() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-head-inject-deactivator.php';
	Head_Inject_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_head_inject' );
register_deactivation_hook( __FILE__, 'deactivate_head_inject' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-head-inject.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_head_inject() {

	$plugin = new Head_Inject();
	$plugin->run();

}
run_head_inject();