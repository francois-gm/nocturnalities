


<?php

  $cookies = $pages->find('menu');
  $videoembedelem = $block->video_embed_vimeo_block_content()->toEmbed();

  if($videoembedelem != ''):
    $videoembedurl = $videoembedelem->url();
  else:
    $videoembedurl = '';
  endif;

?>



<?php if  (strpos($videoembedurl,'vimeo') !== false): ?>

  <?php 

    $videoembedurl = $block->video_embed_vimeo_block_content()->toEmbed()->url();
    $url = $videoembedurl;
    $path = parse_url($url, PHP_URL_PATH);
    $pathFragments = explode('/', $path);
    $end = end($pathFragments);

  ?>

  <div class="page-content-media-block content-block content-video-block-embed  
    <?php if($block->media_size() != ''):?> 
      media-block-size-<?= $block->media_size() ?>
    <?php endif ?>
    <?php if($block->media_alignment() != ''):?> 
      media-block-align-<?= $block->media_alignment() ?>
    <?php endif ?>
  ">

    <figure class="page-content-media">

      <div class="page-content-media-inner-media">

        <?php snippet('builder/blocks/media/embed-providers/cookie-disclaimer', ['cookies' => $cookies]); ?>

        <iframe data-url="https://player.vimeo.com/video/<?php echo $end; ?>?app_id=122963&api=1&color=ffffff&title=0&byline=0&background=0&autoplay=0&autopause=1" id="iframe-video-<?php echo $iEmbed ?>" src="" width="100%" height="auto" frameborder="0" title="Vimeo video" allow="fullscreen" allowfullscreen></iframe>
      
      </div>

      <?php if ( $block->caption() != ''): ?>

        <figcaption class="page-content-caption">                   
            <?= $block->caption()->kt() ?>
        </figcaption>

      <?php endif ?>

    </figure>

  </div>

<?php endif; ?>


