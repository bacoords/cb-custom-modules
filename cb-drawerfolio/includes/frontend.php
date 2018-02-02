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
  <?php
  if( isset($settings->filter_repeater) && ($settings->show_filters=='top') ){
    echo '<div class="tag-list">';
    echo '<div class="tag-list--column" data-cb-df-column="cb-df-all"><div class="tag-list--title">All</div></div>';
    foreach( $settings->filter_repeater as $filters ){
      echo '<div class="tag-list--column" data-cb-df-column="'.$filters->title.'">';
      if( '' != $filters->title ){
        echo '<span class="tag-list--title">' . $filters->title . '</span>';
      }
      echo '<ul>';
      foreach($filters->tags as $tag ){
        if( '' != $tag ){
          echo '<li class="tag-list--tag" data-cb-df-filter="' . $tag . '">' . $tag . '</li>';
        }
      }
      echo '</ul>';
      echo '</div>';
    }
    echo '</div>';
  }

   ?>
  <ul>
    <?php foreach ($repeater as $repeat) : ?>
      <?php
      $class_list = '';
      if( $repeat->tags ){
        foreach ($repeat->tags as $tag) {
          if($tag != ''){
            $class_list .= ' cb-df-filter-' . $tag;
          }
        }
      }
      ?>
      <li class="cb-df-filter <?php echo $class_list; ?> filtered">
        <div class="inner" style="background-image:url(<?php echo $repeat->inner_photo_src; ?>)">
          <div class="caption">
              <div class="caption--title"><?php echo $repeat->title_text; ?></div>
              <div class="caption--subtitle"><?php echo $repeat->subtitle_text; ?></div>
              <div class="caption--arrow"></div>


          </div>
        </div>
        <div class="drawer">
          <div class="drawer--inner">
            <div class="drawer--title">
              <?php echo $repeat->drawer_title; ?>
            </div>
            <div class="drawer--content">
              <div class="row">
                <?php if($repeat->drawer_layout == 'two-col') : ?>
                  <div class="col-sm-12 col-md-4">
                    <?php echo $repeat->drawer_content; ?>
                  </div>
                  <div class="col-sm-12 col-md-8">
                    <?php echo $repeat->drawer_content_right; ?>
                  </div>
                <?php elseif ($repeat->drawer_layout == 'two-col-auto') : ?>
                    <div class="col-sm-12 col-md-12  drawer--reflow">
                      <?php echo $repeat->drawer_content; ?>
                    </div>
                <?php else : ?>
                    <div class="col-sm-12 col-md-12">
                      <?php echo $repeat->drawer_content; ?>
                    </div>
              <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php
  if( isset($settings->filter_repeater) && ($settings->show_filters=='bottom') ){
    echo '<div class="tag-list">';
    echo '<div class="tag-list--column" data-cb-df-column="cb-df-all"><div class="tag-list--title">All</div></div>';
    foreach( $settings->filter_repeater as $filters ){
      echo '<div class="tag-list--column" data-cb-df-column="'.$filters->title.'">';
      if( '' != $filters->title ){
        echo '<span class="tag-list--title">' . $filters->title . '</span>';
      }
      echo '<ul>';
      foreach($filters->tags as $tag ){
        if( '' != $tag ){
          echo '<li class="tag-list--tag" data-cb-df-filter="' . $tag . '">' . $tag . '</li>';
        }
      }
      echo '</ul>';
      echo '</div>';
    }
    echo '</div>';
  }

   ?>
</div>
<?php endif; ?>
