<?php $title = htmlspecialchars($chapitre['title']); ?>
 
<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="home">Retour à la liste des billets</a></p>
 
<div class="news">
    <h3>
        <?= htmlspecialchars($chapitre['title']) ?>
        <em>le <?= $chapitre['creation_date_fr'] ?></em>
    </h3>

    <?php echo '<img width=700" height="450"src="assets/img/'.$chapitre['nom_de_limage'].'.jpg"  title="" alt="" />'; ?>
     
    <p>
        <?= nl2br(htmlspecialchars($chapitre['content'])) ?>
    </p>
</div>
 
<h2>Commentaires</h2>
 
<?php
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
 
<?php
}
?>
<a href="comment">Ajoutez un commentaire</a>
<?php $content = ob_get_clean(); ?>
 
<?php require(VIEWFRONT.'template.php'); ?>