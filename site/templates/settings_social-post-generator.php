<?php snippet('head/head') ?>



<?php snippet('menu-heading'); ?>



<div class="page-structure-wrapper">



  <div class="page-content-wrapper">

    <?php snippet('modules/social-post-generator/post-generator', ['page' => $page]); ?>

  </div>



</div>



<?php snippet('footer') ?>