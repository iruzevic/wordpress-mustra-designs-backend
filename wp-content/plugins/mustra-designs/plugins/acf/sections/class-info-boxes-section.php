<?php
/**
 * Class that adds Info_Boxes_Section for ACF builder.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf\Sections;

/**
 * Class Info_Boxes_Section
 */
class Info_Boxes_Section {

  /**
   * Initialize class
   *
   * @since 2.0.0
   */
  public function __construct() {
    $this->init_section();
  }

  /**
   * Sets up the field to use with clone
   *
   * @since 2.0.0
   */
  public function init_section() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
      acf_add_local_field_group(
        array(
            'key' => 'group_59ba69934af85',
            'title' => '_Section - Info Boxes',
            'fields' => array(
                array(
                    'key' => 'field_59ba699355caa',
                    'label' => 'Intro',
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
                    'key' => 'field_59b9434686e24',
                    'label' => '',
                    'name' => 'section_intro',
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
                        0 => 'group_59b9423b57724',
                    ),
                    'display' => 'group',
                    'layout' => 'block',
                    'prefix_label' => 0,
                    'prefix_name' => 1,
                ),
                array(
                    'key' => 'field_59ba699355cd7',
                    'label' => 'Content',
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
                    'key' => 'field_59ba699355d01',
                    'label' => 'Items In one row',
                    'name' => 'items_in_one_row',
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
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                    ),
                    'default_value' => array(
                        0 => 4,
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_59ba699355ced',
                    'label' => 'Info Boxes',
                    'name' => 'info_boxes',
                    'type' => 'repeater',
                    'instructions' => '',
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
                    'layout' => 'block',
                    'button_label' => 'Add New Box',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_59ba6a159eb12',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'instructions' => 'Input box title',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '33.33',
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
                            'key' => 'field_59ba7c1520461',
                            'label' => 'Type',
                            'name' => 'type',
                            'type' => 'select',
                            'instructions' => 'Select if using image or numbers or none',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '33.33',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                'image' => 'Image',
                                'number' => 'Number',
                                'none' => 'None',
                            ),
                            'default_value' => array(
                                0 => 'image',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'ajax' => 0,
                            'return_format' => 'value',
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_59ba7dd0f3dea',
                            'label' => 'Number Value',
                            'name' => 'number_value',
                            'type' => 'text',
                            'instructions' => 'Enter number to show',
                            'required' => 0,
                            'conditional_logic' => array(
                                array(
                                    array(
                                        'field' => 'field_59ba7c1520461',
                                        'operator' => '==',
                                        'value' => 'number',
                                    ),
                                ),
                            ),
                            'wrapper' => array(
                                'width' => '33.33',
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
                            'key' => 'field_59ba69fa9eb10',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => array(
                                array(
                                    array(
                                        'field' => 'field_59ba7c1520461',
                                        'operator' => '==',
                                        'value' => 'image',
                                    ),
                                ),
                            ),
                            'wrapper' => array(
                                'width' => '33.33',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_59ba6a099eb11',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'very_simple',
                            'media_upload' => 1,
                            'delay' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_59c3b25b99c58',
                    'label' => esc_html__( 'After Content', 'mustra_designs' ),
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
                    'key' => 'field_59ba6a099eb12',
                    'label' => 'After Content',
                    'name' => 'after_content',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'very_simple',
                    'media_upload' => 1,
                    'delay' => 1,
                ),
                array(
                    'key' => 'field_59ba699355d15',
                    'label' => 'Utility',
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
                    'key' => 'field_59ba699355d29',
                    'label' => '',
                    'name' => 'section_utilities',
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
                        0 => 'group_59ba31ed33dbc',
                    ),
                    'display' => 'group',
                    'layout' => 'block',
                    'prefix_label' => 0,
                    'prefix_name' => 1,
                ),
            ),
            'location' => '',
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
