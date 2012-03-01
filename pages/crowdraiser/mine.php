<?php

$body = elgg_list_entities(
   array(
      'type' => 'object',
      'subtype' => 'crowdraiser',
      'owner_guid' => elgg_get_logged_in_user_guid()
   )
);

$body = elgg_view_layout('one_column', array('content' => $body));
 
echo elgg_view_page("All Fundraising Projects", $body);

?>
