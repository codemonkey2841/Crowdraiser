<?php

   // make sure only logged in users can see this page  
   gatekeeper();
 
   // set the title
   // we can also use elgg_echo() with a unique string descriptor to enable
   // internationalisation of this title
   $title = elgg_echo("crowdraiser:new");
 
   // start building the main column of the page
   $content = elgg_view_title($title);
 
   // add the form to this section
   $content .= elgg_view_form("crowdraiser/save");
 
   // optionally, add the content for the sidebar
   $sidebar = "";
 
   // layout the page
   $body = elgg_view_layout(
      'one_sidebar', 
      array(
         'content' => $content,
         'sidebar' => $sidebar
      )
   );
 
   // draw the page
   echo elgg_view_page($title, $body);

?>
