<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<?php
session_start();
?>
      <div align="center">
         <h2>Connexion</h2>
         <a href="index.php">Accueil</a>
         <a href="index.php?action=showInscription">Inscription</a>
         <br /><br />
         <form method="POST" action="index.php?action=login">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
      </div>
   

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php'); ?>