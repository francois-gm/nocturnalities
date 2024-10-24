<?php

return [
  	'panel' => [
	    'css' => 'assets/css/admin.css',
	    'language' => 'fr',
		],
  	'debug' => false,
  	'languages' => false,
    'languages.detect' => false,
    'date.handler' => 'intl',
    'smartypants' => true,
  	'home' => 'home',
  	'thumbs' => [
  		'driver' => 'gd',
			'quality' => '65',
			'presets' => [
				'socialmedias-card' => 	['width' => 1200],
				'socmed' => ['width' => 1200], // ??
				// jpg thumbs
				'blurred' => ['width' => 400, 'blur' => 30, 'quality' => 75],
				'thumb' => 	['width' => 300],
				'small' => 	['width' => 800],
		    	'average' => ['width' => 1200],
				'medium' => ['width' => 1800],
				'large' => ['width' => 2400],
				'x-large' => ['width' => 3000],
				// webp thumbs
				'blurred-webp' => ['width' => 400, 'blur' => 30, 'quality' => 95, 'format' => 'webp'],
				'thumb-webp' => ['width' => 300, 'format' => 'webp', 'quality' => 85],
				'small-webp' => ['width' => 800, 'format' => 'webp', 'quality' => 85],
		    	'average-webp' => ['width' => 1200, 'format' => 'webp', 'quality' => 85],
				'medium-webp' => ['width' => 1800, 'format' => 'webp', 'quality' => 85],
				'large-webp' => ['width' => 2400, 'format' => 'webp', 'quality' => 85],
				'x-large-webp' => ['width' => 3000, 'format' => 'webp', 'quality' => 85],
		],
		'srcsets' => [
	      	'default' => [
	      		'300w' => ['width' => 300],
		        '800w' => ['width' => 800],
		        '1200w' => ['width' => 1200],
		        '1800w' => ['width' => 1800],
		        '2400w' => ['width' => 2400],
		        '3000w' => ['width' => 3000]
		   	],
			'webp' => [
	      		'300w' => ['width' => 300, 'format' => 'webp', 'quality' => 85],
		        '800w' => ['width' => 800, 'format' => 'webp', 'quality' => 85],
		        '1200w' => ['width' => 1200, 'format' => 'webp', 'quality' => 85],
		        '1800w' => ['width' => 1800, 'format' => 'webp', 'quality' => 85],
		        '2400w' => ['width' => 2400, 'format' => 'webp', 'quality' => 85],
		        '3000w' => ['width' => 3000, 'format' => 'webp', 'quality' => 85]
			],
		],
	],
	'markdown' => [
	    'extra' => true
	],
	'cache' => [
	    'pages' => [
	     	'active' => true,
	     	'type'   => 'file',
	    ]
	],
	'bnomei.boost.cache' => ['type' => 'file'],
	'omz13.xmlsitemap' => [
	    'cacheTTL' => 60,
	    'excludePageWhenTemplateIs' => ['settings_category-index', 'settings_category-type', 'settings_category-post', 'settings_meta', 'settings_menu', 'settings_strings', 'settings_uploads', 'settings_social-post-generator', 'settings_analytics'],
	    'disableImages' => false,
	],
	'bnomei.robots-txt.content' => null, // string or callback
	'bnomei.robots-txt.sitemap' => 'sitemap.xml', // string or callback
	'bnomei.robots-txt.groups' => [ // array or callback
	    '*' => [ // user-agent
	        'disallow' => ['/kirby/', '/site/'],
	        'allow' => ['/media/'],
	    ]
	],
	'bnomei.securityheaders.headers' => [
		"X-Powered-By" => "", // unset
	    "X-Frame-Options" => "SAMEORIGIN",
	    "X-XSS-Protection" => "1; mode=block",
	    "X-Content-Type-Options" => "nosniff",
	    "strict-transport-security" => "max-age=31536000; includeSubdomains",
	    "Referrer-Policy" => "no-referrer-when-downgrade",
	    "Permissions-Policy" => 'interest-cohort=()', // flock-off,
	],
	'bnomei.securityheaders.loader' => function () {
		return kirby()->roots()->site() . '/config/csp.json';
	},
	'bnomei.securityheaders.seed' => function () {
		// deactivate nonce
		return null;
	},
	'sylvainjule.matomo.url'        => 'https://analytics.nocturnalities.com',
	'sylvainjule.matomo.id'         => '1',
	'sylvainjule.matomo.token'      => '8d5c0b3c79ff532fd61e664ed35f41c0',

	'medienbaecker.autoresize.maxWidth' => 3000,
	'medienbaecker.autoresize.maxHeight' => 5500,
	'medienbaecker.autoresize.quality' => 90,

];

?>