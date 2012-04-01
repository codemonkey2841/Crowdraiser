<?php
/**
 * Delete crowdraiser entity
 *
 * @package Crowdraiser
 */

$crowdraiser_guid = get_input('guid');
$crowdraiser = get_entity($crowdraiser_guid);

if (elgg_instanceof($crowdraiser, 'object', 'crowdraiser') && $crowdraiser->canEdit()) {
	$container = get_entity($crowdraiser->container_guid);
	if ($crowdraiser->delete()) {
		system_message(elgg_echo('crowdraiser:message:deleted_project'));
		if (elgg_instanceof($container, 'group')) {
			forward("crowdraiser/group/$container->guid/all");
		} else {
			forward("crowdraiser/owner/$container->username");
		}
	} else {
		register_error(elgg_echo('crowdraiser:error:cannot_delete_project'));
	}
} else {
	register_error(elgg_echo('crowdraiser:error:project_not_found'));
}

forward(REFERER);
