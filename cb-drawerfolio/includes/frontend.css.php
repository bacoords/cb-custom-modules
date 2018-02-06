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

<?php if( isset($settings->photo_height )): ?>
 .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li{
   height: <?php echo $settings->photo_height; ?>px;
 }

 .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li .inner{
   height: <?php echo $settings->photo_height; ?>px;
 }
<?php endif; ?>

 .fl-node-<?php echo $id; ?> .cb-drawerfolio ul > li{
   padding: <?php echo ($settings->photo_spacing / 2); ?>px;
 }
 .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li .inner{
   height: <?php echo ($settings->photo_height - $settings->photo_spacing); ?>px;
 }
 .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer{
   padding-left: <?php echo ($settings->photo_spacing / 2); ?>px;
   padding-right: <?php echo ($settings->photo_spacing / 2); ?>px;
 }


.fl-node-<?php echo $id; ?> .cb-drawerfolio .caption{
  color: #<?php echo $settings->caption_text_color; ?>;
  background-color: <?php echo $module->converttorgba($settings->caption_bg_color, $settings->caption_bg_opacity); ?>;
}



.fl-node-<?php echo $id; ?> .cb-drawerfolio li:hover .caption{
  background-color: <?php echo $module->converttorgba($settings->caption_bg_hover_color, $settings->caption_bg_hover_opacity); ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio li.show .caption{
  background-color: <?php echo $module->converttorgba($settings->caption_bg_hover_color, $settings->caption_bg_hover_opacity); ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio li.show .caption--arrow{
  border-top-color: <?php echo $module->converttorgba($settings->caption_bg_hover_color, $settings->caption_bg_hover_opacity); ?>;
}



.fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list li.tag-list--tag{
  color: #<?php echo $settings->filter_text_color; ?>;
  background-color: <?php echo $module->converttorgba($settings->filter_bg_color, $settings->filter_bg_opacity); ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list li.tag-list--tag:hover{
  color: #<?php echo $settings->filter_text_hover_color; ?>;
  background-color: <?php echo $module->converttorgba($settings->filter_bg_hover_color, $settings->filter_bg_hover_opacity); ?>;
  border-bottom:1px solid #<?php echo $settings->filter_text_hover_color; ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list li.tag-list--tag.active{
  color: #<?php echo $settings->filter_text_hover_color; ?>;
  background-color: <?php echo $module->converttorgba($settings->filter_bg_hover_color, $settings->filter_bg_hover_opacity); ?>;
  border-bottom:1px solid #<?php echo $settings->filter_text_hover_color; ?>;
}

.fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list .tag-list--title{
  color: #<?php echo $settings->filter_header_text_color; ?>;
  background-color: <?php echo $module->converttorgba($settings->filter_header_bg_color, $settings->filter_header_bg_opacity); ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list .tag-list--title:hover{
  color: #<?php echo $settings->filter_header_text_hover_color; ?>;
  background-color: <?php echo $module->converttorgba($settings->filter_header_bg_hover_color, $settings->filter_header_bg_hover_opacity); ?>;
  border-bottom:1px solid #<?php echo $settings->filter_header_text_hover_color; ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list--column.open .tag-list--title{
  color: #<?php echo $settings->filter_header_text_hover_color; ?>;
  background-color: <?php echo $module->converttorgba($settings->filter_header_bg_hover_color, $settings->filter_header_bg_hover_opacity); ?>;
  border-bottom:1px solid #<?php echo $settings->filter_header_text_hover_color; ?>;
}





.fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--inner{
  background-color: #<?php echo $settings->drawer_bg_color; ?>;
}
.fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--inner * {
  color: #<?php echo $settings->drawer_text_color; ?>;
}




<?php if( isset($settings->caption_title_font)) { $font = $settings->caption_title_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--title{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if( isset($settings->caption_subtitle_font)) { $font = $settings->caption_subtitle_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--subtitle{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if( isset($settings->drawer_title_font)) { $font = $settings->drawer_title_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--title{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>


<?php if( isset($settings->drawer_content_font)) { $font = $settings->drawer_content_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--content * {
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if( isset($settings->tag_heading_font)) { $font = $settings->tag_heading_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list--title{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>


<?php if( isset($settings->tag_filter_font)) { $font = $settings->tag_filter_font; ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list--tag {
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>





<?php if( isset($settings->caption_title_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--title{
    font-size: <?php echo $settings->caption_title_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->caption_subtitle_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .caption--subtitle{
    font-size: <?php echo $settings->caption_subtitle_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->drawer_title_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--title{
    font-size: <?php echo $settings->drawer_title_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->drawer_content_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--content *{
    font-size: <?php echo $settings->drawer_content_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->tag_heading_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list--title{
    font-size: <?php echo $settings->tag_heading_size; ?>px;
  }
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list--trigger{
    font-size: <?php echo $settings->tag_heading_size; ?>px;
  }
<?php } ?>

<?php if( isset($settings->tag_filter_size)) { ?>
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .tag-list--tag{
    font-size: <?php echo $settings->tag_filter_size; ?>px;
  }
<?php } ?>





@media(min-width:<?php echo $module->responsive_breakpoint(); ?>px){
  .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li{
    width: 33.333333333%;
  }
  .fl-node-<?php echo $id; ?> .cb-drawerfolio .drawer--reflow{
      columns: 2 40px;
  }
}
@media(min-width:1080px){
  .fl-node-<?php echo $id; ?> .cb-drawerfolio > ul > li{
    width: <?php echo $settings->columns; ?>%;
  }
}
