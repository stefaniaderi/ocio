<?php

Kirby::plugin('ocio/highlight-block', [
  'blueprints' => [
    'blocks/highlight' => __DIR__ . '/blueprints/blocks/highlight.yml'
  ],
  'snippets' => [
    'blocks/highlight' => __DIR__ . '/snippets/blocks/highlight.php'
  ]
]);