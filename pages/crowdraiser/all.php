<?php

elgg_pop_breadcrumb();
elgg_push_breadcrumb(elgg_echo('crowdraiser'));

elgg_register_title_button();

$content = elgg_list_entities(
   array(
      'type' => 'object',
      'subtype' => 'crowdraiser',
   )
);

if( !$content ) {
   $content = elgg_echo('crowdraiser:none');
}

$title = elgg_echo('crowdraiser:all');

$body = elgg_view_layout(
   'content', 
   array(
      'filter_context' => 'all',
      'content' => $content,
      'title' => $title,
      'sidebar' => elgg_view('crowdraiser/sidebar'),
   )
);

echo elgg_view_page($title, $body);

?>
