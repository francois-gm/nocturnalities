


<div class="no-cookies-embed-disclaimer embed-disclaimer-hide">
  <div class="no-cookies-embed-disclaimer-content">

    <p class="no-cookies-string"><?= $cookies->cookies_text_embed()->kti() ?></p>

    <?php if($cookies->cookies_readmore_goto()->toPage()):?>
      <a href="<?= $cookies->cookies_readmore_goto()->toPage()->url() ?>" target="_blank" class="cookies-learn-more"><?= $cookies->cookies_button_readmore() ?></a>
    <?php endif;?>
    
    <button class="cookies-accept styled-as-button"><?= $cookies->cookies_button_accept() ?></button>

  </div>
</div>

