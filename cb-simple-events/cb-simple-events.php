<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomLinkListModule
 */
class CBCustomSimpleEventsModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Simple Events', 'fl-builder'),
            'description'   => __('Simple events listing widget.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-simple-events/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-simple-events/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomSimpleEventsModule', array(
    'general'       => array( // Tab
        'title'         => __('Events', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'cb_simple_events_form_field_repeater' => array(
							'type'          => 'form',
							'label'         => __('Event', 'fl-builder'),
							'form'          => 'cb_simple_events_form_field', // ID of a registered form.
							'preview_text'  => 'cb_simple_event_label', // ID of a field to use for the preview text.
							'multiple' 			=> true,
					),
        )
      )
      )
    ),
    'styles'       => array( // Tab
        'title'         => __('Styles', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
              'general'       => array(
                  'title'         => 'Event',
                  'fields'        => array(
        						'cb_simple_events_bg_color'         => array(
        							'type'          => 'color',
        							'label'         => __('Default Event Background Color', 'fl-builder'),
        							'show_reset'    => true
        						),
        						'cb_simple_events_bg_hover_color' => array(
        							'type'          => 'color',
        							'label'         => __('Default Event Hover Background Color', 'fl-builder'),
        							'show_reset'    => true,
        							'preview'       => array(
        								'type'          => 'none'
        							)
        						),
        						'cb_simple_events_spacing' => array(
        							'type'          => 'text',
        							'label'         => __('Default Event Spacing', 'fl-builder'),
                      'default'       => '',
                      'maxlength'     => '3',
                      'size'          => '4',
                      'placeholder'   => __( '10', 'fl-builder' ),
                      // 'class'         => 'my-css-class',
                      'description'   => __( 'px', 'fl-builder' ),
                      'help'          => __( 'Spacing between this event and the next one.', 'fl-builder' )
        						),
        						'cb_simple_events_padding' => array(
        							'type'          => 'text',
        							'label'         => __('Default Event Padding', 'fl-builder'),
                      'default'       => '',
                      'maxlength'     => '3',
                      'size'          => '4',
                      'placeholder'   => __( '5', 'fl-builder' ),
                      // 'class'         => 'my-css-class',
                      'description'   => __( 'px', 'fl-builder' ),
                      'help'          => __( 'Spacing around the event.', 'fl-builder' )
        						),
      						),
    						),
                'border'       => array(
                  'title'         => __( 'Border', 'fl-builder' ),
                  'fields'        => array(
                    'border_type'   => array(
                      'type'          => 'select',
                      'label'         => __( 'Type', 'fl-builder' ),
                      'default'       => '',
                      'help'          => __( 'The type of border to use. Double borders must have a width of at least 3px to render properly.', 'fl-builder' ),
                      'options'       => array(
                        ''       => _x( 'None', 'Border type.', 'fl-builder' ),
                        'solid'  => _x( 'Solid', 'Border type.', 'fl-builder' ),
                        'dashed' => _x( 'Dashed', 'Border type.', 'fl-builder' ),
                        'dotted' => _x( 'Dotted', 'Border type.', 'fl-builder' ),
                        'double' => _x( 'Double', 'Border type.', 'fl-builder' ),
                      ),
                      'toggle'        => array(
                        ''              => array(
                          'fields'        => array(),
                        ),
                        'solid'         => array(
                          'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                        ),
                        'dashed'        => array(
                          'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                        ),
                        'dotted'        => array(
                          'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                        ),
                        'double'        => array(
                          'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                        ),
                      ),
                      'preview'         => array(
                        'type'            => 'none',
                      ),
                    ),
                    'border_color'  => array(
                      'type'          => 'color',
                      'label'         => __( 'Color', 'fl-builder' ),
                      'show_reset'    => true,
                      'preview'         => array(
                        'type'            => 'none',
                      ),
                    ),
                    'border_opacity' => array(
                      'type'          => 'text',
                      'label'         => __( 'Opacity', 'fl-builder' ),
                      'default'       => '100',
                      'description'   => '%',
                      'maxlength'     => '3',
                      'size'          => '5',
                      'preview'         => array(
                        'type'            => 'none',
                      ),
                    ),
                    'border' 	 => array(
                      'type'        => 'dimension',
                      'label'       => __( 'Width', 'fl-builder' ),
                      'description' => 'px',
                      'preview'     => array(
                        'type' => 'none',
                      ),
                      'responsive'  => array(
                        'placeholder' => array(
                          'default'    => '0',
                          'medium'     => '',
                          'responsive' => '',
                        ),
                      ),
                    ),
                  ),
                ),
              'label'       => array(
                  'title'         => 'Title',
                  'fields'        => array(
        						'cb_simple_events_title_color'         => array(
        							'type'          => 'color',
        							'label'         => __('Default Title Color', 'fl-builder'),
        							'show_reset'    => true
        						),
                    'cb_simple_events_title_size' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Title Font Size', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        // 'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
                    'cb_simple_events_title_size_r' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Title Font Size (Mobile)', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        // 'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
      						),
    						),
              'desc'       => array(
                  'title'         => 'Description',
                  'fields'        => array(
        						'cb_simple_events_desc_color'      => array(
        							'type'          => 'color',
        							'label'         => __('Default Description Color', 'fl-builder'),
        							'show_reset'    => true
        						),
                    'cb_simple_events_desc_size' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Description Font Size', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
                    'cb_simple_events_desc_size_r' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Description Font Size (Mobile)', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
      						),
    						),
              'date'       => array(
                  'title'         => 'Date',
                  'fields'        => array(
        						'cb_simple_events_date_color' => array(
        							'type'          => 'color',
        							'label'         => __('Default Date Color', 'fl-builder'),
        							'show_reset'    => true,
        						),
                    'cb_simple_events_date_size' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Date Font Size', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
                    'cb_simple_events_date_size_r' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Date Font Size (Mobile)', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
      						),
    						),
              'Time'       => array(
                  'title'         => 'Time',
                  'fields'        => array(
        						'cb_simple_events_time_color' => array(
        							'type'          => 'color',
        							'label'         => __('Default Time Color', 'fl-builder'),
        							'show_reset'    => true,
        						),
                    'cb_simple_events_time_size' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Time Font Size', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
                    'cb_simple_events_time_size_r' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Time Font Size (Mobile)', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
      						),
    						),
              'location'       => array(
                  'title'         => 'Location',
                  'fields'        => array(
        						'cb_simple_events_location_color' => array(
        							'type'          => 'color',
        							'label'         => __('Default Location Color', 'fl-builder'),
        							'show_reset'    => true,
        						),
                    'cb_simple_events_location_size' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Location Font Size', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
                    'cb_simple_events_location_size_r' => array(
                        'type'          => 'text',
                        'label'         => __( 'Default Location Font Size (Mobile)', 'fl-builder' ),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                        'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                    ),
      						),
    						),

      )
    )
));

/**
 * Register form
 */
FLBuilder::register_settings_form('cb_simple_events_form_field', array(
    'title' => __('New Link', 'fl-builder'),
    'tabs'  => array(
        'file'      => array(
            'title'         => __('Link', 'fl-builder'),
            'sections'      => array(
                'label'       => array(
                    'title'         => 'Information',
                    'fields'        => array(
                        'cb_simple_event_label' => array(
                          'type'          => 'text',
                          'label'         => __( 'Event Title', 'fl-builder' ),
                          'default'       => 'Event Title',
                          'maxlength'     => '140',
                          'size'          => '40',
                          'placeholder'   => __( 'Event Title', 'fl-builder' ),
                          'class'         => '',
                          'description'   => __( '', 'fl-builder' ),
					                'connections'   => array( 'string' )
                        ),
                        'cb_simple_event_location' => array(
                          'type'          => 'text',
                          'label'         => __( 'Location (optional)', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '140',
                          'size'          => '40',
                          'placeholder'   => __( 'Location', 'fl-builder' ),
                          'class'         => '',
                          'description'   => __( '', 'fl-builder' ),
                          'connections'   => array( 'string' )
                        ),
                      )
                  ),

                  'datetime'       => array(
                      'title'         => 'Date and Time',
                      'fields'        => array(
                        'cb_simple_event_date' => array(
                        	'type'       => 'date',
                        	'label'      => __( 'Date', 'fl-builder' )
                        ),
                        'cb_simple_event_date_format' => array(
                            'type'          => 'select',
                            'label'         => __( 'Date Display Format', 'fl-builder' ),
                            'default'       => 'F j, Y',
                            'options'       => array(
                                'F j, Y'      => __( 'March 1, 1999', 'fl-builder' ),
                                'l, F j, Y'      => __( 'Monday, March 1, 1999', 'fl-builder' ),
                                'D, jS, F Y'      => __( 'Mon, 1st March, 1999', 'fl-builder' ),
                                'D M j'      => __( 'Mon Mar 1', 'fl-builder' ),
                                'j/n/Y'      => __( '03/01/99', 'fl-builder' ),
                                'n/j/Y'      => __( '01/03/99', 'fl-builder' ),
                                'custom'    => __( 'Custom PHP String', 'fl-builder' ),
                            ),
                            'toggle'        => array(
                                'F j, Y'      => array(
                                    'fields'        => array(),
                                ),
                                'l, F j, Y'      => array(
                                    'fields'        => array(),
                                ),
                                'D, jS, F Y'      => array(
                                    'fields'        => array(),
                                ),
                                'D M j'      => array(
                                    'fields'        => array(),
                                ),
                                'j/n/Y'      => array(
                                    'fields'        => array(),
                                ),
                                'n/j/Y'      => array(
                                    'fields'        => array(),
                                ),
                                'custom'      => array(
                                    'fields'        => array( 'cb_simple_event_date_format_custom' ),
                                )
                            )
                        ),
                        'cb_simple_event_date_format_custom' => array(
                          'type'          => 'text',
                          'label'         => __( 'Custom Date Format String', 'fl-builder' ),
                          'default'       => 'F j, Y',
                          'maxlength'     => '140',
                          'size'          => '40',
                          'placeholder'   => __( 'F j, Y', 'fl-builder' ),
                          'class'         => '',
                          'description'   => __( 'Accepts a PHP datetime string format.', 'fl-builder' )
                        ),
                        'cb_simple_event_include_time' => array(
                            'type'          => 'select',
                            'label'         => __( 'Include time?', 'fl-builder' ),
                            'default'       => 'no',
                            'options'       => array(
                                'yes'      => __( 'Yes', 'fl-builder' ),
                                'no'      => __( 'No', 'fl-builder' )
                            ),
                            'toggle'        => array(
                                'yes'      => array(
                                    'fields'        => array( 'cb_simple_event_time' ),
                                ),
                                'no'      => array()
                            )
                        ),
                        'cb_simple_event_time' => array(
                        	'type'       => 'time',
                        	'label'      => __( 'Time', 'fl-builder' ),
                          'default'		=>array(
                              'hours'			=> '01',
                              'minutes'		=> '00',
                              'day_period'	=> 'am'
                            )
                        ),
                    )
                ),

                'link'       => array(
                    'title'         => 'Event Link',
                    'fields'        => array(
          						'cb_simple_event_link' => array(
          							'type'          => 'link',
          							'label'         => __('Link (optional)', 'fl-builder'),
          							'connections'   => array( 'url' )
          						),
                    )
                ),

                'content'    => array(
                  'title'     => 'Event Description',
                  'fields'  => array(
                    'cb_simple_event_desc' => array(
                      'type'          => 'editor',
                      'media_buttons' => false,
                      'rows'          => '6',
                      'connections'   => array( 'string' )
                    ),
                  )
                )
            )
        ),
        'settings'      => array(
            'title'         => __('Settings', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => 'Event',
                    'fields'        => array(
          						'cb_simple_event_bg_color'         => array(
          							'type'          => 'color',
          							'label'         => __('Event Background Color', 'fl-builder'),
          							'show_reset'    => true
          						),
          						'cb_simple_event_bg_hover_color' => array(
          							'type'          => 'color',
          							'label'         => __('Event Hover Background Color', 'fl-builder'),
          							'show_reset'    => true,
          							'preview'       => array(
          								'type'          => 'none'
          							)
          						),
          						'cb_simple_event_spacing' => array(
          							'type'          => 'text',
          							'label'         => __('Event Spacing', 'fl-builder'),
                        'default'       => '',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => __( '10', 'fl-builder' ),
                        // 'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        'help'          => __( 'Spacing between this event and the next one.', 'fl-builder' )
          						),
          						'cb_simple_event_padding' => array(
          							'type'          => 'text',
          							'label'         => __('Event Padding', 'fl-builder'),
                        'default'       => '',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => __( '5', 'fl-builder' ),
                        // 'class'         => 'my-css-class',
                        'description'   => __( 'px', 'fl-builder' ),
                        'help'          => __( 'Spacing around the event.', 'fl-builder' )
          						),
        						),
      						),
                  'border'       => array(
                    'title'         => __( 'Border Override', 'fl-builder' ),
                    'fields'        => array(
                      'border_type'   => array(
                        'type'          => 'select',
                        'label'         => __( 'Type', 'fl-builder' ),
                        'default'       => '',
                        'help'          => __( 'The type of border to use. Double borders must have a width of at least 3px to render properly.', 'fl-builder' ),
                        'options'       => array(
                          ''       => _x( 'None', 'Border type.', 'fl-builder' ),
                          'solid'  => _x( 'Solid', 'Border type.', 'fl-builder' ),
                          'dashed' => _x( 'Dashed', 'Border type.', 'fl-builder' ),
                          'dotted' => _x( 'Dotted', 'Border type.', 'fl-builder' ),
                          'double' => _x( 'Double', 'Border type.', 'fl-builder' ),
                        ),
                        'toggle'        => array(
                          ''              => array(
                            'fields'        => array(),
                          ),
                          'solid'         => array(
                            'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                          ),
                          'dashed'        => array(
                            'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                          ),
                          'dotted'        => array(
                            'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                          ),
                          'double'        => array(
                            'fields'        => array( 'border_color', 'border_opacity', 'border' ),
                          ),
                        ),
                        'preview'         => array(
                          'type'            => 'none',
                        ),
                      ),
                      'border_color'  => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'fl-builder' ),
                        'show_reset'    => true,
                        'preview'         => array(
                          'type'            => 'none',
                        ),
                      ),
                      'border_opacity' => array(
                        'type'          => 'text',
                        'label'         => __( 'Opacity', 'fl-builder' ),
                        'default'       => '100',
                        'description'   => '%',
                        'maxlength'     => '3',
                        'size'          => '5',
                        'preview'         => array(
                          'type'            => 'none',
                        ),
                      ),
                      'border' 	 => array(
                        'type'        => 'dimension',
                        'label'       => __( 'Width', 'fl-builder' ),
                        'description' => 'px',
                        'preview'     => array(
                          'type' => 'none',
                        ),
                        'responsive'  => array(
                          'placeholder' => array(
                            'default'    => '0',
                            'medium'     => '',
                            'responsive' => '',
                          ),
                        ),
                      ),
                    ),
                  ),
                'label'       => array(
                    'title'         => 'Title',
                    'fields'        => array(
          						'cb_simple_event_title_color'         => array(
          							'type'          => 'color',
          							'label'         => __('Title Color', 'fl-builder'),
          							'show_reset'    => true
          						),
                      'cb_simple_event_title_size' => array(
                          'type'          => 'text',
                          'label'         => __( 'Title Font Size', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          // 'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
                      'cb_simple_event_title_size_r' => array(
                          'type'          => 'text',
                          'label'         => __( 'Title Font Size (Mobile)', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          // 'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
        						),
      						),
                'desc'       => array(
                    'title'         => 'Description',
                    'fields'        => array(
          						'cb_simple_event_desc_color'      => array(
          							'type'          => 'color',
          							'label'         => __('Description Color', 'fl-builder'),
          							'show_reset'    => true
          						),
                      'cb_simple_event_desc_size' => array(
                          'type'          => 'text',
                          'label'         => __( 'Description Font Size', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
                      'cb_simple_event_desc_size_r' => array(
                          'type'          => 'text',
                          'label'         => __( 'Description Font Size (mobile)', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
        						),
      						),
                'date'       => array(
                    'title'         => 'Date',
                    'fields'        => array(
          						'cb_simple_event_date_color' => array(
          							'type'          => 'color',
          							'label'         => __('Date Color', 'fl-builder'),
          							'show_reset'    => true,
          						),
                      'cb_simple_event_date_size' => array(
                          'type'          => 'text',
                          'label'         => __( 'Date Font Size', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
                      'cb_simple_event_date_size_r' => array(
                          'type'          => 'text',
                          'label'         => __( 'Date Font Size (Mobile)', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
        						),
      						),
                'Time'       => array(
                    'title'         => 'Time',
                    'fields'        => array(
          						'cb_simple_event_time_color' => array(
          							'type'          => 'color',
          							'label'         => __('Time Color', 'fl-builder'),
          							'show_reset'    => true,
          						),
                      'cb_simple_event_time_size' => array(
                          'type'          => 'text',
                          'label'         => __( 'Time Font Size', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
                      'cb_simple_event_time_size_r' => array(
                          'type'          => 'text',
                          'label'         => __( 'Time Font Size (Mobile)', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
        						),
      						),
                'location'       => array(
                    'title'         => 'Location',
                    'fields'        => array(
          						'cb_simple_event_location_color' => array(
          							'type'          => 'color',
          							'label'         => __('Location Color', 'fl-builder'),
          							'show_reset'    => true,
          						),
                      'cb_simple_event_location_size' => array(
                          'type'          => 'text',
                          'label'         => __( 'Location Font Size', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
                      'cb_simple_event_location_size_2' => array(
                          'type'          => 'text',
                          'label'         => __( 'Location Font Size (Mobile)', 'fl-builder' ),
                          'default'       => '',
                          'maxlength'     => '2',
                          'size'          => '3',
                          // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                          'class'         => 'my-css-class',
                          'description'   => __( 'px', 'fl-builder' ),
                          // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                      ),
        						),
      						),

            )
        )
    )
));
