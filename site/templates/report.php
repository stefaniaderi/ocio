<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This note template renders a blog article. It uses the `$page->cover()`
  method from the `note.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/note.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

  <?php
    $articles = page('report')->children()->listed()->sortBy(function ($page) {
  return $page->date()->toDate();
})->flip();
    if($category = urldecode(param('categories'))) {
  $articles = $articles->filterBy('categories', $category, ',');
}
if($topic = urldecode(param('topics'))) {
  $articles = $articles->filterBy('topics', $topic, ',');
}
?>
 
 <div class="page_title">
  <h3><?= $page->title()->html() ?> </h3>
  <h2> <?= $category ?> <?= $topic ?></h2>
</div>
 <ul class="loop_post">

    <?php foreach ($articles as $report_singola): ?>
    <li class="loop_single <?=$report_singola->topics() ?> <?=$report_singola->categories() ?>">
      <div class="note-date"> <?php echo strftime('%#d %#B %#Y', $report_singola->date()->toDate()) ?></div>
      <a href="<?= $report_singola->url() ?>">
        <h2><?= $report_singola->title()->html() ?></h2> 
      </a>
      <h3><?= $report_singola->subheading()->html() ?></h3>
      <?php if ($cover = $report_singola->cover()->toFile()): ?>
      <div class="cover">
        <a href="<?= $report_singola->url() ?>"><img src="<?= $cover->url() ?>" style="height:450px;"></a>
      </div>
      <?php endif ?>
      <div class="excerpt"><?= $report_singola->text()->toBlocks()->excerpt(400)?> <a href="<?= $report_singola->url() ?>"><span style="position: relative; bottom: 0.1rem;"> ??? </span> Continua a leggere </a></div>
      <ul class="note-tags">
        <?php foreach ($report_singola->topics()->split(',') as $topic): ?>
        <li><?= $topic ?></li>
      <?php endforeach ?>
      <?php foreach ($report_singola->categories()->split(',') as $category): ?>
        <li><?= $category ?></li>
      <?php endforeach ?>
      </ul>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
<?php snippet('footer') ?>

<!--
  -->