<?php
/**
 * The Media specific functionality.
 *
 * @since   1.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Admin;

/**
 * Class Media
 */
class Media {

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
   * Enable theme support
   * for full list check: https://developer.wordpress.org/reference/functions/add_theme_support/
   *
   * @since 1.0.0
   */
  public function add_theme_support() {
    add_theme_support( 'post-thumbnails' );
  }

  /**
   * Create new image sizes
   *
   * @since 1.0.0
   */
  public function add_custom_image_sizes() {
    add_image_size( 'full_width', 1440, 9999, true );
    add_image_size( 'listing', 570, 320, true );
  }

  /**
   * Enable SVG uplod in media
   *
   * @param array $mimes Load all mimes types.
   * @return array       Return original and updated.
   *
   * @since 1.0.0
   */
  public function enable_mime_types( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['zip']  = 'application/zip';
    $mimes['yaml'] = 'application/x-yaml';
    return $mimes;
  }

  /**
   * Enable SVG preview in Media Library
   *
   * @param array      $response   Array of prepared attachment data.
   * @param int|object $attachment Attachment ID or object.
   * @param array      $meta       Array of attachment meta data.
   *
   * @since 1.0.0
   */
  public function enable_svg_library_preview( $response, $attachment, $meta ) {
    if ( $response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists( 'SimpleXMLElement' ) ) {
      try {
        $path = get_attached_file( $attachment->ID );

        if ( file_exists( $path ) ) {
            $svg    = new \SimpleXMLElement( file_get_contents( $path ) );
            $src    = $response['url'];
            $width  = (int) $svg['width'];
            $height = (int) $svg['height'];

            // media gallery.
            $response['image'] = compact( 'src', 'width', 'height' );
            $response['thumb'] = compact( 'src', 'width', 'height' );

            // media single.
            $response['sizes']['full'] = array(
                'height'      => $height,
                'width'       => $width,
                'url'         => $src,
                'orientation' => $height > $width ? 'portrait' : 'landscape',
            );
        }
      } catch ( Exception $e ) {
        new \WP_Error( 'error', sprintf( esc_html__( 'Error: %s', 'mustra_designs' ), $e ) );
      }
    }

    return $response;
  }

  /**
   * Wrap utility class arround iframe to enable responsive
   *
   * @param  string $html   Iframe html to wrap around.
   * @return string Wrapped Iframe with a utility class.
   *
   * @since 1.0.0
   */
  public function wrap_responsive_oembed_filter( $html ) {
    $return = '<span class="iframe u__embed-video-responsive">' . $html . '</span>';
    return $return;
  }
}
