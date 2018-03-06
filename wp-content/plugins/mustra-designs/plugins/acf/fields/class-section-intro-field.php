<?php
/**
 * Class that adds section infro field for ACF builder.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf\Fields;

/**
 * Class Section_Intro_Field
 */
class Section_Intro_Field {

  /**
   * Initialize class
   *
   * @since 2.0.0
   */
  public function __construct() {
    $this->init_field();
  }

  /**
   * Sets up the field to use with clone
   *
   * @since 2.0.0
   */
  public function init_field() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
      acf_add_local_field_group(
        array(
            'key' => 'group_59b9423b57724',
            'title' => '_Part - Section Intro',
            'fields' => array(
                array(
                    'key' => 'field_59b942dc60d77',
                    'label' => 'Main Title',
                    'name' => 'maintitle',
                    'type' => 'clone',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'clone' => array(
                        0 => 'group_58cba4cd36b46',
                    ),
                    'display' => 'group',
                    'layout' => 'block',
                    'prefix_label' => 0,
                    'prefix_name' => 1,
                ),
                array(
                    'key' => 'field_59cd0ef3a94d6',
                    'label' => 'Subtitle',
                    'name' => 'subtitle',
                    'type' => 'clone',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'clone' => array(
                        0 => 'field_58cba4f91eb45',
                    ),
                    'display' => 'group',
                    'layout' => 'block',
                    'prefix_label' => 0,
                    'prefix_name' => 1,
                ),
            ),
            'location' => 0,
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 0,
            'description' => '',
        )
      );
    }
  }
}
