<?php $title = 'Espace Client - Dashboard'; ?>

<?php ob_start(); ?>

<div class="headerDash">
   <h2> Espace Client - Dashboard </h2>
   <div class="menu">
      <ul>
      <?php

      if(isset($_SESSION['id'])) {

      ?>

         <li> <a href="index.php?action=logout">Se déconnecter</a> </li>
         <li> <a href="index.php"> Blog </a> </li>

      <?php

      }

      ?>
         
      </ul>
   </div>
</div>


<br>
<div class="container content-dash">
   <a class="button1" href="index.php?action=viewCreateChap">Ecrire un nouveau chapitre</a>
   <br> 
   <br>

   <h3> Mes dernières publications :</h3>

   <?php
            
   foreach($chapitres as $k => $chapitre)

   {

   ?>

   <div class="news">
      <h3>
         <?= htmlspecialchars($chapitre['title']) ?>
      </h3>

      <em><a class="button1" href="index.php?action=viewChapitre&amp;id=<?= $chapitre['id'] ?>">Modifier</a></em>
      <a class="button1" href="index.php?action=deleteChapitre&amp;id=<?= $chapitre['id'] ?>">Supprimer</a>

   </div>
   <br>

   <?php

   }

   ?>

   <div class="commentsDash">
      <h2> Commentaires signalés :</h2>
      <br>
      <?php

      while ($comment = $comments->fetch())

      {

      ?>
               
         <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?> (<?= $comment['report'] ?> signalements)</p>
         <p><?= nl2br(htmlspecialchars($comment['comment'])) ?>  </p>
         <a class="button2" href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>">Supprimer</a>
         <a class="button2" href="index.php?action=resetComment&amp;id=<?= $comment['id'] ?>">Reset</a>
                  
      <?php 

      }

      ?>
   </div>
         
</div>        

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php'); ?>