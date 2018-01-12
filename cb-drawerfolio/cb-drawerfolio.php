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
          'photo'       => array( // Section
              'title'         => __('Photo Caption Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'photo_height' => array(
                    'type'          => 'text',
                    'label'         => __( 'Default Height', 'fl-builder' ),
                    'default'       => '400',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( 'px', 'fl-builder' )
                ),
              )
          ),
          'caption'       => array( // Section
              'title'         => __('Photo Caption Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'caption_text_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Caption Text Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'caption_bg_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Caption Background Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'caption_bg_hover_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Caption Background Hover Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
              )
          ),
          'drawer'       => array( // Section
              'title'         => __('Drawer Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'drawer_text_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Drawer Text Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'drawer_bg_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Drawer Background Color', 'cb-custom-modules'),
                  'show_reset'    => true
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
    'title' => __('Portfolio Item', 'fl-builder'),
    'tabs'  => array(
        'general'      => array( // Tab
            'title'         => __('General', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'gallery'       => array( // Section
                    'title'         => 'Outside Drawer', // Section Title
                    'fields'        => array( // Section Fields
                        'inner_photo' => array(
                            'type'          => 'photo',
                            'label'         => __('Photo', 'fl-builder'),
                            'show_remove'	  => false
                        ),
                        'title_text'       => array(
                            'type'          => 'text',
                            'label'         => __('Photo Caption Title', 'fl-builder'),
                            'default'       => 'Some example text'
                        ),
                        'subtitle_text'       => array(
                            'type'          => 'text',
                            'label'         => __('Photo Caption Subtitle', 'fl-builder'),
                            'default'       => 'Some example text'
                        ),
                    )
                ),
                'drawer'       => array( // Section
                    'title'         => 'Inside Drawer', // Section Title
                    'fields'        => array( // Section Fields
                        'drawer_title'       => array(
                            'type'          => 'text',
                            'label'         => __('Drawer Title', 'fl-builder'),
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
