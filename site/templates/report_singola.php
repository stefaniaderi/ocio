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
    // fetch all tags
    $categories = $articles->pluck('categories', ',', true);
    $topics = $articles->pluck('topics', ',', true);
    $lemmas = page('glossario')-> children() -> listed();
  ?>
  <div class="filter">
    <div class="filter__inner">
      <div class="filter-category" style="min-height:40px">
        <?php if ($page->topics()->isNotEmpty()):?>
          <div class="filter-category__title">
            Argomento 
          </div>
          <div class="filter-category__dropdown" style="display: block;">
            <div class="filter-items-wrap">
              <ul class="filter_single" >
                <?php foreach ($page->topics()->split(',') as $topic): ?>
                <li><a href="<?= url('report', ['params' => ['topics' => $topic]]) ?>"><?= $topic ?></a></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <?php if ($page->categories()->isNotEmpty()):?>
        <div class="filter-category" style="min-height:40px">
          <div class="filter-category__title">
            Categoria 
          </div>
          <div class="filter-category__dropdown" style="display: block;">
            <div class="filter-items-wrap">
              <ul class="filter_single">
                <?php foreach ($page->categories()->split(',') as $category): ?>
                  <li><a href="<?= url('report', ['params' => ['categories' => $category]]) ?>"><?= $category ?></a></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($pdf = $page->pdf()->toFile()):?>
        <div class="filter-category__title"></div>
        <div class="button petite" style="margin-top:1rem">
          <a href="<?= $pdf->url() ?>" download> Scarica il PDF</a>
        </div>
      <?php endif; ?>
    </div>
  </div>

<div class="lemmas">
  <?php foreach ($lemmas as $lemma): ?>
  <div class="lemma_singolo" onclick="hideDiz('<?= $lemma->slug()?>')" id = "<?= $lemma->slug()?>" >
    <p class="name" style="cursor:default; text-decoration: none"><?= $lemma->title() ?></p>
    <?= $lemma->completo()->toBlocks() ?>
  </div>
  <?php endforeach ?>
</div>

<div class="loop_post ">


    <div class="note-date small"> <?= $page->date()->toDate('j F Y') ?></div>

    <h1><?= $page->title()->html() ?></h1>

    <h3><?= $page->subheading()->html() ?></h3>

    <?php if ($cover = $page->cover()->toFile()): ?>
      <img  src="<?= $cover->url() ?>" >
    <?php endif ?>

    <div class="note">
    <?= $page->text()->toBlocks()?>
    </div> 
    <br>  
    <ul class="grid" style="grid-template-columns: repeat(6, 1fr);" style="display: contents">
      <?php 
        foreach ($articles->limit(3) as $report_singola): ?>
        <li  class="column" style="--columns: 2">
          <div class="note-date"> <?= $report_singola->date()->toDate('j F Y') ?></div>
          <a href="<?= $report_singola->url() ?>">
            <figure>
              <h3><?= $report_singola->title()->html() ?></h3>
              <h4><?= $report_singola->subheading()->html() ?></h4>
              <?php if ($cover = $report_singola->cover()->toFile()): ?>
                <div class ="cover"><img align="left" src="<?= $cover->url() ?>" style="height:10rem"></div>
              <?php endif ?>
            </figure>
          </a>
        </li>
      <?php endforeach ?>
    </ul>







<?php snippet('footer') ?>
