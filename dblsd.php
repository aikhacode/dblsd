<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              
 * @since             1.0.0
 * @package           Plugin_Test_BRo
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Test
 * Plugin URI:        
 * Description:       Test 
 * Version:           1.0.0
 * Author:            aikhacode
 * Author URI:        http://fastkrisna.my.id/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aikhacode-test
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
define( 'AIKHACODE_TEST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_plugin_name() {
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_plugin_name() {
	
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );


//R::setup('mysql:host=localhost;dbname=wptest', 'root', 'toto');
//R::freeze(false);

// require 'dbcore/class-migration.php'; 
// require 'dbcore/class-table-report.php';

require 'dbcore/bootstrap.php';

$rep = new LSD\Migration\Report();








