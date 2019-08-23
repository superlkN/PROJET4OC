<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Voyage en Alaska !</h1>

<?php
while ($data = $auteur->fetch())
{
?>

    <div class="auteur">
        <h2> A propos de l'auteur : </h2>
        <h3>
            <?= $data['nom_auteur'] ?>
        </h3>

        <?php echo '<img width="400" height="200"src="assets/img/'.$data['nom_de_limage'].'.jpg"  title="" alt="" />'; ?>
        
        <p>
            <?= $data['content'] ?>
        </p>
    </div>

<?php
}
?>

<h2> Mes dernière publications :</h2>

<?php
while ($data2 = $chapitre->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data2['title']) ?>
            <em>le <?= $data2['creation_date_fr'] ?></em>
        </h3>
    
       <?php echo '<img width="350" height="200"src="assets/img/'.$data2['nom_de_limage'].'.jpg"  title="" alt="" />'; ?>

        <p>
            <?php 
                $length = nl2br(substr($data2['content'], 0, 438)); 
                echo $length . ".......";
            ?>
            <br />
            <em><a href="contenu?action=showPost&amp;id=<?= $data2['id'] ?>">Suite</a></em>
        </p>
    </div>
<?php
}
$chapitre->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require(VIEWFRONT.'template.php'); ?>