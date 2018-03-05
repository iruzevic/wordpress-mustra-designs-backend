<?php
/**
 * Fired during plugin deactivation
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Includes;

/**
 * Class Deactivator
 */
class Deactivator {

  /**
   * Run functions on plugin deactivation
   *
   * @since 1.0.0
   */
  public static function deactivate() {
    flush_rewrite_rules();
  }
}
