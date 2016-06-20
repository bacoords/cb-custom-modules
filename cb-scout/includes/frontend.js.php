/**
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example:  
 */
 

jQuery(document).ready(function(){
  

  
  var ids = [];
  
  var cbScoutOffset = false;
  <?php if($settings->cb_scout_offset > 0){
    echo 'cbScoutOffset = true;';
  } ?>
  
  <?php foreach($settings->cb_scout_form_field_repeater as $current_form){
    if(substr($current_form->cb_scout_link_url, 0, 1) == '#')
      echo 'ids.push("' . $current_form->cb_scout_link_url . '");';
  }
  echo 'var mblBreak = ' . $module->responsive_breakpoint() . ';';
  echo 'var mblSetting = "' . $settings->cb_scout_responsive . '";';
  ?>
  
  jQuery('.fl-node-<?php echo $id; ?> .cb-scout--mobile-icon').click(function(){
    jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').toggleClass('cb-scout--mobile-hide');
  })
    
  
  jQuery(document).scroll(function(){
    //Fixing element to top
    var scrollTop     = jQuery(window).scrollTop(),
        elementOffsetTop = jQuery('.fl-node-<?php echo $id; ?> .cb-scout--placeholder').offset().top,
        distance      = (elementOffsetTop - scrollTop),
        width = (jQuery('.fl-node-<?php echo $id; ?> .cb-scout--placeholder').width() - 10),
        height = (jQuery('.fl-node-<?php echo $id; ?> .cb-scout').height() - 10);

   if ((jQuery('.fl-builder-bar').length > 0) && !cbScoutOffset) {
    jQuery('.cb-scout--sticky').attr('style','top:44px');
   }   
    
    //Check mobile settings & width
    if((mblSetting != 'stay') || (mblBreak < window.innerWidth)){  
      
      
      if((mblSetting == 'icon') && (mblBreak < window.innerWidth)){
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').removeClass('cb-scout--mobile-hide');
      }
      if(distance < 0){
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout').addClass('cb-scout--sticky');
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').css('width',width);
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout--placeholder').css('height',height);
//        if(mblSetting == 'icon') jQuery('.fl-node-<?php echo $id; ?> .cb-scout > .cb-scout--mobile-icon').css('width',width);
      } else {
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout').removeClass('cb-scout--sticky');
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout').removeAttr('style');
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout--placeholder').removeAttr('style');
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').removeAttr('style');
//        if(mblSetting == 'icon') jQuery('.fl-node-<?php echo $id; ?> .cb-scout > .cb-scout--mobile-icon').removeAttr('style');
      }

      //after scroll, update active & hash
      jQuery.doTimeout( 'scroll', 250, function(){
        cbScoutTopDiv(ids);
      });
      } else {
         jQuery('.fl-node-<?php echo $id; ?> .cb-scout').removeClass('cb-scout--sticky');
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout').removeAttr('style');
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout--placeholder').removeAttr('style');
        jQuery('.fl-node-<?php echo $id; ?> .cb-scout > ul').removeAttr('style');       
      }
  });
});


//Find Topmost Div
function cbScoutTopDiv(ids){
  var offset = 100;
  <?php if(is_admin_bar_showing()) { echo 'offset += 32;';} ?>
    
  jQuery.each(ids, function(i, a){
    if(jQuery(a).offset().top <= (jQuery(window).scrollTop() + offset)){
      if(a != window.location.href.split("#")[1]){
      cbScoutMakeActive(a);
      }
    }
  });
  return;
}

//Set active on div, update hash for non-IE browsers
function cbScoutMakeActive(i){
  jQuery('.fl-node-<?php echo $id; ?> .cb-scout ul li a').removeClass('cb-scout--active');
  var s = '.fl-node-<?php echo $id; ?> .cb-scout ul li a[href*="' + i + '"]';
  jQuery(s).addClass('cb-scout--active');
  history.pushState(null, null, i);
  return;
}

