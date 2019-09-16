<?php $title = 'Espace Client - Dashboard'; ?>

<?php ob_start(); ?>

<?php
session_start();
?>

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

         </div>
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
      </div>

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php'); ?>