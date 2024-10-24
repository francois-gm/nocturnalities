<<?php echo option('sylvainjule.footnotes.wrapper') ?> id="footnotes" class="footnotes-container">
    
    <?php if(isset($pages)):?>

        <?php if($pages->find('strings')->string_footnotes() != ''):?>
            <p class="as-p"><?= $pages->find('strings')->string_footnotes()->smartypants() ?></p>
        <?php endif;?>

    <?php endif;?>

    <ol class="footnotes-list">
        <?php echo $footnotes ?>
    </ol>
</<?php echo option('sylvainjule.footnotes.wrapper') ?>>
