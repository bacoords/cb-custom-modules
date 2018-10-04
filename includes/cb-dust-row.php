<?php



/**
 * Register dust as row background options
 * @param  [type] $form [description]
 * @param  [type] $id   [description]
 * @return [type]       [description]
 */
function cb_dust_row_settings_form( $form, $id ) {

  if ( 'row' == $id ) {

    $border_section = $form['tabs']['style']['sections']['border'];

    unset( $form['tabs']['style']['sections']['border'] );

    $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['cbcm_dust'] = __('CB Custom Dust', 'cb-custom-modules');
    $form['tabs']['style']['sections']['background']['fields']['bg_type']['toggle']['cbcm_dust'] = array(
        'sections'  => array('cbcm_dust_section')
    );


    $form['tabs']['style']['sections']['cbcm_dust_section'] = array(
        'title'     => __('Dust', 'cb-custom-modules'),
        'fields'    => array(
          'cb_dust_particles' => array(
               'type'          => 'select',
               'label'         => __( 'Select a Theme', 'cb-custom-modules' ),
               'default'       => 'neural',
               'options'       => array(
                   'neural'      => __( 'Neural', 'cb-custom-modules' ),
                   'rain'      => __( 'Rain', 'cb-custom-modules' ),
                   'snow'      => __( 'Snow', 'cb-custom-modules' ),
                   'stars'      => __( 'Stars', 'cb-custom-modules' ),
                   'bubbles'      => __( 'Bubbles', 'cb-custom-modules' )
               ),
           ),
           'cb_dust_color' => array(
               'type'          => 'color',
               'label'         => __( 'Color', 'cb-custom-modules' ),
               'default'       => 'ffffff',
               'show_reset'    => true
           ),
           'cb_dust_bg_color' => array(
               'type'          => 'color',
               'label'         => __( 'Background Color', 'cb-custom-modules' ),
               'default'       => '494949',
               'show_reset'    => true
           ),
        )
    );


    $form['tabs']['style']['sections']['border'] = $border_section;

  }

  return $form;

}
add_filter( 'fl_builder_register_settings_form', 'cb_dust_row_settings_form', 10, 2 );


/**
 * Adds custom attributes for our dust rows
 * @param  [type] $attrs [description]
 * @param  [type] $row   [description]
 * @return [type]        [description]
 */
function cb_dust_row_custom_attributes ($attrs, $row) {
    if ('cbcm_dust' == $row->settings->bg_type) {

        $attrs['id'] = "cbcm-particles-" . $row->node;
        $attrs['data-cb-dust'] = $row->settings->cb_dust_particles;
        $attrs['data-cb-color'] = $row->settings->cb_dust_color;
        $attrs['data-cb-bgcolor'] = $row->settings->cb_dust_bg_color;
    }
    return $attrs;
  }
add_filter('fl_builder_row_attributes', 'cb_dust_row_custom_attributes', 10, 2);




/**
 * Renders CSS for Dust Rows
 * @param  [type] $css             [description]
 * @param  [type] $nodes           [description]
 * @param  [type] $global_settings [description]
 * @return [type]                  [description]
 */
function cb_dust_row_render_css( $css, $nodes, $global_settings ) {
  foreach ( $nodes['rows'] as $row ) :
    if ( $row->settings->bg_type == 'cbcm_dust' ) :
      $css .= "#cbcm-particles-" . $row->node . "{
        position: relative; background-color:#{$row->settings->cb_dust_bg_color};
      }
      #cbcm-particles-" . $row->node . " .particles-js-canvas-el {
        position: absolute; top: 0px; height:auto;
      }
      #cbcm-particles-" . $row->node . " .fl-row-content-wrap{
      }";
    endif;
  endforeach;

  return $css;
}
add_filter( 'fl_builder_render_css', 'cb_dust_row_render_css', 10, 3 );



/**
 * Renders JS for dust rows
 * @param  [type] $js              [description]
 * @param  [type] $nodes           [description]
 * @param  [type] $global_settings [description]
 * @return [type]                  [description]
 */
function cb_dust_row_js( $js, $nodes, $global_settings ){

  ob_start();

  include CB_CUSTOM_MODULE_DIR . 'includes/cb-dust-row-js.php';

  return $js .= ob_get_clean();

}
add_filter( 'fl_builder_render_js', 'cb_dust_row_js', 10, 3 );
