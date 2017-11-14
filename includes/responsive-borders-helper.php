<?php


function cb_responsive_borders($settings, $id, $sel){

  $global_settings  = FLBuilderModel::get_global_settings();
  $css              = '';

  // Create rules for each breakpoint
  foreach ( array( 'default', 'medium', 'responsive' ) as $breakpoint ) {
    $breakpoint_css = '';
    $setting_suffix = ( 'default' !== $breakpoint ) ? '_' . $breakpoint : '';

    // Iterate over each direction
    foreach ( array( 'top', 'right', 'bottom', 'left' ) as $dir ) {
      $setting = 'border_' . $dir . $setting_suffix;

      if ( ! isset( $settings->{ $setting } ) ) {
        continue;
      }

      $prop  = 'border' . '-' . $dir;
      $value = preg_replace( FLBuilder::regex( 'css_unit' ), '', strtolower( $settings->{ $setting } ) );



      if ( empty( $settings->border_type ) ) {
        continue;
      } else {
        $prop .= '-width';
      }


      if ( '' !== $value ) {
        $breakpoint_css .= "\t";
        $breakpoint_css .= $prop . ':' . esc_attr( $value );
        $breakpoint_css .= ( is_numeric( trim( $value ) ) ) ? ( 'px;' ) : ( ';' );
        $breakpoint_css .= "\r\n";
      }
    }

    if ( ! empty( $breakpoint_css ) ) {

      // Build the selector
      $selector = '.fl-node-' . $id . ' ' . $sel . ' ';

      // Wrap css in selector
      $breakpoint_css = $selector . ' {' . "\r\n" . $breakpoint_css . '}' . "\r\n";

      // Wrap css in media query
      if ( 'default' !== $breakpoint ) {
        $breakpoint_css = '@media ( max-width: ' . $global_settings->{ $breakpoint . '_breakpoint' } . 'px ) {' . "\r\n" . $breakpoint_css . '}' . "\r\n";
      }

      $css .= $breakpoint_css;
    }
  }// End foreach().

  return $css;
}


?>
