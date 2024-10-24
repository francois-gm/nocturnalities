<?php snippet('head/head') ?>



<?php snippet('menu-heading'); ?>
<?php snippet('menu'); ?>



<div class="page-structure-wrapper">



  <div class="page-content-wrapper">

    <?php snippet('templates/home', ['page' => $page]); ?>

  </div>



</div>



<?php snippet('footer') ?>