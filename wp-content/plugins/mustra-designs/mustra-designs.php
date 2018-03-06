<?php
/**
 * Plugin main file starting point
 *
 * @since             1.0.0
 * @package           mustra_designs
 *
 * @wordpress-plugin
 * Plugin Name:       mustra-designs
 * Plugin URI:
 * Description:       This is the main functionality for Mustra Designs site
 * Version:           1.0.0
 * Author:            Ivan Ruzevic <ruzevic.ivan@gmail.com>
 * Author URI:        https://github.com/iruzevic
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mustra_designs
 */

namespace Mustra_Designs;

use Mustra_Designs\Includes as Includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

/**
 * Plugins version global
 *
 * @since 1.0.0
 * @package mustra_designs
 */
define( 'MD_PLUGIN_VERSION', '1.0.0' );

/**
 * Plugins name global
 *
 * @since 1.0.0
 * @package mustra_designs
 */
define( 'MD_PLUGIN_NAME', 'mustra_designs' );

/**
 * Include the autoloader so we can dynamically include the rest of the classes.
 *
 * @since 1.0.0
 * @package mustra_designs
 */
include_once( 'lib/autoloader.php' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 *
 * @since 1.0.0
 */
function activate() {
  Includes\Activator::activate();
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\\activate' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 *
 * @since 1.0.0
 */
function deactivate() {
  Includes\Deactivator::deactivate();
}

register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\deactivate' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
function init_plugin() {
  $plugin = new Includes\Main();
  $plugin->run();
}

init_plugin();
