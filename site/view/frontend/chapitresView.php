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
    
       <?php echo '<img width="350" height="200"src="assets/img/'.$data['nom_de_limage'].'.jpg"  title="" alt="" />'; ?>

        <p>
            <?php 
                $length = nl2br(substr($data['content'], 0, 438)); 
                echo $length . ".......";
            ?>
            <br />
            <em><a href="contenu?action=showPost&amp;id=<?= $data['id'] ?>">Suite</a></em>
        </p>
    </div>
<?php
}
$chapitre->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require(VIEWFRONT.'template.php'); ?>