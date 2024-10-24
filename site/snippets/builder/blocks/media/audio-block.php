


<?php if ($block->type() == 'audio_block'): ?>


  <?php $audio = $block->audio_block_content()->toFile() ?>

  <?php if ($audio): ?>
    
    <div class="page-content-media-block content-block content-audio-block">

      <figure class="page-content-media">

        <audio width="100%" height="auto" controls preload="none">
          <source src="<?= $audio ?>" type="audio/mpeg">
        </audio> 

        <?php if ( $audio->caption() != ''): ?>

          <figcaption class="page-content-caption">                   
              <?= $audio->caption()->kt() ?>
          </figcaption>

        <?php endif ?>

      </figure>

    </div>
    
  <?php endif; ?>


<?php endif; ?>


