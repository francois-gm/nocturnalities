<?= $page->seo_page_text()->or($page->pageDefaultDesc())->or($meta_global->website_description())->unhtml() ?>