<?php
/**
 * Class that adds links list field for ACF builder.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf\Fields;

/**
 * Class Utility_Field
 */
class Utility_Field {

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
            'key' => 'group_59ba31ed33dbc',
            'title' => '_Field - Utility',
            'fields' => array(
                array(
                    'key' => 'field_59ba32067574e',
                    'label' => 'Class',
                    'name' => 'class',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
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
                    'key' => 'field_59ba32107574f',
                    'label' => 'ID',
                    'name' => 'id',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
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
                    'key' => 'field_59ba321775750',
                    'label' => 'Spacing Top',
                    'name' => 'spacing_top',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'default' => '40px spacing',
                        'small' => '20px spacing',
                        'medium' => '80px spacing',
                        'no-spacing' => '0px spacing',
                    ),
                    'default_value' => array(
                        0 => 'default',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_59ba326c75751',
                    'label' => 'Spacing Bottom',
                    'name' => 'spacing_bottom',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'default' => '40px spacing',
                        'small' => '20px spacing',
                        'medium' => '80px spacing',
                        'no-spacing' => '0px spacing',
                    ),
                    'default_value' => array(
                        0 => 'default',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_59bfd4c8d6ee6',
                    'label' => 'Container size',
                    'name' => 'container_size',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'default' => 'Default (1200px)',
                        'smaller' => 'Smaller (770px)',
                        'full' => 'Full Width',
                        'full-no-space' => 'Full Width No Spacing',
                    ),
                    'default_value' => array(
                        0 => 'default',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
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
