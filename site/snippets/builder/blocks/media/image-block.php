


<?php if ($block->type() == 'image_block'): ?>

	<?php $images = $block->image_block_content()->toFiles() ?>


	<?php if ($images): ?>

		<?php foreach($images as $image): ?>

            <div class="page-content-media-block content-block content-image-block 
            	<?php if($block->media_size() != ''):?> 
            		media-block-size-<?= $block->media_size() ?>
            	<?php endif ?>
            	<?php if($block->media_alignment() != ''):?> 
            		media-block-align-<?= $block->media_alignment() ?>
            	<?php endif ?>
            ">

            	<figure>

              		<picture>
						
						<source type="image/webp" data-src="<?= $image->thumb('blurred-webp')->url() ?>" data-srcset="<?= $image->srcset('webp') ?>" data-sizes="auto">
							
						<img class="<?php if($block->media_lightbox() != 'false'):?> zoom-in <?php endif;?> lazyload" data-slide-index="<?= $imgint ?>" style="<?php if($image->focusPercentageX() != ''):?>--media-object-position: <?= $image->focusPercentageX(); ?>% <?= $image->focusPercentageY(); ?>%; <?php endif;?>--image-ratio:<?= $image->ratio() ?>;" src="<?= $image->thumb('blurred')->url() ?>" data-sizes="auto" data-aspectratio="<?= $image->ratio(); ?>" data-srcset="<?= $image->srcset() ?>" width="<?= $image->thumb('thumb')->width() ?>" height="<?= $image->thumb('thumb')->height() ?>" <?php if($image->alt() != ''):?>alt="<?= $image->alt() ?>"<?php elseif($image->alt() == '' && $image->caption() != ''):?>alt="<?= $image->caption() ?>"<?php else:?>alt=""<?php endif;?>>

					</picture>

					<?php if ( $image->caption() != ''): ?>

			          <figcaption class="page-content-caption">                   
			              <?= $image->caption()->kt() ?>
			          </figcaption>

			        <?php endif ?>

            	</figure>

            </div>
                        
        <?php endforeach; ?>

	<?php endif; ?>


<?php endif; ?>


