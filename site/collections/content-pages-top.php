<?php

return function ($site) {

	$collection = $site->index()->filterBy('template', 'in', [
		'project-index', 'dates-index', 'team-index', 'partners-post', 'about-post', 'contact-post']);

    return $collection;

};