<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<?php
session_start();

$bdd = new \PDO('mysql:host=localhost;dbname=projet4_oc;charset=utf8', 'root', '');

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = $_POST['mdpconnect'];
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
      $requser->execute(array($mailconnect));
      $userexist = $requser->rowCount();
      $userinfo = $requser->fetch();
      if($userexist == 1) {
        if (password_verify($mdpconnect, $userinfo['motdepasse'])) {
           $erreur = "Le mot de passe est valide";
           $_SESSION['id'] = $userinfo['id'];
           $_SESSION['pseudo'] = $userinfo['pseudo'];
           $_SESSION['mail'] = $userinfo['mail'];
           header("Location: index.php?action=showDash&id=".$_SESSION['id']);
        } 
        else
        {
           $erreur = "Le mot de passe est non valide";
        }
        
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
      <div align="center">
         <h2>Connexion</h2>
         <a href="index.php">Accueil</a>
         <a href="index.php?action=showInscription">Inscription</a>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php'); ?>