<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 *
 */

$form_field_repeater = $settings->cb_simple_events_form_field_repeater;

?>

<div class="cb-simple-events">

	<div class="row-fluid">

    <ul>

		<?php foreach($form_field_repeater as $i=>$event){

				$date_string = strtotime($event->cb_simple_event_date);

        if( $event->cb_simple_event_include_time == 'yes' ){
          $time = $event->cb_simple_event_time;
          $hours = $time->hours;
          $minutes = $time->minutes;
          $day_period = $time->day_period;
        }

				if( $event->cb_simple_event_date_format =='custom' ){
					$date_format = $event->cb_simple_event_date_format_custom;
				} else {
					$date_format = $event->cb_simple_event_date_format;
				}

				$schema_date = date(DATE_ISO8601, $date_string);


      ?>
      <li id="cb-simple-event-<?php echo $i; ?>"  itemscope itemtype="http://schema.org/Event">

        <h4 class="cb-simple-events__title" itemprop="name">
					<?php if($event->cb_simple_event_link) echo "<a itemprop='url' href='" . $event->cb_simple_event_link . "'>"; ?>
						<?php echo $event->cb_simple_event_label; ?>
					<?php if($event->cb_simple_event_link) echo "</a>"; ?>
				</h4>

				<div class="cb-simple-events__meta">

					<span class="cb-simple-events__date"  itemprop="startDate" content="<?php echo $schema_date; ?>">
						<?php echo date($date_format, $date_string); ?>
					</span>

					<?php if( $event->cb_simple_event_include_time == 'yes' ){ ?>
						<span class="cb-simple-events__time">
							|
							<?php echo $hours . ':' . $minutes . $day_period; ?>
						</span>

					<?php } ?>

					<?php if(  $event->cb_simple_event_location ) { ?>

						<span class="cb-simple-events__location">
							|
							<?php echo $event->cb_simple_event_location; ?>
						</span>
					<?php } ?>

				</div>

        <div class="cb-simple-events__desc" itemprop="description">
					<?php echo $event->cb_simple_event_desc; ?>
				</div>

      </li>

    <?php } ?>

    </ul>

  </div>

</div>
