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
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Galleries', 'cb-custom-modules'),
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


    public function converttorgba($color, $opacity = 100){

      if( $color == NULL ){
        return 'none';
      }

      if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
      }
      //Check if color has 6 or 3 characters and get values
      if (strlen($color) == 6) {
              $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
      } elseif ( strlen( $color ) == 3 ) {
              $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
      } else {
              return $default;
      }
      //Convert hexadec to rgb
      $rgb =  array_map('hexdec', $hex);
      $new_opac = ($opacity / 100);

      return 'rgba('.implode(",",$rgb).','. $new_opac .')';
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
                'photo_spacing' => array(
                    'type'          => 'text',
                    'label'         => __( 'Spacing', 'cb-custom-modules' ),
                    'default'       => '0',
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
    'filters'       => array( // Tab
      'title'         => __('Tags', 'cb-custom-modules'), // Tab title
      'sections'      => array( // Tab Sections
          'general'       => array( // Section
              'title'         => __('', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'show_filters' => array(
                    'type'          => 'select',
                    'label'         => __( 'Show Tag Filters', 'cb-custom-modules' ),
                    'default'       => 'top',
                    'options'       => array(
                        'top'      => __( 'Top', 'cb-custom-modules' ),
                        'bottom'      => __( 'Bottom', 'cb-custom-modules' ),
                        'none'      => __( 'Nowhere', 'cb-custom-modules' )
                    ),
                ),
                'filter_repeater' => array(
                    'type'          => 'form',
                    'label'         => __('Tag Group', 'cb-custom-modules'),
                    'form'          => 'cb_drawerfolio_filters_form', // ID of a registered form.
                    'preview_text'  => 'title', // ID of a field to use for the preview text.
                    'multiple' 			=> true,
                ),
              )
          ),
          'filter_heading_colors'       => array( // Section
              'title'         => __('Tag Group Header Styles', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'filter_header_text_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Text Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_header_text_hover_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Text Hover Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_header_bg_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Background Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_header_bg_opacity' => array(
                    'type'          => 'text',
                    'label'         => __( 'Background Opacity', 'cb-custom-modules' ),
                    'default'       => '100',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( '%', 'cb-custom-modules' )
                ),
                'filter_header_bg_hover_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Background Hover Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_header_bg_hover_opacity' => array(
                    'type'          => 'text',
                    'label'         => __( 'Background Hover Opacity', 'cb-custom-modules' ),
                    'default'       => '100',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( '%', 'cb-custom-modules' )
                ),
              )
          ),
          'filter_colors'       => array( // Section
              'title'         => __('Tag Styles', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'filter_text_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Text Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_text_hover_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Text Hover Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_bg_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Background Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_bg_opacity' => array(
                    'type'          => 'text',
                    'label'         => __( 'Background Opacity', 'cb-custom-modules' ),
                    'default'       => '100',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( '%', 'cb-custom-modules' )
                ),
                'filter_bg_hover_color'         => array(
                  'type'          => 'color',
                  'label'         => __('Background Hover Color', 'cb-custom-modules'),
                  'show_reset'    => true
                ),
                'filter_bg_hover_opacity' => array(
                    'type'          => 'text',
                    'label'         => __( 'Background Hover Opacity', 'cb-custom-modules' ),
                    'default'       => '100',
                    'maxlength'     => '3',
                    'size'          => '3',
                    'description'   => __( '%', 'cb-custom-modules' )
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
                    'label'         => __( 'Title Font', 'cb-custom-modules' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'caption_title_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Title Font Size', 'cb-custom-modules' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'cb-custom-modules' )
                ),
                'caption_subtitle_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Subtitle Font', 'cb-custom-modules' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'caption_subtitle_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Subtitle Font Size', 'cb-custom-modules' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'cb-custom-modules' )
                ),
              )
          ),
          'drawer'       => array( // Section
              'title'         => __('Drawer Area', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'drawer_title_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Title Font', 'cb-custom-modules' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'drawer_title_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Title Font Size', 'cb-custom-modules' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'cb-custom-modules' )
                ),
                'drawer_content_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Content Font', 'cb-custom-modules' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'drawer_content_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Content Font Size', 'cb-custom-modules' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'cb-custom-modules' )
                ),
              )
          ),
          'filters'       => array( // Section
              'title'         => __('Tags', 'cb-custom-modules'), // Section Title
              'fields'        => array( // Section Fields
                'tag_heading_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Tag Group Heading Font', 'cb-custom-modules' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'tag_heading_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Tag Group Heading Font Size', 'cb-custom-modules' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'cb-custom-modules' )
                ),
                'tag_filter_font' => array(
                    'type'          => 'font',
                    'label'         => __( 'Tag Font', 'cb-custom-modules' ),
                    'default'       => array(
                        'family'        => 'Helvetica',
                        'weight'        => 300
                    )
                ),
                'tag_filter_size' => array(
                    'type'          => 'text',
                    'label'         => __( 'Tag Font Size', 'cb-custom-modules' ),
                    'default'       => '',
                    'maxlength'     => '2',
                    'size'          => '3',
                    'description'   => __( 'px', 'cb-custom-modules' )
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
                        'drawer_layout' => array(
                            'type'          => 'select',
                            'label'         => __( 'Drawer Layout', 'fl-builder' ),
                            'default'       => 'one-col',
                            'options'       => array(
                                'one-col'      => __( 'One Column', 'fl-builder' ),
                                'two-col-auto'      => __( 'Two Columns (Auto)', 'fl-builder' ),
                                'two-col'      => __( 'Two Columns (Custom)', 'fl-builder' )
                            ),
                            'toggle'        => array(
                                'two-col'      => array(
                                    'fields'        => array( 'drawer_content_right' )
                                ),
                            )
                        ),
                        'drawer_content'       => array(
                           'type'          => 'editor',
                           'label'         => __('Drawer Content Column', 'cb-custom-modules'),
                           'media_buttons' => true,
                           'rows'          => 10,
                        ),
                        'drawer_content_right'       => array(
                           'type'          => 'editor',
                           'label'         => __('Drawer Content Right Column', 'cb-custom-modules'),
                           'media_buttons' => true,
                           'rows'          => 10,
                           'help'          => 'On larger screens, drawers show two columns. On smaller screens, they flow into one'
                        ),
                    )
                )
            )
        ),
        'filters'       => array( // Tab
          'title'         => __('Tags', 'cb-custom-modules'), // Tab title
          'sections'      => array( // Tab Sections
              'general'       => array( // Section
                  'title'         => __('', 'cb-custom-modules'), // Section Title
                  'fields'        => array( // Section Fields
                    'tags' => array(
                        'type'          => 'text',
                        'label'         => __( 'Tags', 'cb-custom-modules' ),
                        'default'       => '',
                        'help'   => __( 'Re-use the same tag words across portfolio items to take advantage of the filters. Be sure to set up your tag word categories in the main module settings.', 'cb-custom-modules' ),
                        'multiple'      => true
                    ),
                  )
              ),
          )
        ),
    )
));


/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('cb_drawerfolio_filters_form', array(
    'title' => __('Tag Groups', 'cb-custom-modules'),
    'tabs'  => array(
        'filters'       => array( // Tab
          'title'         => __('Settings', 'cb-custom-modules'), // Tab title
          'sections'      => array( // Tab Sections
              'general'       => array( // Section
                  'title'         => __('', 'cb-custom-modules'), // Section Title
                  'fields'        => array( // Section Fields
                    'title' => array(
                        'type'          => 'text',
                        'label'         => __( 'Tag Group Heading', 'cb-custom-modules' ),
                        'default'       => '',
                    ),
                    'tags' => array(
                        'type'          => 'text',
                        'label'         => __( 'Tags', 'cb-custom-modules' ),
                        'default'       => '',
                        'help'   => __( 'Any tag words added here will be added on the front end. Re-use the same tag words across portfolio items to take advantage of the filters.', 'cb-custom-modules' ),
                        'multiple'      => true
                    ),
                  )
              ),
          )
        ),
    )
));
