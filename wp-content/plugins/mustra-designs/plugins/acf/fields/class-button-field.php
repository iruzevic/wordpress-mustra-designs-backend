<?php
/**
 * Class that adds button field for ACF builder.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf\Fields;

/**
 * Class Button_Field
 */
class Button_Field {

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
            'key' => 'group_58ee240dc1934',
            'title' => '_Field - Button',
            'fields' => array(
                array(
                    'key' => 'field_59ba4afbc0501',
                    'label' => 'View Type',
                    'name' => 'view_type',
                    'type' => 'select',
                    'instructions' => 'Select type the link will be displayed.',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '!=',
                                'value' => 'none',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'link' => 'Link',
                        'btn' => 'Button',
                    ),
                    'default_value' => array(
                        0 => 'btn',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_59ba4b63c0502',
                    'label' => 'Color',
                    'name' => 'color',
                    'type' => 'select',
                    'instructions' => 'Select color, depending on view type.',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_59ba4afbc0501',
                                'operator' => '==',
                                'value' => 'btn',
                            ),
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '!=',
                                'value' => 'none',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'default' => 'Default',
                        'default-bordered' => 'Default Inverted',
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
                    'key' => 'field_59ba4be5c0503',
                    'label' => 'Color',
                    'name' => 'color',
                    'type' => 'select',
                    'instructions' => 'Select color, depending on view type.',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_59ba4afbc0501',
                                'operator' => '==',
                                'value' => 'link',
                            ),
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '!=',
                                'value' => 'none',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'default' => 'Red',
                        'white' => 'White',
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
                    'key' => 'field_58ee24306cb02',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '!=',
                                'value' => 'none',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '65',
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
                    'key' => 'field_59e719b4bd1a5',
                    'label' => 'New Tab',
                    'name' => 'new_tab',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '!=',
                                'value' => 'none',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '35',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
                array(
                    'key' => 'field_58ee24176cb01',
                    'label' => 'Type',
                    'name' => 'type',
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
                        'none' => 'none',
                        'internal' => 'internal',
                        'external' => 'external',
                        'post-category' => 'post-category',
                    ),
                    'default_value' => array(
                        0 => 'none',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_58ee24b26cb04',
                    'label' => 'Url',
                    'name' => 'url',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '==',
                                'value' => 'external',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_58ee24c06cb05',
                    'label' => 'Url',
                    'name' => 'url',
                    'type' => 'page_link',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '==',
                                'value' => 'internal',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array(
                        0 => 'post',
                        1 => 'page',
                        2 => 'projects-type',
                    ),
                    'taxonomy' => array(),
                    'allow_null' => 0,
                    'allow_archives' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_59e5cbf3d3730',
                    'label' => 'Url',
                    'name' => 'url',
                    'type' => 'taxonomy',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_58ee24176cb01',
                                'operator' => '==',
                                'value' => 'post-category',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'taxonomy' => 'category',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'return_format' => 'id',
                    'multiple' => 0,
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
