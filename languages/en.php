<?php
/**
 * Crowdraiser English language file
 */

$english = array(

        /**
         * Menu items and titles
         */
        'crowdraiser' => "Crowdraiser",
        'crowdraiser:none' => "No Fundraiser Projects",
        'crowdraiser:all' => "All Fundraiser Projects",
        'crowdraiser:add' => "Add a Project",
        'crowdraiser:new' => "Create a New Fundraiser Project",
        'crowdraiser:goal' => "Goal",
        'crowdraiser:message:deleted_project' => 'Project deleted.',
        'crowdraiser:error:cannot_delete_project' => 'Cannot delete project.',
        'crowdraiser:error:project_not_found' => 'This project has been '
            . 'removed, is invalid, or you do not have permission to view it.',

        // River
        'river:create:object:crowdraiser' => '%s created a new project %s',

        // Statuses
        'crowdraiser:status:funding' => 'Funding',
        'crowdraiser:status:progress' => 'In Progress',
        'crowdraiser:status:completed' => 'Completed',

);

add_translation('en', $english);
