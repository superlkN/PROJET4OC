<?php $title = 'Modifier un commentaire' ?>
  
<?php ob_start(); ?>

<?php session_start() ?>

<div class="headerDash">
    <h1> Espace Client - Modifier</h1>
    <ul>
        <li><a href="index.php?action=showDash&id=<?=$_SESSION['id'] ?>">Retour au dashboard</a></li>
        <li> <a href="index.php"> Blog </a> </li>
    </ul>
</div>
<div class="container">
    <br>   
    <h2>Modifier le <?= $chapitre['title'] ?></h2>
    
        <form action="index.php?action=modifyChapitre&amp;id=<?= $chapitre['id'] ?>" method="post">
        <div>
            <textarea id="textarea" class="content" name="content"><?= $chapitre['content'] ?></textarea>
        </div>
        <div>
            <br>
            <input class="button1" type="submit" value="Modifier" />
        </div>
    </form>
</div> 
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