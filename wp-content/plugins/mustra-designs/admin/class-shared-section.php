<?php
/**
 * The Shared_Section specific functionality.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Admin;

/**
 * Class Shared_Section
 */
class Shared_Section {

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
   * The custom post type slug
   *
   * @var string
   *
   * @since 1.0.0
   */
  public $post_type_slug = 'shared-section';

  /**
   * Initialize class
   *
   * @param array $plugin_info Load global theme info.
   *
   * @since 1.0.0
   */
  public function __construct( $plugin_info = null ) {
    $this->plugin_name     = $plugin_info['plugin_name'];
    $this->plugin_version  = $plugin_info['plugin_version'];
  }

  /**
   * Register custom post type
   *
   * @since 1.0.0
   */
  public function register_post_type() {
    $args = array(
        'label'               => esc_html__( 'Shared Section', 'mustra_designs' ),
        'public'              => true,
        'menu_position'       => 48,
        'menu_icon'           => 'dashicons-images-alt',
        'supports'            => array( 'title' ),
        'has_archive'         => false,
        'show_in_rest'        => false,
        'publicly_queryable'  => false,
    );

    register_post_type( $this->post_type_slug, $args );
  }
}
