<?php $title = "Espace Client - Inscription"; ?>

<?php ob_start(); ?>

<div class="headerDash">
   <h2>Espace Client - Inscription</h2>
   <div class="menu">
      <ul>
         <li> <a href="index.php">Accueil</a> </li>
         <li> <a href="index.php?action=showLogin">Login</a> </li>
      </ul>
   </div> 
</div>

<div class="inscription "align="center">
   <br>
   <h2 class="titreInscription">Inscription</h2>
   <br>
   <div class="formInscription">
      <form  method="POST" action="index.php?action=inscription">
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
                  <input class="button1" type="submit" name="forminscription" value="Je m'inscris" />
               </td>
            </tr>
         </table>
      </form>
      <br>
      <br>
   </div>
   <?php
   if(isset($erreur)) {
      echo '<font color="red">'.$erreur."</font>";
   }
   ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php');
