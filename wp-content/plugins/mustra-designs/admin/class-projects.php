<?php
/**
 * The Projects specific functionality.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Admin;

/**
 * Class Projects
 */
class Projects {

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
  public $post_type_slug = 'projects';

  /**
   * The custom taxonomy slug
   *
   * @var string
   *
   * @since 1.0.0
   */
  public $taxonomy_slug = 'projects-categories';

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
        'label'               => esc_html__( 'Projects', 'mustra_designs' ),
        'public'              => true,
        'menu_position'       => 47,
        'menu_icon'           => 'dashicons-images-alt2',
        'supports'            => array( 'title' ),
        'has_archive'         => false,
        'show_in_rest'        => false,
        'publicly_queryable'  => true,
    );

    register_post_type( $this->post_type_slug, $args );
  }

  /**
   * Register custom taxonomy
   *
   * @since 1.0.0
   */
  public function register_taxonomy() {
    $args = array(
        'hierarchical'      => true,
        'label'             => esc_html__( 'Projects Categories', 'mustra_designs' ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => false,
        'query_var'         => true,
    );
    register_taxonomy( $this->taxonomy_slug, array( $this->post_type_slug ), $args );
  }
}
