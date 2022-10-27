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


<div class="loop_post">
  <figure>
    <span class="h1"><?= $page->title()->html() ?></span> 
    <br>
    <div class="note-date"><?= $page->data()->toDate('j F Y') ?></div>
    <span><?= $page->dove()->html() ?></span>
    <span><?= $page->text() ?></span>
    <a href="<?= $page->link() ?>">Guarda il programma completo</span></a>
  </figure>
</div>

<?php snippet('footer') ?>
