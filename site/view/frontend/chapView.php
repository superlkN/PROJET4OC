<?php $title = htmlspecialchars($chapitre['title']); ?>
 
<?php ob_start(); ?>

<?php session_start() ?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php if (isset($_SESSION['id'])) { ?>
    <p><a href="index.php?action=showDash&id=<?=$_SESSION['id'] ?>">Dashboard</a></p>
    <a href="index.php?action=logout">Se déconnecter</a>
<?php } ?>

<div class="news">
    <h3>
        <?= htmlspecialchars($chapitre['title']) ?>
        <em>le <?= $chapitre['creation_date_fr'] ?></em>
    </h3>

    <?php echo '<img width=700" height="450"src="assets/img/'.$chapitre['nom_de_limage'].'.jpg"  title="" alt="" />'; ?>
     
    <p>
        <?= $chapitre['content'] ?>
    </p>
</div>
 
<h2>Commentaires</h2>
 
<form action="index.php?action=addComment&amp;id=<?php echo $_GET['id']; ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
 
<?php
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <a href="index.php?action=report&amp;id=<?= $comment['id'] ?>"> Signaler </a>
 
<?php
}
?>

<?php $content = ob_get_clean(); ?>
 
<?php require(VIEWFRONT.'template.php'); ?>