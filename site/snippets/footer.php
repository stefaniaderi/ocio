<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
  </main>
<div class="footer">
  <div class="footer grid" style="border:none; padding:none">
    <div class="column footer" style="border:none; padding:none">
      <h4>OCIO</h4>
      <p>
        Osservatorio CIvicO sulla casa e la residenza Venezia
      </p>
    </div>
    <div class="column footer" style="border:none; padding:none !important">
      <ul>
        <?php foreach ($site->children()->listed() as $example): ?>
        <li><a href="<?= $example->url() ?>"><?= $example->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="column footer" style="border:none">
        Campo Saffa 387/I, 30121, Venezia VE
    </div>
  </div>
</div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <?= js([
      'assets/js/index.js',
      '@auto'
    ]) ?>
  <script>

      function showDiz(e){

        var lemmas=document.getElementsByClassName("lemma_singolo");

        for (var i = 0; i < lemmas.length; i++) {
          lemmas[i].style.pointerEvents= "none";
          lemmas[i].style.opacity="0";
        }

        name = e;
        document.getElementById(name).style.opacity="1"
        document.getElementById(name).style.pointerEvents= "all";
        document.getElementById(name).style.zIndex= "100";



      }

      function hideDiz(e){

        name = e;


        document.getElementById(name).style.opacity="0"
        document.getElementById(name).style.pointerEvents= "none";
        document.getElementById(name).style.zIndex= "0";


      }
</script>


</body>
</html>
