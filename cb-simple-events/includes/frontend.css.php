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

<?php

$form_field_repeater = $settings->cb_simple_events_form_field_repeater;

foreach($form_field_repeater as $i=>$event){
?>

.fl-node-<?php echo $id; ?> .cb-simple-events #cb-simple-event-<?php echo $i; ?> {
    <?php if($event->cb_simple_event_bg_color ) { ?>background-color: #<?php echo $event->cb_simple_event_bg_color . ';'; } ?>
    <?php if($event->cb_simple_event_padding ) { ?>padding: <?php echo $event->cb_simple_event_padding . 'px;'; } ?>
    <?php if($event->cb_simple_event_spacing ) { ?>margin-bottom: <?php echo $event->cb_simple_event_spacing . 'px;'; } ?>
    transition: background-color 0.3s ease;
}

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



<?php
}
?>
