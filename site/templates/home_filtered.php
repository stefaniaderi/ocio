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
  <?php snippet('intro') ?>
  <?php
    $articles = page('report')->children()->listed()->sortBy(function ($page) {
  return $page->date()->toDate();
})->flip();
// fetch all tags
$categories = $articles->pluck('categories', ',', true);
$topics = $articles->pluck('topics', ',', true);


?>
  <div class="filter">
    <div class="filter__inner">
      <div class="filter-category" style="min-height:40px">
        <div class="filter-category__title ">
          Argomento 
        </div>
        <div class="filter-category__dropdown" style="display: block;">
          <div class="filter-items-wrap">
            <ul class="filter-items">
              <li class="filter_single active" onclick="filterSelection('all')">
                   tutti
                </li>
              <?php foreach($topics as $topic): ?>
                <li class="filter_single" onclick="filterSelection('<?= $topic?>')">
                   <?= html($topic) ?>
                </li>
              <?php endforeach ?>
           </ul>
          </div>
        </div>
      </div>
      <div class="filter-category" style="min-height:40px">
        <div class="filter-category__title">
          Categoria 
        </div>
        <div class="filter-category__dropdown" style="display: block;">
          <div class="filter-items-wrap">
            <ul class="filter-items js-filterlist" data-filterlist="/v2/api/filterlist?list=categories&amp;t[]=note&empty=1&order=relevance">
              <li class="filter_single " onclick="filterSelection('all')">
                   tutte
                </li>
              <?php foreach($categories as $category): ?>
                <li class="filter_single" onclick="filterSelection('<?= $category?>')">
                    <?= html($category) ?>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="filter_toggle">  </div>

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
      <div class="excerpt"><?= $report_singola->text()->toBlocks()->excerpt(400)?> <a href="<?= $report_singola->url() ?>"><span style="position: relative; bottom: 0.1rem;font-size:0.8rem"> ▶ </span>Continua a leggere </a></div>
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
