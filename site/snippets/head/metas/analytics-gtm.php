


<?php if ($meta_global->google_tag_manager_key()->isNotEmpty()): ?>

  <!-- Google Tag Manager -->
  <script>

    $cookie = false;
    $analyticsdone = false;
    $iframeconsentdone = false;

    setInterval(function(){
      if ($cookie == true && $analyticsdone != true){
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?= $meta_global->google_tag_manager_key(); ?>');
        $analyticsdone = true;
        return;
      }
    }, 250);

  </script>
  <!-- End Google Tag Manager -->

<?php endif;?>


