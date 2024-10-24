


<?php

  $strings = $pages->find('strings');
  $cookies = $pages->find('menu');
  $meta_global = $pages->find('meta');

?>


<?php if ($block->type() == 'embed_block'): ?>

  <?php if ($block->embed_block_type() == 'video_embed_youtube'): ?>
    <?php snippet('builder/blocks/media/embed-providers/youtube-block', ['block' => $block, 'iBlock' => $iBlock, 'iEmbed' => $GLOBALS['iEmbed'], 'page' => $page]); ?>
  <?php elseif ($block->embed_block_type() == 'video_embed_vimeo'): ?>
    <?php snippet('builder/blocks/media/embed-providers/vimeo-block', ['block' => $block, 'iBlock' => $iBlock, 'iEmbed' => $GLOBALS['iEmbed'], 'page' => $page]); ?>
  <?php elseif ($block->embed_block_type() == 'audio_embed_soundcloud'): ?>
    <?php snippet('builder/blocks/media/embed-providers/soundcloud-block', ['block' => $block, 'iBlock' => $iBlock, 'iEmbed' => $GLOBALS['iEmbed'], 'page' => $page]); ?>
  <?php elseif ($block->embed_block_type() == 'custom_embed'): ?>
    <?php snippet('builder/blocks/media/embed-providers/custom-embed-block', ['block' => $block, 'iBlock' => $iBlock, 'iEmbed' => $GLOBALS['iEmbed'], 'page' => $page]); ?>
  <?php endif; ?>

  <?php $iEmbed++; $GLOBALS['iEmbed'] = $iEmbed; ?>

<?php endif; ?>


