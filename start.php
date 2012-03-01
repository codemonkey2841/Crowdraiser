<?php

function crowdraiser_init() {

   $item = new ElggMenuItem('crowdraiser', elgg_echo('crowdraiser'), 'crowdraiser/all');
   elgg_register_menu_item('site', $item);

} // end of crowdraiser_init method

function crowdraiser_page_handler($segments) {

   switch ($segments[0]) {
      default :
      case 'all' :
         include elgg_get_plugins_path() . 'crowdraiser/pages/crowdraiser/all.php';
         break;
 
      case 'add' :
         include elgg_get_plugins_path() . 'crowdraiser/pages/crowdraiser/add.php';
         break;
   }
 
   return true;

} // end of crowdraiser_page_handler method

register_elgg_event_handler('init', 'system', 'crowdraiser_init');

elgg_register_action(
   "crowdraiser/save",
   elgg_get_plugins_path() . "crowdraiser/actions/crowdraiser/save.php"
);

elgg_register_page_handler('crowdraiser', 'crowdraiser_page_handler');
 
?>
