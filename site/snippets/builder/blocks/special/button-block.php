


<?php if ($block->type() == 'button_block'): ?>

  	<?php if ($block->button_block_string()->isNotEmpty()): ?>

	    <?php if( ( ($block->button_linktype() == 'linkurl') && ($block->button_linkurl_target()->isNotEmpty()) )
	          ||  ( ($block->button_linktype() == 'linkemail') && ($block->button_linkemail_target()->isNotEmpty()) )
	          ||  ( ($block->button_linktype() == 'linkpage') && ($block->button_linkpage_target()->isNotEmpty() && $block->button_linkpage_target()->toPage() != null ) )
	          ||  ( ($block->button_linktype() == 'linkfilepage') && ($block->button_linkfilepage_target()->toFile() != '') )
	          ||  ( ($block->button_linktype() == 'linkfilesite') && ($block->button_linkfilesite_target()->toFile() != '') )
	    ):

	    ?>

	      	<div class="button-block-wrapper content-block is-button is-text-block">

		        <div class="button-container">

		            <a class="styled-as-button button-width-auto" href="
		              <?php if( ($block->button_linktype() == 'linkurl') && ($block->button_linkurl_target()->isNotEmpty())) :?><?= $block->button_linkurl_target() ?>
		              <?php elseif( ($block->button_linktype() == 'linkemail') && ($block->button_linkemail_target()->isNotEmpty()) ):?>mailto:<?= $block->button_linkemail_target() ?>
		              <?php elseif( ($block->button_linktype() == 'linkpage') && ($block->button_linkpage_target()->isNotEmpty() && $block->button_linkpage_target()->toPage() != null ) ):?> <?= $block->button_linkpage_target()->toPage()->url() ?>
		              <?php elseif( ($block->button_linktype() == 'linkfilepage') && ($block->button_linkfilepage_target()->toFile() != '' ) ):?> <?= $block->button_linkfilepage_target()->toFile()->url() ?>
		              <?php elseif( ($block->button_linktype() == 'linkfilesite') && ($block->button_linkfilesite_target()->toFile() != '' ) ):?> <?= $block->button_linkfilesite_target()->toFile()->url() ?>
		              <?php endif;?>
		              " <?php if( ( ($block->button_block_popup()->toBool() === true) && ($block->button_linktype() != 'linkemail')) || ($block->button_linktype() == 'linkfilepage') || ($block->button_linktype() == 'linkfilesite')):?> target="_blank" <?php endif;?>><?= $block->button_block_string()->html() ?>
		            </a>

		        </div>

	      	</div>

	    <?php endif?>

  	<?php endif?>

<?php endif; ?>


