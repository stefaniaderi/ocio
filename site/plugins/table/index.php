<?php

Kirby::plugin('ocio/table', [
  'blueprints' => [
    'blocks/table' => __DIR__ . '/blueprints/blocks/table.yml'
  ],
  'snippets' => [
    'blocks/table' => __DIR__ . '/snippets/blocks/table.php'
  ]
]);