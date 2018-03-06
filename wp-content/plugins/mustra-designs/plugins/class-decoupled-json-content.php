<?php
/**
 * The decoupled-json-content plugin override specific functionality.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins;

use Mustra_Designs\Admin as Admin;
use Mustra_Designs\Plugins\Acf as Acf;

/**
 * Class Decoupled_Json_Content
 */
class Decoupled_Json_Content {

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
   * Projects class
   *
   * @var object Projects
   *
   * @since 1.0.0
   */
  public $projects;

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

    $this->projects = new Admin\Projects( $plugin_info );
    $this->acf_section_creator_template = new Acf\Section_Creator_Template( $plugin_info );
  }

  /**
   * Return all sections from section creator.
   *
   * @param int $post_id Page/Post ID.
   * @return array
   *
   * @since  1.0.0
   */
  public function set_section_creator_fields() {
    global $post;

    if ( $post->post_type === 'page' ) {
      // Page can have multiple types.
      if ( get_page_template_slug( $post->ID ) === $this->acf_section_creator_template->template_name ) {
        return array(
            'sections' => get_field( 'sections', $post->ID )
        );
      }
    }

    if ( $post->post_type === $this->projects->post_type_slug ) {
      // Used for projects.
      return array(
          'sections' => get_field( 'sections', $post->ID )
      );
    }
  }

  /**
   * Get the array of allowed types to do operations on.
   *
   * @return array
   *
   * @since 1.0.0
   */
  public function append_post_types( $default_types ) {
    $default_types[] = $this->projects->post_type_slug;
    
    return $default_types;
  }

  /**
   * Set page template name depenting on type
   *
   * @return string
   *
   * @since 1.0.0
   */
  public function set_page_template() {
    global $post;

    if ( $post->post_type === 'page' ) {
      // Page can have multiple types.
      if ( get_page_template_slug( $post->ID ) === $this->acf_section_creator_template->template_name ) {
        return 'section-creator';
      }

      return 'default';
    }

    if ( $post->post_type === $this->projects->post_type_slug ) {
      // Used for projects.
      return 'section-creator';
    }

    return false;
  }

  /**
   * Append data to Settings page od decoupled json content listing page.
   *
   * @return array
   *
   * @since 1.0.0
   */
  public function append_to_endpoints_list( $default ) {
    $default[] = array(
      'title' => esc_html__( 'Theme Options', 'mustra_designs' ),
      'url'   => esc_url( get_home_url() . '/wp-content/plugins/' . $this->plugin_name . '/rest-routes/theme-options.php' ),
      'note'  => wp_kses_post( 'Used all-around the web for different options.<br/>Transient data is set on admin front. <br/>Cache updated on Theme Options update.', 'mustra_designs'  )
    );

    return $default;
  }

}
