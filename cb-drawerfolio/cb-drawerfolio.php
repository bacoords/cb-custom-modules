<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomDrawerfolioModule
 */
class CBCustomDrawerfolioModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Drawerfolio', 'cb-custom-modules'),
            'description'   => __('Portfolio gallery with hidden drawers of text.', 'cb-custom-modules'),
            'category'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'icon'        => 'format-gallery.svg',
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-drawerfolio/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-drawerfolio/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }


    public function responsive_breakpoint()
    {
      $settings = FLBuilderModel::get_global_settings();
      return $settings->responsive_breakpoint;
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomDrawerfolioModule', array(
    'general'       => array( // Tab
      'title'         => __('Assets', 'cb-custom-modules'), // Tab title
      'sections'      => array( // Tab Sections
          'design'       => array( // Section
              'title'         => __('', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                  'drawer_repeater' => array(
                      'type'          => 'form',
                      'label'         => __('Portfolio Item', 'cb-custom-modules'),
                      'form'          => 'cb_drawerfolio_form', // ID of a registered form.
                      'preview_text'  => 'title_text', // ID of a field to use for the preview text.
                      'multiple' 			=> true,
                  ),
              )
          ),
      )
    ),
    'style'       => array( // Tab
      'title'         => __('Style', 'cb-custom-modules'), // Tab title
      'sections'      => array( // Tab Sections
          'general'       => array( // Section
              'title'         => __('', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'columns' => array(
                    'type'          => 'select',
                    'label'         => __( 'Columns on Full Width', 'cb-custom-modules' ),
                    'default'       => '20',
                    'options'       => array(
                        '33.3333333'      => __( '3', 'cb-custom-modules' ),
                        '25'              => __( '4', 'cb-custom-modules' ),
                        '20'              => __( '5', 'cb-custom-modules' ),
                        '16.6666666'      => __( '6', 'cb-custom-modules' ),
                    ),
                ),
                'photo_height' => array(
                    'type'          => 'text',
                    'label'         => __( 'Default Height', 'cb-custom-modules' ),
                    'default'       => '400',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( 'px', 'cb-custom-modules' )
                ),
              )
          ),
          'caption'       => array( // Section
              'title'         => __('Photo Caption Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'caption_text_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Text Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'caption_bg_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Background Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'caption_bg_opacity' => array(
                    'type'          => 'text',
                    'label'         => __( 'Background Opacity', 'cb-custom-modules' ),
                    'default'       => '100',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( '%', 'cb-custom-modules' )
                ),
                'caption_bg_hover_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Background Hover Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'caption_bg_hover_opacity' => array(
                    'type'          => 'text',
                    'label'         => __( 'Background Hover Opacity', 'cb-custom-modules' ),
                    'default'       => '100',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( '%', 'cb-custom-modules' )
                ),
              )
          ),
          'drawer'       => array( // Section
              'title'         => __('Drawer Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'drawer_text_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Text Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'drawer_bg_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Background Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
              )
          ),
      )
    ),
    'type'       => array( // Tab
      'title'         => __('Fonts', 'cb-custom-modules'), // Tab title
      'sections'      => array( // Tab Sections
          'caption'       => array( // Section
              'title'         => __('Photo Caption Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'caption_title_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Title Font', 'fl-builder' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'caption_title_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Title Font Size', 'fl-builder' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'fl-builder' )
                ),
                'caption_subtitle_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Subtitle Font', 'fl-builder' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'caption_subtitle_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Subtitle Font Size', 'fl-builder' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'fl-builder' )
                ),
              )
          ),
          'drawer'       => array( // Section
              'title'         => __('Drawer Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'drawer_title_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Title Font', 'fl-builder' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'drawer_title_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Title Font Size', 'fl-builder' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'fl-builder' )
                ),
                'drawer_content_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Content Font', 'fl-builder' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'drawer_content_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Content Font Size', 'fl-builder' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'fl-builder' )
                ),
              )
          ),
      )
    )
));


/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('cb_drawerfolio_form', array(
    'title' => __('Portfolio Item', 'cb-custom-modules'),
    'tabs'  => array(
        'general'      => array( // Tab
            'title'         => __('General', 'cb-custom-modules'), // Tab title
            'sections'      => array( // Tab Sections
                'gallery'       => array( // Section
                    'title'         => 'Outside Drawer', // Section Title
                    'fields'        => array( // Section Fields
                        'inner_photo' => array(
                            'type'          => 'photo',
                            'label'         => __('Photo', 'cb-custom-modules'),
                            'show_remove'	  => false
                        ),
                        'title_text'       => array(
                            'type'          => 'text',
                            'label'         => __('Photo Caption Title', 'cb-custom-modules'),
                            'default'       => 'Some example text'
                        ),
                        'subtitle_text'       => array(
                            'type'          => 'text',
                            'label'         => __('Photo Caption Subtitle', 'cb-custom-modules'),
                            'default'       => 'Some example text'
                        ),
                    )
                ),
                'drawer'       => array( // Section
                    'title'         => 'Inside Drawer', // Section Title
                    'fields'        => array( // Section Fields
                        'drawer_title'       => array(
                            'type'          => 'text',
                            'label'         => __('Drawer Title', 'cb-custom-modules'),
                            'default'       => 'Some example text'
                        ),
                        'drawer_content'       => array(
                           'type'          => 'editor',
                           'media_buttons' => true,
                           'rows'          => 10
                        ),
                    )
                )
            )
        )
    )
));
