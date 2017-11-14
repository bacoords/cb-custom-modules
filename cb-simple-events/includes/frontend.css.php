/**
 * This file should contain frontend styles that
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file:
 *
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example:
 */

 .fl-node-<?php echo $id; ?> .cb-simple-events li {
     <?php if($settings->cb_simple_events_bg_color ) { ?>background-color: #<?php echo $settings->cb_simple_events_bg_color . ';'; } ?>
     <?php if($settings->cb_simple_events_padding || (0 ==  $settings->cb_simple_events_padding) ) { ?>padding: <?php echo $settings->cb_simple_events_padding . 'px;'; } ?>
     <?php if($settings->cb_simple_events_spacing || (0 ==  $settings->cb_simple_events_spacing) ) { ?>margin-bottom: <?php echo $settings->cb_simple_events_spacing . 'px;'; } ?>
     transition: background-color 0.3s ease;
     <?php if ( ! empty( $settings->border_type ) ) : // Border ?>

       border-style: <?php echo $settings->border_type; ?>;

       <?php if ( ! empty( $settings->border_color ) ) : ?>
       border-color: #<?php echo $settings->border_color; ?>;
       border-color: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->border_color ) ) ?>, <?php echo $settings->border_opacity / 100; ?>);
       <?php endif; ?>

     <?php endif; ?>
 }

  <?php echo cb_responsive_borders($settings, $id, '.cb-simple-events li'); ?>

 .fl-node-<?php echo $id; ?> .cb-simple-events li:last-of-type {
     <?php if($settings->cb_simple_events_spacing ) { ?>margin-bottom: 0px;<?php } ?>
 }

 .fl-node-<?php echo $id; ?> .cb-simple-events li:hover {
     <?php if($settings->cb_simple_events_bg_hover_color ) { ?>background-color: #<?php echo $settings->cb_simple_events_bg_hover_color . ';'; } ?>
 }




 .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__title {
   <?php if($settings->cb_simple_events_title_color ) { ?>color: #<?php echo $settings->cb_simple_events_title_color . ';'; } ?>
   <?php if($settings->cb_simple_events_title_size ) { ?>font-size: <?php echo $settings->cb_simple_events_title_size . 'px;'; } ?>
 }

 .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__desc * {
   <?php if($settings->cb_simple_events_desc_color ) { ?>color: #<?php echo $settings->cb_simple_events_desc_color . ';'; } ?>
   <?php if($settings->cb_simple_events_desc_size ) { ?>font-size: <?php echo $settings->cb_simple_events_desc_size . 'px;'; } ?>
 }

 .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__date {
   <?php if($settings->cb_simple_events_date_color ) { ?>color: #<?php echo $settings->cb_simple_events_date_color . ';'; } ?>
   <?php if($settings->cb_simple_events_date_size ) { ?>font-size: <?php echo $settings->cb_simple_events_date_size . 'px;'; } ?>
 }

 .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__time {
   <?php if($settings->cb_simple_events_time_color ) { ?>color: #<?php echo $settings->cb_simple_events_time_color . ';'; } ?>
   <?php if($settings->cb_simple_events_time_size ) { ?>font-size: <?php echo $settings->cb_simple_events_time_size . 'px;'; } ?>
 }

 .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__location {
   <?php if($settings->cb_simple_events_location_color ) { ?>color: #<?php echo $settings->cb_simple_events_location_color . ';'; } ?>
   <?php if($settings->cb_simple_events_location_size ) { ?>font-size: <?php echo $settings->cb_simple_events_location_size . 'px;'; } ?>
 }


 @media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

    .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__title {
      <?php if($settings->cb_simple_events_title_size_r ) { ?>font-size: <?php echo $settings->cb_simple_events_title_size_r . 'px;'; } ?>
    }

    .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__desc * {
      <?php if($settings->cb_simple_events_desc_size_r ) { ?>font-size: <?php echo $settings->cb_simple_events_desc_size_r . 'px;'; } ?>
    }

    .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__date {
      <?php if($settings->cb_simple_events_date_size_r ) { ?>font-size: <?php echo $settings->cb_simple_events_date_size_r . 'px;'; } ?>
    }

    .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__time {
      <?php if($settings->cb_simple_events_time_size_r ) { ?>font-size: <?php echo $settings->cb_simple_events_time_size_r . 'px;'; } ?>
    }

    .fl-node-<?php echo $id; ?> .cb-simple-events li .cb-simple-events__location {
      <?php if($settings->cb_simple_events_location_size_r ) { ?>font-size: <?php echo $settings->cb_simple_events_location_size_r . 'px;'; } ?>
    }

 }



<?php

$form_field_repeater = $settings->cb_simple_events_form_field_repeater;

foreach($form_field_repeater as $i=>$event){
?>

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> {
      <?php if($event->cb_simple_event_bg_color ) { ?>background-color: #<?php echo $event->cb_simple_event_bg_color . ';'; } ?>
      <?php if($event->cb_simple_event_padding || ( 0 ==  $event->cb_simple_event_padding) ) { ?>padding: <?php echo $event->cb_simple_event_padding . 'px;'; } ?>
      <?php if($event->cb_simple_event_spacing || ( 0 ==  $event->cb_simple_event_spacing) ) { ?>margin-bottom: <?php echo $event->cb_simple_event_spacing . 'px;'; } ?>
      transition: background-color 0.3s ease;
      <?php if ( ! empty( $event->border_type ) ) : // Border ?>

        border-style: <?php echo $event->border_type; ?>;

        <?php if ( ! empty( $event->border_color ) ) : ?>
        border-color: #<?php echo $event->border_color; ?>;
        border-color: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $event->border_color ) ) ?>, <?php echo $event->border_opacity / 100; ?>);
        <?php endif; ?>

      <?php endif; ?>
  }

  <?php
    $sel = '.cb-simple-events #cb-simple-event-' . $i;
    echo cb_responsive_borders($event, $id, $sel); ?>

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?>:last-of-type {
      <?php if($event->cb_simple_event_spacing ) { ?>margin-bottom: 0px;<?php } ?>
  }

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?>:hover {
      <?php if($event->cb_simple_event_bg_hover_color ) { ?>background-color: #<?php echo $event->cb_simple_event_bg_hover_color . ';'; } ?>
  }

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__title {
    <?php if($event->cb_simple_event_title_color ) { ?>color: #<?php echo $event->cb_simple_event_title_color . ';'; } ?>
    <?php if($event->cb_simple_event_title_size ) { ?>font-size: <?php echo $event->cb_simple_event_title_size . 'px;'; } ?>
  }

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__desc * {
    <?php if($event->cb_simple_event_desc_color ) { ?>color: #<?php echo $event->cb_simple_event_desc_color . ';'; } ?>
    <?php if($event->cb_simple_event_desc_size ) { ?>font-size: <?php echo $event->cb_simple_event_desc_size . 'px;'; } ?>
  }

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__date {
    <?php if($event->cb_simple_event_date_color ) { ?>color: #<?php echo $event->cb_simple_event_date_color . ';'; } ?>
    <?php if($event->cb_simple_event_date_size ) { ?>font-size: <?php echo $event->cb_simple_event_date_size . 'px;'; } ?>
  }

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__time {
    <?php if($event->cb_simple_event_time_color ) { ?>color: #<?php echo $event->cb_simple_event_time_color . ';'; } ?>
    <?php if($event->cb_simple_event_time_size ) { ?>font-size: <?php echo $event->cb_simple_event_time_size . 'px;'; } ?>
  }

  .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__location {
    <?php if($event->cb_simple_event_location_color ) { ?>color: #<?php echo $event->cb_simple_event_location_color . ';'; } ?>
    <?php if($event->cb_simple_event_location_size ) { ?>font-size: <?php echo $event->cb_simple_event_location_size . 'px;'; } ?>
  }


   @media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {

      .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__title {
        <?php if($event->cb_simple_event_title_size_r ) { ?>font-size: <?php echo $event->cb_simple_event_title_size_r . 'px;'; } ?>
      }

      .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__desc * {
        <?php if($event->cb_simple_event_desc_size_r ) { ?>font-size: <?php echo $event->cb_simple_event_desc_size_r . 'px;'; } ?>
      }

      .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__date {
        <?php if($event->cb_simple_event_date_size_r ) { ?>font-size: <?php echo $event->cb_simple_event_date_size_r . 'px;'; } ?>
      }

      .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__time {
        <?php if($event->cb_simple_event_time_size_r ) { ?>font-size: <?php echo $event->cb_simple_event_time_size_r . 'px;'; } ?>
      }

      .fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> .cb-simple-events__location {
        <?php if($event->cb_simple_event_location_size_r ) { ?>font-size: <?php echo $event->cb_simple_event_location_size_r . 'px;'; } ?>
      }

   }

<?php
}
?>
