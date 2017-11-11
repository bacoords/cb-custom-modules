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

        if( $event->cb_simple_event_include_time == 'yes' ){
          $time = $event->cb_simple_event_time;
          $hours = $time->hours;
          $minutes = $time->minutes;
          $day_period = $time->day_period;
        }

      ?>
      <li id="cb-simple-event-<?php echo $i; ?>">

        <h4 class="cb-simple-events__title">
					<?php if($event->cb_simple_event_link) echo "<a href='" . $event->cb_simple_event_link . "'>"; ?>
						<?php echo $event->cb_simple_event_label; ?>
					<?php if($event->cb_simple_event_link) echo "</a>"; ?>
				</h4>

				<div class="cb-simple-events__meta">

					<span class="cb-simple-events__date">
						<?php echo $event->cb_simple_event_date; ?>
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

        <div class="cb-simple-events__desc">
					<?php echo $event->cb_simple_event_desc; ?>
				</div>

      </li>

    <?php } ?>

    </ul>

  </div>

</div>
