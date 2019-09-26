<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<div class="headerChap">
    <h1>Mon voyage en Alaska </h1>
        <div class="menu">
            <ul>
                <?php if (!isset($_SESSION['id'])) { ?>
                <li><a href="index.php?action=showLogin"> Connexion </a></li>
                <li><a href="index.php?action=showInscription"> Inscription </a></li>
                <?php } ?>

                <?php if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) { ?>
                <li><a href="index.php?action=showDash&id=<?=$_SESSION['id'] ?>">Dashboard</a></li>
                <?php } ?>

                <?php if (isset($_SESSION['id'])) { ?>
                <li><a href="index.php?action=logout">Se déconnecter</a></li>
                <?php } ?>
            </ul>
        </div>
</div>
<?php
while ($data = $auteur->fetch())
{
?>
    <br>
    <div class="container auteur">
        <h3>
            <?= $data['nom_auteur'] ?>
        </h3>

        <?php echo '<img width="400" height="200"src="assets/img/'.$data['nom_de_limage'].'.jpg"  title="" alt="" />'; ?>
        
        <p>
            <br>
            <?= $data['content'] ?>
        </p>
    </div>
    <br>
<?php
}
?>

<?php
while ($data2 = $chapitre->fetch())
{
?>
    <div class="container">
        <div class="news">
            <h3>
                <?= htmlspecialchars($data2['title']) ?>
                <em>le <?= $data2['creation_date_fr'] ?></em>
            </h3>
        
        <?php echo '<img width="350" height="200"src="assets/img/'.$data2['nom_de_limage'].'.jpg"  title="" alt="" />'; ?>

            <p>
                <br>
                <?php 
                    $length = nl2br(substr($data2['content'], 0, 352)); 
                    echo $length;
                ?>
                <em><a class="button3" href="index.php?action=showPost&amp;id=<?= $data2['id'] ?>">[...]</a></em>
            </p>
        </div>
        <br>
    </div>
<?php
}
$chapitre->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require(VIEWFRONT.'template.php'); ?>