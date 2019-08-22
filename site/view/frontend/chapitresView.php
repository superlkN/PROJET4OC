<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Voyage en Alaska !</h1>
<p> Mes dernière publications :</p>

<?php
while ($data = $chapitre->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="contenu?action=showPost&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$chapitre->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require(VIEWFRONT.'template.php'); ?>