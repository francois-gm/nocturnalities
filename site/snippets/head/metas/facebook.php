


<!-- Text data -->

<meta property="og:title" content="<?php snippet('logic/meta-page-title', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>"/>

<meta property="og:type" content="website"/>
<meta property="og:url" content="<?= $page->url() ?>"/>
<meta property="og:site_name" content="<?= $meta_global->website_title()->or($site->title())->smartypants() ?>"/>

<!-- site description -->
<meta property="og:description" content="<?php snippet('logic/meta-page-description', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>" />



<!-- Image data -->

<?php if ($page->seo_page_socmed_image()->isNotEmpty() && $page->seo_page_socmed_image()->toFile() != ''): ?>

  <?php $socmedimages = $page->seo_page_socmed_image()->toFiles(); ?>
  <?php foreach($socmedimages as $socmedimage): ?>
    <meta property="og:image" content="<?= $socmedimage->thumb('socialmedias-card')->url() ?>"/>
  <?php endforeach; ?>

<?php 

  // check each builder for images blocks that could match
  // 1 - content builder 

?>

<?php elseif ( ($page->content_builder()->exists()) ): ?>

  <?php $i1 = 0; foreach($page->content_builder()->toBlocks() as $block):?>
    
    <?php if ( ($block->type() == 'gallery_block') && ($block->gallery_block_content()->isNotEmpty() && $block->gallery_block_content()->first()->toFile() != '') ): ?>
      <?php if($i1 < 3):?>
        <?php $socmedimage = $block->gallery_block_content()->first()->toFile() ?>
        <meta property="og:image" content="<?= $socmedimage->thumb('socialmedias-card')->url() ?>"/>
      <?php endif;?>
    <?php $i1++; endif; ?>

    <?php if ( ($block->type() == 'image_block') && ($block->image_block_content()->isNotEmpty() && $block->image_block_content()->toFile() != '') ): ?>
      <?php if($i1 < 3):?>
        <?php $socmedimage = $block->image_block_content()->toFile() ?>
        <meta property="og:image" content="<?= $socmedimage->thumb('socialmedias-card')->url() ?>"/>
      <?php endif;?>
    <?php $i1++; endif; ?>

  <?php endforeach;?>

  <?php if($i1 == 0):?>
    <?php $socmedimages = $meta_global->socmed_image()->toFiles(); ?>
    <?php foreach($socmedimages as $socmedimage): ?>
      <meta property="og:image" content="<?= $socmedimage->thumb('socialmedias-card')->url() ?>"/>
    <?php endforeach; ?>
  <?php endif;?>

<?php else:?>

  <?php $socmedimages = $meta_global->socmed_image()->toFiles(); ?>
  <?php foreach($socmedimages as $socmedimage): ?>
    <meta property="og:image" content="<?= $socmedimage->thumb('socialmedias-card')->url() ?>"/>
  <?php endforeach; ?>
  
<?php endif;?>


