


<?php

	// seo global
	$meta_global = $pages->find('meta'); 
	$strings = $pages->find('strings');
	$topLevelPages = $kirby->collection('content-pages-top')->listed();
	$home = $site->children()->findBy('intendedTemplate', 'home');
?>



<nav class="navbar-menu">

	<h1><?= $site->title() ?></h1>

</nav>




<div class="header-meta-wrapper">


	<div class="header-meta-row">

		<div class="header-meta-block-left header-meta-sunrise-block">
			<p>
				<span class="header-meta-title"><?= $strings->string_header_sunrise() ?></span><br>
				<span class="header-meta-data has-sunrise-data">00:00</span>
			</p>
		</div>

		<div class="header-meta-block-center header-meta-daylight-block">
			<p>
				<span class="header-meta-title"><?= $strings->string_header_daylight() ?></span><br>
				<span class="header-meta-data has-daylight-data">10h00</span>
			</p>
		</div>

		<div class="header-meta-block-right header-meta-sunset-block">
			<p>
				<span class="header-meta-title"><?= $strings->string_header_sunset() ?></span><br>
				<span class="header-meta-data has-sunset-data">00:00</span>
			</p>
		</div>

	</div>


	<div class="header-meta-row has-shadow-title">

		<div class="header-meta-block-shadow-title">

			<p class="styled-as-h1" aria-hidden="true"><?= $site->title() ?></p>

		</div>

	</div>


	<div class="header-meta-row">

		<div class="header-meta-block-left header-meta-latitude-block">
			<p>
				<span class="header-meta-title"><?= $strings->string_header_latitude() ?></span><br>
				<span class="header-meta-data has-latitude-data">0° 00′ 00.0″ N</span>
			</p>
		</div>

		<div class="header-meta-block-center header-meta-current-time-block">
			<p>
				<span class="header-meta-data has-current-time-data">00:00</span>
			</p>
		</div>

		<div class="header-meta-block-right header-meta-longitude-block">
			<p>
				<span class="header-meta-title"><?= $strings->string_header_longitude() ?></span><br>
				<span class="header-meta-data has-longitude-data">0° 00′ 00.0″ E</span>
			</p>
		</div>

	</div>


</div>



<div class="orbit-body"></div>


