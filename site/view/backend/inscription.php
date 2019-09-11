<?php $title = "Espace Client - Inscription"; ?>

<?php ob_start(); ?>

<div align="center">
   <h2>Inscription</h2>
   <a href="index.php">Accueil</a>
   <a href="index.php?action=showLogin">Login</a>
   <br /><br />
   <form method="POST" action="index.php?action=inscription">
      <table>
         <tr>
            <td align="right">
               <label for="pseudo">Pseudo :</label>
            </td>
            <td>
               <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo"/>
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mail">Mail :</label>
            </td>
            <td>
               <input type="email" placeholder="Votre mail" id="mail" name="mail"/>
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mail2">Confirmation du mail :</label>
            </td>
            <td>
               <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2"/>
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mdp">Mot de passe :</label>
            </td>
            <td>
               <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mdp2">Confirmation du mot de passe :</label>
            </td>
            <td>
               <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
            </td>
         </tr>
         <tr>
            <td></td>
            <td align="center">
               <br />
               <input type="submit" name="forminscription" value="Je m'inscris" />
            </td>
         </tr>
      </table>
   </form>
   <?php
   if(isset($erreur)) {
      echo '<font color="red">'.$erreur."</font>";
   }
   ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php');
