<?php 
/**
 * Theme Name: Mustra-designs
 * Description: Mustra-Designs redirect the frontend to api.
 * Author:  Ivan Ruzevic <ruzevic.ivan@gmail.com>
 * Author URI:  https://github.com/iruzevic
 * Version: 1.0
 * Text Domain: eightshift
 *
 * @package mustra_designs
 */

add_action( 'template_redirect', 'md_redirect' );

if ( ! function_exists( 'md_redirect' ) ) {
  /**
   * Check if you are on any other page then admin and redirect accordingly.
   *
   * @return void
   */
  function md_redirect() {
    if ( ! is_user_logged_in() ) {
      auth_redirect();
    } else if( ! is_admin() ) {
      wp_redirect( site_url('wp-admin') );
    }
    exit;
  }
}
