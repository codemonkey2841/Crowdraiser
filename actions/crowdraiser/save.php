<?php
/*
   // get the form inputs
   $title = get_input('title');
   $body = get_input('body');
   $tags = string_to_tag_array(get_input('tags'));
 
   // create a new blog object
   $blogpost = new ElggObject();
   $blogpost->subtype = "blog";
   $blogpost->title = $title;
   $blogpost->description = $body;
 
   // for now make all blog posts public
   $blogpost->access_id = ACCESS_PUBLIC;
 
   // owner is logged in user
   $blogpost->owner_guid = elgg_get_logged_in_user_guid();
 
   // save tags as metadata
   $blogpost->tags = $tags;
 
   // save to database and get id of the new blog
   $blog_guid = $blogpost->save();
 
   // if the blog was saved, we want to display the new post
   // otherwise, we want to register an error and forward back to the form
   if ($blog_guid) {
      system_message("Your blog was saved");
      forward($blogpost->getURL());
   } else {
      register_error("The blog could not be saved");
      forward(REFERER); // REFERER is a global variable that defines the previous page
   }
*/
system_message("Wakka wakka");
?>
