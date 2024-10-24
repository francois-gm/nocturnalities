<?php

require_once __DIR__ . '/lib/footnotes.php';

Kirby::plugin('sylvainjule/footnotes', [
    'options' => array(
        'wrapper'  => 'div',
        'back'     => '&#8617;',
        'links'    => true,
    ),
    'fieldMethods' => [
        'footnotes' => function($field) {
            return Footnotes::convert($field->text());
        },
        'ft' => function($field) {
            return $field->footnotes();
        },
        'removeFootnotes' => function($field) {
            return Footnotes::convert($field->text(), true);
        },
        'withoutFootnotes' => function($field) {
            return Footnotes::convert($field->text(), false, true);
        },
        'onlyFootnotes' => function($field) {
            return Footnotes::convert($field->text(), false, false, true);
        },

        /* Temporary solution, waiting for Blocks methods */   // last one is kirbytext()
        'withoutBlocksFootnotes' => function($field, $startAt, $containerInt) {
            return Footnotes::convert($field->text(), false, true, false, true, $startAt, false, $containerInt);
        },
        'onlyBlocksFootnotes' => function($field, $startAt, $containerInt) {
            return Footnotes::convert($field->text(), false, false, true, true, $startAt, true, $containerInt);
        }

    ],
    'snippets'     => [
        'footnotes_container' => __DIR__ . '/snippets/container.php',
        'footnotes_entry'     => __DIR__ . '/snippets/entry.php',
        'footnotes_reference' => __DIR__ . '/snippets/reference.php'
    ]
]);
