<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This example template makes use of the `$gallery` variable defined
  in the `album.php` controller (/site/controllers/album.php)

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<?php
  $lemma = page('glossario')->children()->listed()->sortBy(function ($page) {
    return $page->title();
  });
?>
<div class="page_title">
  <h1><?= $page->title()->html() ?></h1>
</div>

<ul class="loop_post">

  <?php foreach ($lemma as $lemma):?>
    <li class="glossario ">
      <h2><?= $lemma->title()->html() ?></h2> 

      <div class="note" ><?= $lemma->breve()->html() ?></div>
    </li>
    <?php endforeach ?>
</ul>
<?php snippet('footer') ?>
