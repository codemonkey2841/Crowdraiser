<?php

/**
 * Format and return the URL for crowdraiser.
 *
 * @param ElggObject $entity Crowdraiser object
 * @return string URL of crowdraiser.
 */
function crowdraiser_url_handler($entity) {

   if( !$entity->getOwnerEntity() ) {
      // default to a standard view if no owner.
      return FALSE;
   }

   $friendly_title = elgg_get_friendly_title($entity->title);

   return "crowdraiser/view/{$entity->guid}/$friendly_title";

} // end of crowdraiser_url_handler method

function crowdraiser_init() {

   elgg_extend_view('css/elgg', 'crowdraiser/css');
   $item = new ElggMenuItem('crowdraiser', elgg_echo('crowdraiser'), 'crowdraiser/all');
   elgg_register_menu_item('site', $item);
   elgg_register_library('crowdraiser', elgg_get_plugins_path() . 'crowdraiser/lib/crowdraiser.php');

} // end of crowdraiser_init method

function crowdraiser_page_handler($segments) {

   switch ($segments[0]) {
      case 'add' :
         include elgg_get_plugins_path() . 'crowdraiser/pages/crowdraiser/add.php';
         break;

      default :
      case 'friends' :
      case 'edit' :
      case 'owner' :
      case 'group' :
      case 'all' :
         include elgg_get_plugins_path() . 'crowdraiser/pages/crowdraiser/all.php';
         break;

      case 'view':
      case 'read': // Elgg 1.7 compatibility
         set_input('guid', $segments[1]);
         include elgg_get_plugins_path() . 'crowdraiser/pages/crowdraiser/view.php';
         break;
 
   }
 
   return true;

} // end of crowdraiser_page_handler method

elgg_register_entity_url_handler('object', 'crowdraiser', 'crowdraiser_url_handler');

register_elgg_event_handler('init', 'system', 'crowdraiser_init');

elgg_register_action(
   "crowdraiser/delete",
   elgg_get_plugins_path() . "crowdraiser/actions/crowdraiser/delete.php"
);

elgg_register_action(
   "crowdraiser/save",
   elgg_get_plugins_path() . "crowdraiser/actions/crowdraiser/save.php"
);

elgg_register_page_handler('crowdraiser', 'crowdraiser_page_handler');
 
?>
