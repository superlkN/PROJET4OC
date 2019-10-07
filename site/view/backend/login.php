<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

      <div class="headerDash">
         <h2>Espace Client - Connexion</h2>
         <div class="menu">
            <ul>
               <li> <a href="index.php">Accueil</a> </li>
               <li> <a href="index.php?action=showInscription">Inscription</a> </li>
            </ul>
         </div> 
      </div>
      
      <div class="login" align="center">
         <h2 class="titreLogin">Connexion</h2>
         <br /><br />
         <form method="POST" action="index.php?action=login">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input class="button1" type="submit" name="formconnexion" value="Se connecter !" />
         </form>
      </div>
   

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php'); ?>