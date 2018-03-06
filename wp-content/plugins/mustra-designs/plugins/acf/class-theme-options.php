<?php
/**
 * The Advance Custom Fields helper specific functionality.
 * Used on fields created via ACF for theme options
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf;

use Mustra_Designs\Helpers as General_Helpers;

/**
 * Class Theme Options
 */
class Theme_Options {

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
   * Theme options page slug
   *
   * @var string
   *
   * @since 1.0.0
   */
  protected $theme_options_general_slug = 'theme_options';

  /**
   * Theme options transient name
   *
   * @var string
   *
   * @since 1.0.0
   */
  public $theme_options_api_slug = 'md_general_settings';

  /**
   * Initialize class
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
   * Create Options page in sidebar
   *
   * @since 1.0.0
   */
  public function create_theme_options_page() {
    if ( function_exists( 'acf_add_options_page' ) ) {

      acf_add_options_page(
        array(
            'page_title' => esc_html__( 'General Settings', 'mustra_designs' ),
            'menu_title' => esc_html__( 'Theme Options', 'mustra_designs' ),
            'menu_slug'  => $this->theme_options_general_slug,
            'capability' => 'edit_theme_options',
            'redirect'   => false,
            'icon_url'   => 'dashicons-welcome-view-site',
        )
      );
    }
  }

  /**
   * Populate Options page
   *
   * @since 1.0.0
   */
  public function register_theme_options() {
    if ( function_exists( 'acf_add_options_page' ) ) {
      acf_add_local_field_group(
        array(
            'key' => 'group_59b6769d4340b',
            'title' => esc_html__( 'Theme Options General', 'mustra_designs' ),
            'fields' => array(
                array(
                    'key' => 'field_59b676a3281da',
                    'label' => esc_html__( 'Footer', 'mustra_designs' ),
                    'name' => '',
                    'type' => 'tab',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'placement' => 'top',
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_59b676ac281db',
                    'label' => esc_html__( 'Footer Copyright Content', 'mustra_designs' ),
                    'name' => 'footer_copyright_content',
                    'type' => 'text',
                    'instructions' => esc_html__( 'Enter Footer Copyright Content.', 'mustra_designs' ),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_59b676a3281d1',
                    'label' => esc_html__( 'Cookies Notification', 'mustra_designs' ),
                    'name' => '',
                    'type' => 'tab',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'placement' => 'top',
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_59fb504743aa4',
                    'label' => esc_html__( 'Content', 'mustra_designs' ),
                    'name' => 'cookies_notification_description',
                    'type' => 'wysiwyg',
                    'value' => null,
                    'instructions' => esc_html__( 'Content for Accepting Cookies Notification.', 'mustra_designs' ),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'delay' => 1,
                ),
                array(
                    'key' => 'field_59b676a3281d2',
                    'label' => esc_html__( 'Social', 'mustra_designs' ),
                    'name' => '',
                    'type' => 'tab',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'placement' => 'top',
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_5a855fbb92278',
                    'label' => 'Social',
                    'name' => 'social',
                    'type' => 'repeater',
                    'instructions' => esc_html__( 'Add Social Media Links.', 'mustra_designs' ),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5a855fc792279',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_5a855fd29227a',
                            'label' => 'Icon',
                            'name' => 'icon',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                'facebook' => 'Facebook',
                                'twitter' => 'Twitter',
                                'linkedin' => 'LinkedIn',
                                'github' => 'GitHub',
                                'pinterest' => 'Pinterest',
                                'flickr' => 'Flickr',
                            ),
                            'default_value' => array(
                                0 => 'facebook',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'ajax' => 0,
                            'return_format' => 'value',
                            'placeholder' => '',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_59b676a3281d8',
                    'label' => esc_html__( 'Advanced', 'mustra_designs' ),
                    'name' => '',
                    'type' => 'tab',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'placement' => 'top',
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_59b676ac28111',
                    'label' => esc_html__( 'Frontent URL', 'mustra_designs' ),
                    'name' => 'frontend_url',
                    'type' => 'url',
                    'instructions' => esc_html__( 'Link where frontend is located', 'mustra_designs' ),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => $this->theme_options_general_slug,
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        )
      );
    }
  }

  /**
   * Get Theme options data to array from DB
   * You should never use thos function to get data but you should use transient version
   *
   * @return array Array containing theme options.
   *
   * @since 1.0.0
   */
  private function get_theme_options_data() {
    return array(
        'footer_copyright_content'            => get_field( 'footer_copyright_content', 'options' ),
        'cookies_notification_description'    => get_field( 'cookies_notification_description', 'options' ),
        'social'                              => get_field( 'social', 'options' ),
        'frontend_url'                        => get_field( 'frontend_url', 'options' ),
    );
  }

  /**
   * Get Theme options
   *
   * This is a helper function that will get all the options from the ACF and
   * store them in a transient, so that only one call to the DB will be made when
   * fetching theme options.
   *
   * @return array Array containing theme options from transient.
   *
   * @since 1.0.0
   */
  private function get_theme_options() {
    $cache_name = $this->theme_options_api_slug;
    $cache      = get_transient( $cache_name );

    if ( $cache === false ) {
      $cache = $this->get_theme_options_data();

      set_transient( $cache_name, $cache, 0 );
    }

    return $cache;
  }

  /**
   * Set Theme options cache on admin init to json format.
   *
   * @since 1.0.0
   */
  public function set_theme_options() {
    $cache_name = $this->theme_options_api_slug;
    $cache      = get_transient( $cache_name );

    if ( $cache === false ) {
      $cache = wp_json_encode( $this->get_theme_options_data() );

      set_transient( $cache_name, $cache, 0 );
    }
  }

  /**
   * Get single key from options array
   *
   * @param string $key Theme option name.
   * @return mixed      Function that will return the array of the key.
   *
   * @since 1.0.0
   */
  public function get_theme_option( $key ) {
    $this->general_helper = new General_Helpers\General_Helper();

    return $this->general_helper->get_array_value( $key, $this->get_theme_options() );
  }

  /**
   * Get single key from options array but json decoded.
   *
   * @param string $key Theme option name.
   * @return mixed      Function that will return the array of the key.
   *
   * @since 1.0.0
   */
  public function get_theme_option_plain( $key ) {
    $this->general_helper = new General_Helpers\General_Helper();

    return $this->general_helper->get_array_value( $key, json_decode( $this->get_theme_options(), true ) );
  }

  /**
   * Set default allowed pages
   *
   * @return array
   *
   * @since 1.0.0
   */
  public function get_allowed_post_types() {
    return array(
        'toplevel_page_' . $this->theme_options_general_slug, // This is top level item.
    );
  }

  /**
   * Check if page is allowed to be save in transient.
   *
   * @param string $page Get current page.
   * @return boolean
   *
   * @since 1.0.0
   */
  public function is_post_allowed_to_save( $page = null ) {
    if ( ! $page ) {
      return false;
    }

    $allowed_types = $this->get_allowed_post_types();

    return in_array( $page, $allowed_types, true );
  }

  /**
   * Check if is theme options page
   *
   * @return boolian True/False if is theme options page.
   *
   * @since 1.0.0
   */
  public function is_theme_options_page() {
    $screen = get_current_screen();

    if ( $this->is_post_allowed_to_save( $screen->id ) ) {
      return true;
    }

    return false;
  }

  /**
   * Delete transient for theme options
   *
   * @since 1.0.0
   */
  public function remove_transient() {
    if ( $this->is_theme_options_page() ) {
      $cache_name = $this->theme_options_api_slug;
      delete_transient( $cache_name );
    }
  }

}
