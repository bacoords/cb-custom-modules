<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomNestedGalleryModule
 */
class CBCustomNestedGalleryModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
          'name'          => __('Nested Gallery', 'cb-custom-modules'),
          'description'   => __('A gallery inside your gallery!', 'cb-custom-modules'),
          'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
          'category'		=> __('Galleries', 'cb-custom-modules'),
          'icon'        => 'slides.svg',
          'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-nested-gallery/',
          'url'           => CB_CUSTOM_MODULE_URL . 'cb-nested-gallery/',
          'editor_export' => true, // Defaults to true and can be omitted.
          'enabled'       => true, // Defaults to true and can be omitted.
          'partial_refresh' => true,
        ));

    		$this->add_css( 'jquery-bxslider' );
    		$this->add_js( 'jquery-bxslider' );
        $this->add_js( 'jquery-magnificpopup' );
        $this->add_css( 'jquery-magnificpopup' );
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomNestedGalleryModule', array(
    'general'       => array( // Tab
        'title'         => __('Galleries', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_nested_gallery_form_repeater' => array(
                        'type'          => 'form',
                        'label'         => __('Gallery', 'cb-custom-modules'),
                        'form'          => 'cb_nested_gallery_form', // ID of a registered form.
                        'preview_text'  => 'cb_nested_gallery_label', // ID of a field to use for the preview text.
                        'multiple' 			=> true,
                      )
                )
            ),
        ),
    ),
    'design'      => array(
        'title'         => __('Design', 'cb-custom-modules'),
        'sections'      => array(
            'fonts'       => array(
                'title'         => 'Fonts',
                'fields'        => array(
                    'cb_nested_gallery_font_heading' => array(
                      'type'          => 'font',
                      'label'         => __( 'Heading Font', 'cb-custom-modules' ),
                    ),
                    'cb_nested_gallery_font_content' => array(
                      'type'          => 'font',
                      'label'         => __( 'Body Font', 'cb-custom-modules' ),
                    ),
                    'cb_nested_gallery_font_link' => array(
                      'type'          => 'font',
                      'label'         => __( 'Link Font', 'cb-custom-modules' ),
                    ),
                  )
              ),
            'colors'       => array(
                'title'         => 'Fonts',
                'fields'        => array(
                  'cb_nested_gallery_slider_bg' => array(
                      'type'          => 'color',
                      'label'         => __( 'Slider Background Color', 'fl-builder' ),
                      'show_reset'    => true,
                      'show_alpha'    => true
                    ),
                  'cb_nested_gallery_color_heading' => array(
                      'type'          => 'color',
                      'label'         => __( 'Heading Text Color', 'fl-builder' ),
                      'show_reset'    => true,
                      'show_alpha'    => true
                    ),
                  'cb_nested_gallery_color_content' => array(
                      'type'          => 'color',
                      'label'         => __( 'Body Text Color', 'fl-builder' ),
                      'show_reset'    => true,
                      'show_alpha'    => true
                    ),
                  'cb_nested_gallery_color_link' => array(
                      'type'          => 'color',
                      'label'         => __( 'Link Text Color', 'fl-builder' ),
                      'show_reset'    => true,
                      'show_alpha'    => true
                    ),
                  )
              ),
        )
    ),
));



/**
 * Register form
 */
FLBuilder::register_settings_form('cb_nested_gallery_form', array(
    'title' => __('New Gallery', 'cb-custom-modules'),
    'tabs'  => array(
        'file'      => array(
            'title'         => __('Gallery', 'cb-custom-modules'),
            'sections'      => array(
                'label'       => array(
                    'title'         => 'Information',
                    'fields'        => array(
                        'cb_nested_gallery_label' => array(
                          'type'          => 'text',
                          'label'         => __( 'Gallery Title', 'cb-custom-modules' ),
                          'default'       => 'Gallery Title',
                          'maxlength'     => '140',
                          'size'          => '40',
                          'placeholder'   => __( 'Gallery Title', 'cb-custom-modules' ),
                          'class'         => '',
                          'description'   => __( '', 'cb-custom-modules' ),
					                'connections'   => array( 'string' )
                        ),
                        'cb_nested_gallery_photo' => array(
                            'type'          => 'photo',
                            'label'         => __('Main Gallery Photo', 'cb-custom-modules'),
                            'show_remove'   => false,
                        ),
                        'cb_nested_gallery_gallery' => array(
                            'type'          => 'multiple-photos',
                            'label'         => __( 'All Gallery Photos', 'cb-custom-modules' )
                        ),
                        'cb_nested_gallery_link' => array(
                            'type'          => 'link',
                            'label'         => __('Link', 'cb-custom-modules')
                        ),
                        'cb_nested_gallery_link_text' => array(
                          'type'          => 'text',
                          'label'         => __( 'Link Text', 'cb-custom-modules' ),
                          'default'       => 'Link Text',
                          'maxlength'     => '140',
                          'size'          => '40',
                          'placeholder'   => __( 'Link Text', 'cb-custom-modules' ),
                          'class'         => '',
                          'description'   => __( '', 'cb-custom-modules' ),
					                'connections'   => array( 'string' )
                        ),
                        'cb_nested_gallery_content' => array(
                            'type'          => 'editor',
                            'media_buttons' => false,
                            'wpautop'       => true
                        ),
                      )
                  ),

            )
        ),

    )
));
