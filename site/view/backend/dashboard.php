<?php $title = 'Espace Client - Dashboard'; ?>

<?php ob_start(); ?>

<?php
session_start();

$bdd = new \PDO('mysql:host=localhost;dbname=projet4_oc;charset=utf8', 'root', '');

if(isset($_GET['id']) && $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>

      <div align="center">
         <h2>Dashboard de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) && $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="index.php?action=logout">Se déconnecter</a>
         <a href="index.php"> Blog </a>
         <?php
         }
         ?>
      </div>

<?php   
}
?>

<?php $content = ob_get_clean(); ?>

<?php require(VIEWBACK.'template.php'); ?>