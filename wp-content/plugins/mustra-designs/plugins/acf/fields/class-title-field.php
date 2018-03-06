<?php
/**
 * Class that adds title field for ACF builder.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf\Fields;

/**
 * Class Title_Field
 */
class Title_Field {

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
            'key' => 'group_58cba4cd36b46',
            'title' => '_Field - Title',
            'fields' => array(
                array(
                    'key' => 'field_58cba4f91eb45',
                    'label' => 'Label',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
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
                    'key' => 'field_58cba4fd1eb46',
                    'label' => 'Size',
                    'name' => 'title_size',
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
                        'giant' => '72px',
                        'huge' => '42px',
                    ),
                    'default_value' => array(
                        0 => 'huge',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_58cba50d1eb47',
                    'label' => 'SEO Tag',
                    'name' => 'title_seo_tag',
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
                        'h1' => 'h1',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'default_value' => array(
                        0 => 'h2',
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
