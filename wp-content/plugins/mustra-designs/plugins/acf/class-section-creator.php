<?php
/**
 * ACF template
 * Class that adds section creator capability.
 *
 * @since   2.0.0
 * @package mustra_designs
 */

namespace Mustra_Designs\Plugins\Acf;

use Mustra_Designs\Admin as Admin;
use Mustra_Designs\Plugins\Acf\{Sections as Sections, Fields as Fields, Options as Options};


/**
 * Class Section creator
 */
class Section_Creator {

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
   * Initialize class
   *
   * @param array $plugin_info Load global theme info.
   *
   * @since 1.0.0
   */
  public function __construct( $plugin_info = null ) {
    $this->plugin_name     = $plugin_info['plugin_name'];
    $this->plugin_version  = $plugin_info['plugin_version'];
  }

  /**
   * Register all field and sections assigned to section creator
   *
   * @since 2.0.0
   */
  public function register_section_creator() {
    $this->init_section_creator();
    $this->init_sections();
    $this->init_fields();
    $this->init_options();
  }

  /**
   * Sets up the section creator with ACF
   *
   * @since 2.0.0
   */
  public function init_section_creator() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
      $projects = new Admin\Projects();
      $section_creator_template = new Section_Creator_Template();

      acf_add_local_field_group(
        array(
            'key'    => 'group_59b938eda401a',
            'title'  => 'Section Creator',
            'fields' => array(
                array(
                    'key'               => 'field_59b944457caec',
                    'label'             => 'Sections',
                    'name'              => 'sections',
                    'type'              => 'flexible_content',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'layouts' => array(
                        '59b94450aff6e' => $this->section_content(),
                        '59c3b7b7962fd' => $this->section_image_text(),
                        '59c3b7b7962f1' => $this->section_hero(),
                        '59c3b7b7962f2' => $this->section_info_boxes(),
                        '59c3b7b7962f3' => $this->section_gallery(),
                        '59c3b7b7962f4' => $this->section_timeline(),
                        '59c3b7b7962f5' => $this->section_service_boxes(),
                    ),
                    'button_label' => 'Add new section',
                    'min' => '',
                    'max' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => $projects->post_type_slug,
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => $section_creator_template->template_name,
                    ),
                ),
            ),
            'menu_order'            => 1,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => array(
                0 => 'the_content',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'send-trackbacks',
            ),
            'active'      => 1,
            'description' => '',
        )
      );
    }
  }

  /**
   * Initialize sections
   *
   * @since 2.0.0
   */
  public function init_sections() {
    $content       = new Sections\Content_Section();
    $image_text    = new Sections\Image_Text_Section();
    $hero          = new Sections\Hero_Section();
    $info_boxes    = new Sections\Info_Boxes_Section();
    $gallery       = new Sections\Gallery_Section();
    $timeline      = new Sections\Timeline_Section();
    $service_boxes = new Sections\Service_Boxes_Section();
  }

  /**
   * Initialize sections
   *
   * @since 2.0.0
   */
  public function init_fields() {
    $links_list    = new Fields\Links_List_Field();
    $section_intro = new Fields\Section_Intro_Field();
    $utilities     = new Fields\Utility_Field();
    $title         = new Fields\Title_Field();
    $button        = new Fields\Button_Field();
  }

  /**
   * Initialize options
   *
   * @since 2.0.0
   */
  public function init_options() {

  }

  /**
   * Section Simple Content
   *
   * @since 2.0.0
   *
   * @return array
   */
  public function section_content() {
    return array(
        'key'        => '59b94450aff6e',
        'name'       => 'content_section',
        'label'      => 'Content Section',
        'display'    => 'block',
        'sub_fields' => array(
            array(
                'key'               => 'field_59b944837caed',
                'label'             => 'Section',
                'name'              => 'section',
                'type'              => 'clone',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'clone' => array(
                    0 => 'group_59b9433d722cf',
                ),
                'display'      => 'seamless',
                'layout'       => 'block',
                'prefix_label' => 0,
                'prefix_name'  => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );
  }

  /**
   * Section Image Text
   *
   * @since 2.0.0
   *
   * @return array
   */
  public function section_image_text() {
    return array(
        'key' => '59c3b7b7962fd',
        'name' => 'image_text_section',
        'label' => 'Image Text Section',
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'field_59c3b7b7962fe',
                'label' => 'Section',
                'name' => 'section',
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
                    0 => 'group_59c3b25b8fcf1',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );
  }

  /**
   * Section hero
   *
   * @since 2.0.0
   *
   * @return array
   */
  public function section_hero() {
    return array(
        'key' => '59c3b7b7962f1',
        'name' => 'hero_section',
        'label' => 'Hero Section',
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'field_59c3b7b7962f1',
                'label' => 'Section',
                'name' => 'section',
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
                    0 => 'group_59c3b25b8fcf3',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );
  }

  /**
   * Section Info Boxes
   *
   * @since 2.0.0
   *
   * @return array
   */
  public function section_info_boxes() {
    return array(
        'key' => '59c3b7b7962f2',
        'name' => 'info_boxes_section',
        'label' => 'Info Boxes Section',
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'field_59c3b7b7962f2',
                'label' => 'Section',
                'name' => 'section',
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
                    0 => 'group_59ba69934af85',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );
  }

  /**
   * Section Gallery
   *
   * @since 2.0.0
   *
   * @return array
   */
  public function section_gallery() {
    return array(
        'key' => '59c3b7b7962f3',
        'name' => 'gallery_section',
        'label' => 'Gallery Section',
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'field_59c3b7b7962f3',
                'label' => 'Section',
                'name' => 'section',
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
                    0 => 'group_59ba69934af86',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );
  }

  /**
   * Section Timeline
   *
   * @since 2.0.0
   *
   * @return array
   */
  public function section_timeline() {
    return array(
        'key' => '59c3b7b7962f4',
        'name' => 'timeline_section',
        'label' => 'Timeline Section',
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'field_59c3b7b7962f4',
                'label' => 'Section',
                'name' => 'section',
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
                    0 => 'group_59ba69934af87',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );
  }

  /**
   * Section Service Boxes
   *
   * @since 2.0.0
   *
   * @return array
   */
  public function section_service_boxes() {
    return array(
        'key' => '59c3b7b7962f5',
        'name' => 'service_boxes_section',
        'label' => 'Service Boxes Section',
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'field_59c3b7b7962f5',
                'label' => 'Section',
                'name' => 'section',
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
                    0 => 'group_59d60df4d8e45',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );
  }
}
