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
                        'cb_simple_event_date' => array(
                        	'type'       => 'date',
                        	'label'      => __( 'Date', 'fl-builder' )
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

                'link'       => array(
                    'title'         => '',
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
                          'class'         => 'my-css-class',
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
        						),
      						),
                // 'link'       => array(
                //     'title'         => 'Link',
                //     'fields'        => array(
          			// 			'cb_simple_event_link_color'      => array(
          			// 				'type'          => 'color',
          			// 				'label'         => __('Link Color', 'fl-builder'),
          			// 				'show_reset'    => true
          			// 			),
                //       'cb_simple_event_link_size' => array(
                //           'type'          => 'text',
                //           'label'         => __( 'Link Font Size', 'fl-builder' ),
                //           'default'       => '',
                //           'maxlength'     => '2',
                //           'size'          => '3',
                //           // 'placeholder'   => __( 'Placeholder text', 'fl-builder' ),
                //           'class'         => 'my-css-class',
                //           'description'   => __( 'px', 'fl-builder' ),
                //           // 'help'          => __( 'Text displayed in the help tooltip', 'fl-builder' )
                //       ),
                //     )
                // ),
            )
        )
    )
));
