<?php
/**
 * Generate rest doute
 *
 * Route location: /wp-content/plugins/mustra-designs/rest-routes/theme-options.php
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf;

use Mustra_Designs\Helpers as General_Helpers;

require_once( '../wp-config-simple.php' );
require_once( '../plugins/acf/class-theme-options.php' );
require_once( '../helpers/class-general-helper.php' );

$theme_options = new Theme_Options();
$general_helper = new General_Helpers\General_Helper();

$cache = get_transient( $theme_options->theme_options_api_slug );

if ( $cache === false ) {
  wp_send_json( $general_helper->set_msg_array( 'error', 'Error, theme options does not exist or it is not cached correctly. Please try rebuilding cache and try again!' ) );
}

wp_send_json( json_decode( $cache ) );
