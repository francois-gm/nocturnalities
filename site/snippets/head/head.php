<!doctype html>

<html lang="<?= $kirby->language()->code() ?>" class="no-js">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <?php $meta_global = $pages->find('meta'); ?>

  <!-- analytics -->

  <?php snippet('head/metas/analytics', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>

  <!-- Page title, facebook, twitter metas, favicon -->
  <?php snippet('head/metas/title-desc', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>
  <?php snippet('head/metas/facebook', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>
  <?php snippet('head/metas/twitter', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>
  <?php snippet('head/metas/favicon', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); ?>

  <!-- links for extensions and dependencies -->

  <!-- preload -->

  <!-- css -->
  <!--
  <?= css('assets/css/bundle.min.css') ?>
  <?= css('assets/css/master.css?ver=1.31') ?>
  -->
  <!-- js -->
  <!--
  <?= js('assets/js/jquery-3.6.0.min.js', ['defer' => true]) ?>
  <?= js('assets/js/bundle.min.js', ['defer' => true]) ?>
  <?= js('assets/js/functions.min.js?ver=1.31', ['defer' => true]) ?>
  -->
  <!-- css -->
 
  <?= css('assets/css/normalize.css') ?>
  <?= css('assets/js/flickity/flickity.css') ?>
  <?= css('assets/css/master.css?ver=1.31') ?>

  <!-- js -->
  <?= js('assets/js/geoip-request.js', ['async' => true]) ?>
  <?= js('assets/js/jquery-3.6.0.min.js', ['defer' => true]) ?>
  <?= js('assets/js/js-cookie/src/js.cookie.js', ['defer' => true]) ?>
  <?= js('assets/js/bodyScrollLock.min.js', ['defer' => true]) ?>
  <?= js('assets/js/infinite-scroll.pkgd.min.js', ['defer' => true]) ?>
  <?= js('assets/js/flickity/flickity.pkgd.min.js', ['defer' => true]) ?>
  <?= js('assets/js/flickity/sync/flickity-sync.js', ['defer' => true]) ?>
  <?= js('assets/js/lazysizes/lazysizes.min.js', ['defer' => true]) ?>
  <?= js('assets/js/lazysizes/ls.unveilhooks.min.js', ['defer' => true]) ?>
  <?= js('assets/js/lazysizes/lazysizes.print.min.js', ['defer' => true]) ?>
  <?= js('assets/js/lazysizes/ls.parent-fit.min.js', ['defer' => true]) ?>
  <?= js('assets/js/suncalc.min.js', ['defer' => true]) ?>
  <?= js('assets/js/focus-visible.min.js', ['defer' => true]) ?>
  <?= js('assets/js/functions.js?ver=1.31', ['defer' => true]) ?>

</head>



<body 
  class="
  <?php if($page->intendedTemplate() == 'settings_social-post-generator'):?> 
    is-social-post-generator 
    <?php if($page->social_post_type() == 'social_post_ig_story'):?> is-story <?php endif;?>
    <?php if($page->social_post_orbit_toggle() == 'true'):?> orbit-is-hidden <?php endif;?>
  <?php endif;?>" 
  data-url-canonical="<?= $site->url('en'); ?>"
  data-day-segment="is-noon" 
  data-typeface="Redaction-0" 
  data-background-progress="15" 
  data-text-progress="95" 
  data-orbit-x-progress="50" 
  data-orbit-y-progress="75" 
  data-favicon-type="is-favicon-day"
>
