<?php
/**
 * The Advance Custom Field plugin specific functionality.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf;

/**
 * Class Advance Custom Fields
 *
 * Main class for any ACF functionality.
 */
class Acf {

  /**
   * Global plugin name
   *
   * @var string
   *
   * @since 1.0.0
   */
  protected $plugin_name;

  /**
   * Global plugin version
   *
   * @var string
   *
   * @since 1.0.0
   */
  protected $plugin_version;

  /**
   * Initialize class
   *
   * @param array $plugin_info Load global plugin info.
   *
   * @since 2.0.0
   */
  public function __construct( $plugin_info = null ) {
    $this->plugin_name    = $plugin_info['plugin_name'];
    $this->plugin_version = $plugin_info['plugin_version'];
  }

  /**
   * Add new toolbar to the ACF WYSIWYG editor
   *
   * @param  array $toolbars Existing toolbars.
   * @return array           Modified toolbars.
   *
   * @since 2.0.0
   */
  public function add_wysiwyg_toolbars( $toolbars ) {

    $toolbars['Very Simple'] = array();
    $toolbars['Very Simple'][1] = array( 'bold', 'italic', 'underline', 'formatselect' );

    $key = array_search( 'code', $toolbars['Full'][2], true );

    if ( $key !== false ) {
      unset( $toolbars['Full'][2][ $key ] );
    }

    return $toolbars;
  }

}
