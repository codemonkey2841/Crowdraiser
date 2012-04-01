<?php
/**
 * View for crowdraiser objects
 *
 * @package Crowdraiser
 */

$full = elgg_extract('full_view', $vars, FALSE) && elgg_extract('full', $vars, FALSE);
$crowdraiser = elgg_extract('entity', $vars, FALSE);
elgg_load_library('crowdraiser');

if (!$crowdraiser) {
   return TRUE;
}

$owner = $crowdraiser->getOwnerEntity();
$container = $crowdraiser->getContainerEntity();
   
$excerpt = "<h5>Status: " . elgg_echo($crowdraiser->status) . "</h5>" 
   . $crowdraiser->description . crowdraiser_progress_bar(0, $crowdraiser->goal);

$owner_link = elgg_view('output/url', array(
   'href' => "crowdraiser/owner/$owner->username",
   'text' => $owner->name,
   'is_trusted' => true,
));
$author_text = elgg_echo('byline', array($owner_link));
$date = elgg_view_friendly_time($crowdraiser->time_created);

$metadata = elgg_view_menu('entity', array(
   'entity' => $crowdraiser,
   'handler' => 'crowdraiser',
   'sort_by' => 'priority',
   'class' => 'elgg-menu-hz',
));

$subtitle = "$author_text $date";

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets')) {
   $metadata = '';
}

if( $full ) {
   $guid = $crowdraiser->guid;
   elgg_extend_view('page/elements/sidebar', 'crowdraiser/sidebar');

   if( $crowdraiser->canEdit() ) {
      // edit link
      print elgg_view('output/url',
         array(
            'href' => "/crowdraiser/edit/$guid",
            'text' => "Edit Project",
            'class' => 'elgg-button',
         )
      );

      // delete link
      print elgg_view('output/url',
         array(
            'href' => "/action/crowdraiser/delete?guid=$guid",
            'is_action' => true,
            'confirm_link' => true,
            'text' => "Delete Project",
            'class' => 'elgg-button',
         )
      );
   }

   print "<br /><br />";
   print "Status: " . elgg_echo($crowdraiser->status);
   print $crowdraiser->description;
   if( $owner->guid == elgg_get_logged_in_user_guid () ) { // check if user is a owner
      $form = true;
   } else {
      $form = false;
   }
   print elgg_view_comments($crowdraiser, $form);
} else {
   $params = array(
      'entity' => $crowdraiser,
      'metadata' => $metadata,
      'subtitle' => $subtitle,
      'content' => $excerpt,
   );
   $params = $params + $vars;
   echo elgg_view('object/elements/summary', $params);
}
