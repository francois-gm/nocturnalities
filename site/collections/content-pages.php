<?php

return function ($site) {

	$collection = $site->index()->filterBy('template', 'in', [
		'project-index', 'project-post', 'dates-index', 'team-index', 'partners-post', 'about-post', 'contact-post', 'legal-post']);

    return $collection;

};