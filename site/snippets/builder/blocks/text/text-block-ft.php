


<?php if ($block->type() == 'text_block'): ?>

    <div class="text-block-wrapper content-block">

    	<?php
        
    		// we get the text with footnotes references but no bottom footnotes container
            $text = $block->text_block_content()->withoutBlocksFootnotes($startAt, $containerInt);
            // instead, we get an array of the block's footnotes, and append it to our $notes array
            $notesArr = $block->text_block_content()->onlyBlocksFootnotes($startAt, $containerInt);
            if($notesArr !== '') {
                foreach($notesArr as $f) { $notes[] = $f; }
            }
            // the first note of the next block will now start at (number of current notes + 1)
            $startAt = count($notes) + 1;
            // register value to parent
            $GLOBALS['startAt'] = $startAt;
    		$GLOBALS['notes'] = $notes;
        ?>

    	<?= $text ?>

    </div>

<?php endif; ?>
