<?php
   // get the form inputs
   $title = get_input('title');
   $goal = get_input('goal');
   $desc = get_input('description');
 
   // create a new crowdraiser object
   $crowdraiser = new ElggProject();
   $crowdraiser->title = $title;
   $crowdraiser->goal = $goal;
   $crowdraiser->description = $desc;
 
   $crowdraiser->access_id = ACCESS_DEFAULT;
 
   // owner is logged in user
   $crowdraiser->owner_guid = elgg_get_logged_in_user_guid();
 
   // save to database and get id of the new project
   $project_guid = $crowdraiser->save();
 
   // if the project was saved, we want to display the new post
   // otherwise, we want to register an error and forward back to the form
   if ($project_guid) {
      system_message("Your project was saved");
      if( !add_to_river(
         'river/object/crowdraiser/create',
         'create', 
         elgg_get_logged_in_user_guid(),
         $project_guid
         )
      ) {
         register_error("There was an error adding to the river");
         forward(REFERER); // REFERER is a global variable that defines the previous page
      }

      forward($crowdraiser->getURL());
   } else {
      register_error("The project could not be saved");
      forward(REFERER); // REFERER is a global variable that defines the previous page
   }

?>
