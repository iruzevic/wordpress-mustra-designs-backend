<?php
/**
 * Class that adds custom section creator page template.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf;

/**
 * Class Section_Creator_Template
 */
class Section_Creator_Template {

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
   * A reference to an instance of this class.
   *
   * @var      string    $instance    Class instance.
   *
   * @since    1.0.0
   */
  private static $instance;

  /**
   * The array of templates that this plugin tracks.
   *
   * @var      string    $templates    Custom page templates name.
   *
   * @since    1.0.0
   */
  protected $templates;

  /**
   * Template name
   *
   * @var string
   *
   * @since 1.0.0
   */
  public $template_name = 'section-creator-template.php';

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

    $this->templates = array();

    // Add a filter to the attributes metabox to inject template into the cache.
    if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
      // 4.6 and older.
      add_filter( 'page_attributes_dropdown_pages_args', array( $this, 'register_project_templates' ) );
    } else {
      // Add a filter to the wp 4.7 version attributes metabox.
      add_filter( 'theme_page_templates', array( $this, 'add_new_template' ) );
    }

    // Add a filter to the save post to inject out template into the page cache.
    add_filter( 'wp_insert_post_data', array( $this, 'register_project_templates' ) );

    /**
     * Add a filter to the template include to determine if the page has our
     * template assigned and return it's path.
     */
    add_filter( 'template_include', array( $this, 'view_project_template' ) );

    // Add your templates to this array.
    $this->templates = array(
        $this->template_name => esc_html__( 'Section Creator', 'mustra_designs' ),
    );

  }

  /**
   * Returns an instance of this class.
   *
   * Singleton pattern.
   *
   * @since 1.0.0
   */
  public static function get_instance() {

    if ( null === self::$instance ) {
      self::$instance = new Section_Creator_Template();
    }

    return self::$instance;

  }

  /**
   * Adds our template to the page dropdown for v4.7+
   *
   * @param array $posts_templates Array of post templates.
   * @return array $posts_templates Updated array of post templates.
   *
   * @since 1.0.0
   */
  public function add_new_template( $posts_templates ) {
    $posts_templates = array_merge( $posts_templates, $this->templates );
    return $posts_templates;
  }

  /**
   * Register page templates
   *
   * Adds our template to the pages cache in order to trick WordPress
   * into thinking the template file exists where it doesn't really exist.
   *
   * @param  array $atts Array of attributes.
   *
   * @since 1.0.0
   */
  public function register_project_templates( $atts ) {

    // Create the key used for the themes cache.
    $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

    // Retrieve the cache list.
    // If it doesn't exist, or it's empty prepare an array.
    $templates = wp_get_theme()->get_page_templates();
    if ( empty( $templates ) ) {
      $templates = array();
    }

    // New cache, therefore remove the old one.
    wp_cache_delete( $cache_key , 'themes' );

    // Now add our template to the list of templates by merging our templates
    // with the existing templates array from the cache.
    $templates = array_merge( $templates, $this->templates );

    // Add the modified cache to allow WordPress to pick it up for listing
    // available templates.
    wp_cache_add( $cache_key, $templates, 'themes', 1800 );

    return $atts;

  }

  /**
   * Checks if the template is assigned to the page
   *
   * @param  string $template Template file.
   * @return string $template Template file.
   *
   * @since 1.0.0
   */
  public function view_project_template( $template ) {

    // Get global post.
    global $post;

    if ( is_singular( 'projects-type' ) && ! file_exists( get_stylesheet_directory() . '/' . $this->template_name ) ) {
      $template = plugin_dir_path( __FILE__ ) . 'templates/' . $this->template_name;
    }

    // Return template if post is empty.
    if ( ! $post ) {
      return $template;
    }

    // Return default template if we don't have a custom one defined.
    if ( ! isset( $this->templates[ get_post_meta( $post->ID, '_wp_page_template', true ) ] ) ) {
      return $template;
    }

    $file = plugin_dir_path( __FILE__ ) . get_post_meta(
      $post->ID, '_wp_page_template', true
    );

    // Just to be safe, we check if the file exist first.
    if ( file_exists( $file ) ) {
      return $file;
    } else {
      echo $file; // WPCS: XSS ok.
    }

    // Return template.
    return $template;
  }

}
