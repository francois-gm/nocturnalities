<?php

return function ($site) {

	$collection = $site->index()->filterBy('intendedTemplate', 'in', [
		'settings_category-type']);

    return $collection;

};