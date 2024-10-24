


<!-- page content -->

<main class="page-content-container page-content-grid-wrapper is-<?= $page->template() ?>">



	<?php

		$strings = $pages->find('strings');

		$GLOBALS['iEmbed'] = 1; 
		$GLOBALS['imgint'] = 0;
		$iBlock = 1;

	?>



	<!-- main content -->

	<section class="page-content is-social-post-generator">

		<div class="page-header-section">

			<p class="styled-as-h1 is-home-subtitle">
				<?= $page->social_post_content()->kti() ?>
			</p>

		</div>

	</section>	



</main>
	

