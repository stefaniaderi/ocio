<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all all the subpages of the `phototography`
  page with title and cover image.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>


<div class="page_title">
  <h1><?= $page->title()->html() ?></h1>
</div>


<ul class="loop_post">
<?php foreach ($page->children() as $evento): ?>
  <li class="loop_single evento">
    <a href="<?= $evento->link() ?>">
      <h2><?= $evento->title()->html() ?></h2> 
      <div class="note-date" style="padding-top: 0px"><?= $evento->data()->toDate('j F Y') ?> | <?= $evento->ora()->toDate('H:i')?> | <?= $evento->dove()->html() ?></div>
    </a>

    <?= $evento->text()?>
  </li>
  
<?php endforeach ?>
</ul>
<?php snippet('footer') ?>
