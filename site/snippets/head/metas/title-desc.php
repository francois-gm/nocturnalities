


<!-- site title -->
<title><?php snippet('logic/meta-page-title', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?></title>

<!-- site description -->
<meta name="description" content="<?php snippet('logic/meta-page-description', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>" />

<!-- site keywords -->
<meta name="keywords" content="<?= $page->seo_page_keywords()->or($meta_global->website_keywords())->unhtml() ?>" />

