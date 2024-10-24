


<?php

	// seo global
	$meta_global = $pages->find('meta'); 
	$strings = $pages->find('strings');
	$topLevelPages = $kirby->collection('content-pages-top')->listed();
	$home = $site->children()->findBy('intendedTemplate', 'home');
?>


