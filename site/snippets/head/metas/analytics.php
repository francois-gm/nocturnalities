

<?php
  // ** analytics **
?>

<?php if ($meta_global->matomo_toggle() == 'true'): ?>

  <!-- Matomo -->
  <?= js('assets/js/matomo.script.js', ['defer' => true]) ?>

<?php endif;?>

<?php
  // ** if Google Tag Manager **
  //snippet('head/metas/analytics-gtm', ['site' => $site, 'page' => $page, 'meta_global' => $meta_global]); 
?>

<?php if ($meta_global->google_verification_key()->isNotEmpty()): ?>

  <!-- Google site verification key -->
  <meta name="google-site-verification" content="<?= $meta_global->google_verification_key() ?>" />

<?php endif;?>


