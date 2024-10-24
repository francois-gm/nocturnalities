


<?php if ($block->type() == 'documents_block'): ?>

<?php

	// seo global
	$meta_global = $pages->find('meta'); 
	$strings = $pages->find('strings');
	$nodata = '&ndash;';

	$documents = $block->documents_block_content()->toStructure();

?>

	<?php if ($documents != ''):?>


		<div class="documents-block-wrapper content-block">

			<?php if($block->documents_block_title() != ''):?>

				<div class="table-th">
					<p class="resetcase"><?= $block->documents_block_title()->smartypants() ?></p>
				</div>

			<?php endif;?>

			<div class="table-td">

				<ul>

					<?php foreach($documents as $document): ?>

						<?php if($document->item_type() == 'item_isfile'):?>

							<?php
								$file = $document->item_isfile_content()->toFile();
							?>

							<?php if($file):?>

								<li>
									<a class="list-document-a styled-as-tag" href="<?= $file->url() ?>" target="_blank" rel="noopenner"><span class="list-document-item"><span class="is-document-external-link has-arrow-before font-is-arrow"></span><?php if($document->item_title() != ''):?><?= $document->item_title()->smartypants() ?><?php else:?><?= $file->filename() ?><?php endif;?> <span class="documents-type-label documents-type-label-inline">[<?= $file->extension() ?>, <?= $file->niceSize() ?>]</span></span></a>
								</li>

							<?php endif;?>

						<?php endif;?>

						<?php if($document->item_type() == 'item_islink'):?>

							<li>
								<a class="list-document-a styled-as-tag" href="<?= $document->item_islink_url() ?>" target="_blank" rel="noopenner"><span class="list-document-item"><span class="is-document-external-link has-arrow-before font-is-arrow is-external-link-before"></span><?= $document->item_title()->smartypants() ?> <?php if($document->item_islink_target_type() != ''):?><span class="documents-type-label documents-type-label-inline">[<?= $document->item_islink_target_type()->smartypants() ?>]</span><?php endif;?></span></a>
							</li>

						<?php endif;?>

					<?php endforeach;?>

				</ul>

			</div>

		</div>


	<?php endif;?>

<?php endif; ?>


