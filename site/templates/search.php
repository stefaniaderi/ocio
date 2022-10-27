<?php snippet('header') ?>
<div class="page_title">
  <h1><?= $page->title()->html() ?></h1>
</div>
<div class="loop_post">
	<form>
	  <input type="search" placeholder="Cerca" name="q" class = "search" value="<?= html($query) ?>">
	  <input type="submit" value="Cerca" class="button">
	</form>


<ul>
  <?php foreach ($results as $result): ?>
  <li class="loop_single <?=$result->topics() ?> <?=$result->categories() ?>">
      <div class="note-date"> <?php echo strftime('%#d %#B %#Y', $result->date()->toDate()) ?></div>
      <a href="<?= $result->url() ?>">
        <h2><?= $result->title()->html() ?></h2> 
      </a>
      <h3><?= $result->subheading()->html() ?></h3>
      <?php if ($cover = $result->cover()->toFile()): ?>
       <div class="cover">
          <a href="<?= $result->url() ?>"><img src="<?= $cover->url() ?>" style="height:450px;"></a>
        </div>
      <?php endif ?>
      <div class="excerpt"><?= $result->text()->toBlocks()->excerpt(400)?> <a href="<?= $result->url() ?>"><span style="position: relative; bottom: 0.1rem;font-size:0.8rem"> ▶ </span>Continua a leggere </a></div>
      <ul class="note-tags">
        <?php foreach ($result->topics()->split(',') as $topic): ?>
        <li><?= $topic ?></li>
      <?php endforeach ?>
      <?php foreach ($result->categories()->split(',') as $category): ?>
        <li><?= $category ?></li>
      <?php endforeach ?>
      </ul>
      </a>
    </li>
  <?php endforeach ?>
</ul>
</div>
<?php snippet('footer') ?>