<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="it">
<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php
  /*
    In the title tag we show the title of our
    site and the title of the current page
  */
  ?>
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
      'assets/css/index.css',
      'assets/css/lemonade.css',
      
    ]) ?>

  <?php
  /*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body>
  <div onclick="topFunction()" id="scroll_top"> </div>
  <header class="header"  >
    <div class="grid">
      <div class="logo small">
        <a  href="<?= $site->url() ?>"><!--<?= $site->sottotitolo()->html() ?> --><img src="assets/icons/logo.svg"></a>
      </div>
      <li class="menu_horizontal"> <a href="<?= $site->page('home_filtered')->url() ?>"> Il blog</a></li>
      <li class="menu_horizontal"> <a href="<?= page('chi-siamo')->url() ?>"> Chi siamo</a></li>
      <li class="menu_horizontal">  <a href="<?= url('report', ['params' => ['categories' => 'monitoraggio']]) ?>"> Monitoraggio</a>
      </li>
      <li class="menu_horizontal"> <a href="<?= page('glossario')->url() ?>"> Glossario</a></li>

      <!-- <?php foreach ($site->children()->listed() as $example): ?>
        <li class="menu_horizontal"><a href="<?= $example->url() ?>"><?= $example->title()->html() ?></a></li>
      <?php endforeach ?> -->
      
      <?php if(page('agenda')->children()->last()->data()->isAfter()): ?> 
        <div class="agenda small" style="opacity:1">
           <a href="<?= page('agenda')->url() ?>">
            <div style="font-weight:600">Prossimi appuntamenti </div>
            <div>
              <?=  page('agenda')->children()->last()->title() ?> / <?= page('agenda')->children()->last()->data()->toDate('j F') ?> / <?=  page('agenda')->children()->last()->ora()->toDate('H:i')?> / <?=  page('agenda')->children()->last()->dove()?>
            </div>
          </a>
        </div>
      <?php endif ?>
      <div class="menu_horizontal" id="search_button"> <a href="<?= page('search')->url() ?>"> </a></li></div>
      
      <div class="menu"> 
        <ul class="menu_dropdown ">
          <li> <a href="<?= $site->url() ?>"> Il blog</a></li>
          <li> <a href="<?= page('chi-siamo')->url() ?>"> Chi siamo</a></li>
          <li>  <a href="<?= url('report', ['params' => ['categories' => 'monitoraggio']]) ?>"> Monitoraggio</a></li>
          <li> <a href="<?= page('glossario')->url() ?>"> Glossario</a></li>
          <li > <a href="<?= page('agenda')->url() ?>"> Agenda </a></li>

        </ul>
      </div>
      

  </header>

  <main class="grid">
