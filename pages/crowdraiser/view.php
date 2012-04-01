<?php
/**
 * View a project
 *
 * @package Crowdraiser
 */

$project = get_entity(get_input('guid'));

$page_owner = elgg_get_page_owner_entity();

//$crumbs_title = $page_owner->name;

//elgg_push_breadcrumb($crumbs_title, "crowdraiser/owner/$page_owner->username");

$title = $project->title;

elgg_push_breadcrumb($title);

$content = elgg_view_entity(
   $project, 
   array(
      'full_view' => true
   )
);

$body = elgg_view_layout('content', array(
   'content' => $content,
   'title' => $title,
   'filter' => '',
));

echo elgg_view_page($title, $body);
