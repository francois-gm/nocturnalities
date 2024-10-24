


<?php

  $cookies = $pages->find('menu');
  $videoembedelem = $block->video_embed_youtube_block_content()->toEmbed();

  if($videoembedelem != ''):
    $videoembedurl = $videoembedelem->url();
  else:
    $videoembedurl = '';
  endif;

?>



<?php if ( (strpos($videoembedurl,'youtube') !== false) || (strpos($videoembedurl,'youtu.be') !== false) ): ?>

  <?php

    $url = $videoembedurl;
    $parts = explode('/', $url);
    $number = $parts[count($parts) - 1];

    if  (strpos($videoembedurl,'youtube') !== false):
      $strip = substr($number, strpos($number, "=") + 1);
    elseif (strpos($videoembedurl,'youtu.be') !== false):
      $strip = substr($number, strpos($number, "=") + 0);
    endif;

    if (($value = strpos($strip, "&")) !== FALSE) { 

       $strip = explode("&", $strip, 2);
       $strip = $strip[0];

    }

    $result = $strip;

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

        <iframe data-url="https://www.youtube.com/embed/<?php echo $result ?>?autoplay=0" id="iframe-video-<?php echo $iEmbed ?>" src="" width="100%" height="auto" frameborder="0" title="Youtube video" allow="fullscreen" allowfullscreen></iframe>
      
      </div>

      <?php if ( $block->caption() != ''): ?>

        <figcaption class="page-content-caption">                   
            <?= $block->caption()->kt() ?>
        </figcaption>

      <?php endif ?>

    </figure>

  </div>

<?php endif; ?>


