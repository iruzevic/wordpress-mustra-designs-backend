<?php
/**
 * The Menu specific functionality.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Admin;

use Mustra_Designs\Plugins\Acf as Acf;

/**
 * Class Menu
 */
class Menu {

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
   * Initialize the class
   *
   * @param array $plugin_info Load global theme info.
   *
   * @since 1.0.0
   */
  public function __construct( $plugin_info = null ) {
    $this->plugin_name    = $plugin_info['plugin_name'];
    $this->plugin_version = $plugin_info['plugin_version'];
  }

  /**
   * Return all menu poistions
   *
   * @return array Of menu positions with name and slug.
   *
   * @since 1.0.1
   */
  public function get_menu_positions() {
    return array(
        'headerMenu'  => esc_html__( 'Main Menu', 'mustra_designs' ),
        'footerMenu'  => esc_html__( 'Footer Menu', 'mustra_designs' ),
    );
  }

  /**
   * Register All Menu positions
   *
   * @since 1.0.0
   */
  public function register_menu_positions() {
    register_nav_menus(
      $this->get_menu_positions()
    );
  }

  /**
   * Remove admin bar nodes.
   *
   * @param object $admin_bar Admin bar object
   *
   * @since 1.0.0
   */
  public function admin_bar_remove_nodes( $admin_bar ) {
    $admin_bar->remove_node( 'wp-logo' );
    $admin_bar->remove_node( 'site-name' );
    $admin_bar->remove_node( 'comments' );
  }

  /**
   * Add admin bar nodes.
   *
   * @param object $admin_bar Admin bar object
   *
   * @since 1.0.0
   */
  public function admin_bar_add_nodes( $admin_bar ) {
    $theme_options  = new Acf\Theme_Options();

    $args = array(
        'id'     => 'frontend-link',
        'title'  => esc_html__( 'Mustra-Designs Frontend', 'mustra_designsm' ),
        'href'   => esc_url( $theme_options->get_theme_option_plain( 'frontend_url' ) ),
        'meta'   => array(
            'target' => '_blank',
        ),
    );
    $admin_bar->add_node( $args );
  }
}
