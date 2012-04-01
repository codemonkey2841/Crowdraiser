<?php

function crowdraiser_progress_bar($pledges, $goal) {

   $percentage = floor(($pledges / $goal) * 100);
   $w = ($percentage > 100 ? 100 : $percentage);
   $magic = "<div>\n";
   $magic .= "<div id=\"progress-bar\" class=\"all-rounded\">\n";
   $magic .= "<div id=\"progress-bar-percentage\" class=\"all-rounded\" style=\"width: $w%\">";
   if( $percentage < 5 ) {
      $magic .= "<div class=\"spacer\"></div>";
   }
   $magic .= "</div></div>";
   $magic .= "<table style=\"width: 200px;\">";
   $magic .= "<tr><td>$percentage%</td><td style=\"text-align: right;\">$$goal</td></tr>";
   $magic .= "<tr><td>funded</td><td style=\"text-align: right;\">Goal</td></tr>";
   $magic .= "</table>";
   $magic .= "</div>";
   return $magic;

} // end of crowdraiser_progress_bar method

function crowdraiser_get_backers() {

   //TODO stuff

} // end of crowdraiser_get_backers

?>