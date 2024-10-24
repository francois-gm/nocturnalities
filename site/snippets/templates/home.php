


<!-- page content -->

<main class="page-content-container page-content-grid-wrapper is-<?= $page->template() ?>">



	<?php

		$strings = $pages->find('strings');

		$GLOBALS['iEmbed'] = 1; 
		$GLOBALS['imgint'] = 0;
		$iBlock = 1;

	?>



	<!-- main content -->

	<section class="page-content">

		<div class="page-header-section">

			<p class="styled-as-h1 is-home-subtitle">
				Bargaining<br>
				Beyond Rest
			</p>

		</div>

		<div class="page-content-section link-hyphens">

			<!-- content -->

			<?php 
				// variables for collection footnotes
		      	$GLOBALS['startAt'] = 1;
		      	$GLOBALS['notes'] = [];
		      	$containerInt = 1;
		    ?>

			<?php if ($page->content_builder()->toBlocks()): ?>

				<?php foreach($page->content_builder()->toBlocks() as $block):?>
				
					<?php snippet('builder/builder-text', ['block' => $block, 'startAt' => $GLOBALS['startAt'], 'notes' => $GLOBALS['notes'], 'containerInt' => $containerInt]); ?>
					<?php snippet('builder/builder-special', ['block' => $block]); ?>
	    			<?php snippet('builder/builder-medias', ['page' => $page, 'block' => $block, 'iBlock' => $iBlock, 'imgint' => $GLOBALS['imgint'], 'iEmbed' => $GLOBALS['iEmbed'] ]); ?>

				<?php $iBlock++; endforeach; ?>

			<?php endif;?>

			<?php
		    	// if footnotes
		    	if(count($GLOBALS['notes'])): 
		    ?>

			    <?php snippet('footnotes_container', ['footnotes' => implode('', $GLOBALS['notes']), 'containerInt' => $containerInt]) ?>

		    <?php endif; ?>

		</div>

	</section>	



</main>
	

