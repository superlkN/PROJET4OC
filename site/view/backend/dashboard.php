<?php $title = 'Espace Client - Dashboard'; ?>

<?php ob_start(); ?>

<?php
session_start();
?>

<a class="suite" href="index.php?action=viewCreateChap">Ecrire un article</a>
<h2> Mes dernière publications :</h2>

         <?php
         
         foreach($chapitres as $k => $chapitre)
         {
         ?>
         <div class="news">

            <h3>
               <?= htmlspecialchars($chapitre['title']) ?>
            </h3>

            <em><a class="suite" href="index.php?action=viewChapitre&amp;id=<?= $chapitre['id'] ?>">Modifier</a></em>
            <a class="suite" href="index.php?action=deleteChapitre&amp;id=<?= $chapitre['id']; ?>">Supprimer</a>

         </div>
         <?php
         }
         ?>

         <?php

         while ($comment = $comments->fetch())
         {

         ?>
            <h2> Commentaires signalés</h2>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> (signalement : <?= $comment['report'] ?>) <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>">delete</a></p>
            
         <?php 

         }

         ?>
         
         <?php
         if(isset($_SESSION['id'])) {
         ?>
         <br />
         <a href="index.php?action=logout">Se déconnecter</a>
         <a href="index.php"> Blog </a>
         <?php
         }
         ?>

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php'); ?>