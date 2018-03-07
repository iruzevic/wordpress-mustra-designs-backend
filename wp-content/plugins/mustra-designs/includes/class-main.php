<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Includes;

use Mustra_Designs\Admin as Admin;
use Mustra_Designs\Plugins as Plugins;
use Mustra_Designs\Plugins\Acf as Acf;
use Mustra_Designs\Front as Front;

/**
 * The main start class.
 *
 * This is used to define admin-specific hooks
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 */
class Main {

  /**
   * Loader variable for hooks
   *
   * @var Loader $loader Maintains and registers all hooks for the plugin.
   *
   * @since 1.0.0
   */
  protected $loader;

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
   * Global assets version
   *
   * @var string
   *
   * @since 1.0.0
   */
  protected $assets_version;

  /**
   * Initialize class
   * Load hooks and define some global variables.
   *
   * @since 1.0.0
   */
  public function __construct() {
    if ( defined( 'MD_PLUGIN_VERSION' ) ) {
      $this->plugin_version = MD_PLUGIN_VERSION;
    } else {
      $this->plugin_version = '1.0.0';
    }

    if ( defined( 'MD_PLUGIN_NAME' ) ) {
      $this->plugin_name = MD_PLUGIN_NAME;
    } else {
      $this->plugin_name = 'mustra-designs';
    }

    $this->load_dependencies();
    $this->set_locale();
    $this->define_admin_hooks();
    $this->define_plugins_hooks();
  }

  /**
   * Load the required dependencies.
   *
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   *
   * @since 1.0.0
   */
  private function load_dependencies() {
    $this->loader = new Loader();
  }

  /**
   * Define the locale for this plugin for internationalization.
   *
   * Uses the Mustra_Designs_i18n class in order to set the domain and to register the hook
   * with WordPress.
   *
   * @since 1.0.0
   */
  private function set_locale() {
    $plugin_i18n = new Internationalization( $this->get_plugin_info() );

    $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
  }

  /**
   * Register all of the hooks related to the admin area functionality
   * of the plugin.
   *
   * @since 1.0.0
   */
  private function define_admin_hooks() {
    $admin          = new Admin\Admin( $this->get_plugin_info() );
    $login          = new Admin\Login( $this->get_plugin_info() );
    $menu           = new Admin\Menu( $this->get_plugin_info() );
    $media          = new Admin\Media( $this->get_plugin_info() );
    $shared_section = new Admin\Shared_Section( $this->get_plugin_info() );
    $projects       = new Admin\Projects( $this->get_plugin_info() );

    // Admin.
    $this->loader->add_action( 'login_enqueue_scripts', $admin, 'enqueue_styles' );
    $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles', 50 );
    $this->loader->add_action( 'admin_body_class', $admin, 'set_enviroment_body_class' );
    $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_scripts' );

    // Login page.
    $this->loader->add_filter( 'login_headerurl', $login, 'custom_login_url' );

    // Menu.
    $this->loader->add_action( 'after_setup_theme', $menu, 'register_menu_positions' );
    $this->loader->add_action( 'admin_bar_menu', $menu, 'admin_bar_remove_nodes', 999 );
    $this->loader->add_action( 'admin_bar_menu', $menu, 'admin_bar_add_nodes', 10 );

    // Media.
    $this->loader->add_action( 'upload_mimes', $media, 'enable_mime_types' );
    $this->loader->add_action( 'wp_prepare_attachment_for_js', $media, 'enable_svg_library_preview', 10, 3 );
    $this->loader->add_action( 'embed_oembed_html', $media, 'wrap_responsive_oembed_filter', 10, 4 );
    $this->loader->add_action( 'after_setup_theme', $media, 'add_theme_support' );
    $this->loader->add_action( 'after_setup_theme', $media, 'add_custom_image_sizes' );

    // Shared Sesction.
    $this->loader->add_action( 'init', $shared_section, 'register_post_type' );

    // Projects.
    $this->loader->add_action( 'init', $projects, 'register_post_type' );
    $this->loader->add_action( 'init', $projects, 'register_taxonomy' );
  }

    /**
   * Register hooks for AFC functionality
   *
   * @since 1.0.0
   */
  private function define_plugins_hooks() {
    $section_creator_template = new Acf\Section_Creator_Template( $this->get_plugin_info() );
    $section_creator          = new Acf\Section_Creator( $this->get_plugin_info() );
    $acf_theme_options        = new Acf\Theme_Options( $this->get_plugin_info() );
    $djc                      = new Plugins\Decoupled_Json_Content( $this->get_plugin_info() );

    // Section Creator Template Page.
    $this->loader->add_action( 'plugins_loaded', $section_creator_template, 'get_instance' );

    // Section Creator.
    $this->loader->add_action( 'acf/init', $section_creator, 'register_section_creator' );

    // Plugin ACF - Theme Options.
    $this->loader->add_action( 'acf/init', $acf_theme_options, 'create_theme_options_page' );
    $this->loader->add_action( 'acf/init', $acf_theme_options, 'register_theme_options' );
    $this->loader->add_action( 'acf/init', $acf_theme_options, 'set_theme_options' );
    $this->loader->add_action( 'acf/save_post', $acf_theme_options, 'remove_transient' );

    // Additional post types in decoupled JSON.
    $this->loader->add_action( 'djc_set_items_allowed_post_types', $djc, 'append_post_types' );
    $this->loader->add_action( 'djc_set_items_custom_fields', $djc, 'set_custom_fields' );
    $this->loader->add_action( 'djc_set_items_append', $djc, 'set_section_creator_fields' );
    $this->loader->add_filter( 'djc_set_items_page_template', $djc, 'set_page_template' );
    $this->loader->add_filter( 'djc_set_general_endpoint', $djc, 'append_to_endpoints_list' );
    $this->loader->add_filter( 'djc_remove_menu_prefix_slash', $djc, 'menu_prefix_slash' );
  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since 1.0.0
   */
  public function run() {
    $this->loader->run();
  }

  /**
   * The reference to the class that orchestrates the hooks.
   *
   * @return Loader Orchestrates the hooks.
   *
   * @since 1.0.0
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * The name used to uniquely identify it within the context of
   * WordPress and to define internationalization functionality.
   *
   * @return string Plugin name.
   *
   * @since 1.0.0
   */
  public function get_plugin_name() {
    return $this->plugin_name;
  }

  /**
   * Retrieve the version number.
   *
   * @return string Plugin version number.
   *
   * @since 1.0.0
   */
  public function get_plugin_version() {
    return $this->plugin_version;
  }

  /**
   * Retrieve the plugin info array.
   *
   * @return array Plugin info array.
   *
   * @since 1.0.0
   */
  public function get_plugin_info() {
    return array(
        'plugin_name' => $this->plugin_name,
        'plugin_version' => $this->plugin_version,
    );
  }

}
