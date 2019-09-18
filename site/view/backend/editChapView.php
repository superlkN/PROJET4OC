<?php $title = 'Modifier un commentaire' ?>
  
<?php ob_start(); ?>

<?php session_start() ?>

<h1>Mon super blog !</h1>
<p><a href="index.php?action=showDash&id=<?=$_SESSION['id'] ?>">Retour au dashboard</a></p>
    
<h2>Modifier <?= $chapitre['title'] ?></h2>
 
    <form action="index.php?action=modifyChapitre&amp;id=<?= $chapitre['id'] ?>" method="post">
    <div>
        <textarea id="textarea" class="content" name="content"><?= $chapitre['content'] ?></textarea>
    </div>
    <div>
        <input type="submit" value="Modifier" />
    </div>
</form>

<script>
tinymce.init({
    selector: '#textarea',
    height:500,
    forced_root_block : false,
    force_br_newlines : true,
    force_p_newlines : false,
    
});
</script>
  
<?php $content = ob_get_clean(); ?>
  
<?php require('template.php'); ?>