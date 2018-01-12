<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example:
 */

?>


<?php $repeater =  $settings->drawer_repeater; ?>

<?php if( $repeater ) : ?>
<div class="cb-drawerfolio">
  <ul>
    <?php foreach ($repeater as $repeat) : ?>
      <li>
        <div class="inner" style="background-image:url(<?php echo $repeat->inner_photo_src; ?>)">
          <div class="caption">
              <div class="caption--title"><?php echo $repeat->title_text; ?></div>
              <div class="caption--subtitle"><?php echo $repeat->subtitle_text; ?></div>
              <div class="caption--arrow"></div>


          </div>
        </div>
        <div class="drawer">
          <div class="drawer--title">
            <?php echo $repeat->drawer_title; ?>
          </div>
          <div class="drawer--close">
            &times;
          </div>
          <div class="drawer--content">
            <?php echo $repeat->drawer_content; ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>
