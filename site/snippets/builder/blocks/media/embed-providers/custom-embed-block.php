


<?php

  $cookies = $pages->find('menu');

?>

<?php 

  $value = $block->custom_embed_block_content(); 
  $valueRep1 = Str::replace($value, ['”','”'], '"');
  $valueRep2 = Str::replace($valueRep1, ['‘', '’'], '"');
  $output = $valueRep2;

  // get if either height attribute or css property
  preg_match_all("/height=\"(\d+)\"/", $output, $matches);
  $heightEl = implode(',', $matches[1]);
  if(!$matches[1]):
    preg_match_all("/height:(.*?);/", $output, $matches);
    $heightEl = implode(',', $matches[1]);
  endif;

  if(strpos($heightEl, '%') !== false || strpos($heightEl, 'px') !== false){
    $heightEl = $heightEl;
  } else{
    $heightEl = $heightEl . 'px';
  }

  // output, convert src to data-url
  $content = $output;
  $output = str_replace('src',' src="" data-url',$content);

?>

<div class="page-content-media-block content-block content-custom-block-embed">

  <figure class="page-content-media">

    <div class="page-content-media-inner-media" style="--embed-height:<?= $heightEl ?>;">

      <?php snippet('builder/blocks/media/embed-providers/cookie-disclaimer', ['cookies' => $cookies]); ?>

      <?= $output ?>

    </div>

    <?php if ( $block->caption() != ''): ?>

      <figcaption class="page-content-caption">                   
          <?= $block->caption()->kt() ?>
      </figcaption>

    <?php endif ?>

  </figure>

</div>


