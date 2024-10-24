


<?php

  $cookies = $pages->find('menu');
  $embed = $block->audio_embed_soundcloud_block_content()->toEmbed();

?>



<?php if($embed):?>

  <div class="page-content-media-block content-block content-audio-block-embed">

    <figure class="page-content-media">

      <div class="page-content-media-inner-media">

        <?php snippet('builder/blocks/media/embed-providers/cookie-disclaimer', ['cookies' => $cookies]); ?>

        <?php 

          $content = $embed->code();
          $code = str_replace('src','src="" data-url',$content);

        ?>

        <?= $code ?>

      </div>

      <?php if ( $block->caption() != ''): ?>

        <figcaption class="page-content-caption">                   
            <?= $block->caption()->kt() ?>
        </figcaption>

      <?php endif ?>

    </figure>

  </div>

<?php endif; ?>

     
