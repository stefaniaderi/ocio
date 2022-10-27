<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This home template renders content from others pages, the children of
  the `photography` page to display a nice gallery grid.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<?php
  $persona = page()->children()->listed();
?>
<div class="page_title">
  <h1><?= $page->title()->html() ?></h1>
</div>

<div class="loop_post" style="padding-top:var(--padding)">
  <div class="note">
    <?= $site->bio()->kirbytext()?>
  </div>
  <ul class="grid chi-siamo">
  <?php foreach ($persona as $persona):?>
    <li class="column chi-siamo">
      <?php if ($cover = $persona->img()->toFile()): ?>
        <img src="<?= $cover->url() ?>">
      <?php endif ?>
      <h3><?= $persona->title()->html() ?></h3> 
      <span><?= $persona->desc() ?></span>
  </li>
    <?php endforeach ?>
</ul>
</div>
<?php snippet('footer') ?>
