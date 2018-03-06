<?php
/**
 * Class that adds links list field for ACF builder.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf\Fields;

/**
 * Class Links_List_Field
 */
class Links_List_Field {

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
            'key' => 'group_59ba40e028c5f',
            'title' => '_Part - Links List',
            'fields' => array(
                array(
                    'key' => 'field_59ba40e032b29',
                    'label' => 'Items',
                    'name' => 'items',
                    'type' => 'repeater',
                    'instructions' => 'Select type of link and add multiple.',
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
                    'button_label' => 'Add New Link / Button',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_59ba415e920bc',
                            'label' => 'Item',
                            'name' => 'item',
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
                                0 => 'group_58ee240dc1934',
                            ),
                            'display' => 'group',
                            'layout' => 'block',
                            'prefix_label' => 0,
                            'prefix_name' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_59ba4a6792175',
                    'label' => 'View',
                    'name' => 'view',
                    'type' => 'select',
                    'instructions' => 'Select type of view you want items to show.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'inline' => 'Inline',
                        'block' => 'Block',
                    ),
                    'default_value' => array(
                        0 => 'inline',
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
