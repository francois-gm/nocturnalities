


<?php if ($block->type() == 'video_block'): ?>


  <?php $video = $block->video_block_content()->toFile() ?>

  <?php if ($video): ?>
    
    <div class="page-content-media-block content-block content-video-block 
              <?php if($block->media_size() != ''):?> 
                media-block-size-<?= $block->media_size() ?>
              <?php endif ?>
              <?php if($block->media_alignment() != ''):?> 
                media-block-align-<?= $block->media_alignment() ?>
              <?php endif ?>
            ">

      <figure class="page-content-media">

        <video class="<?php if($block->media_lightbox() != 'false'):?> zoom-in <?php endif;?> lazyload" data-slide-index="<?= $imgint ?>" width="100%" height="auto" <?php if($block->autoplay_toggle() == 'true'):?> autoplay muted loop <?php else:?> controls <?php endif ?> preload="none" playsinline <?php if ( $block->video_block_thumb()->toFile() != ''): ?>poster="<?= $block->video_block_thumb()->toFile()->thumb('small')->url() ?>"<?php endif;?>>
          <source src="<?= $video ?>" type="video/mp4">
        </video>

        <?php if ( $video->caption() != ''): ?>

          <figcaption class="page-content-caption">                   
              <?= $video->caption()->kt() ?>
          </figcaption>

        <?php endif ?>

      </figure>

    </div>
    
  <?php endif; ?>


<?php endif; ?>


