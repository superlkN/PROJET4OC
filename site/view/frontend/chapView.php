<?php $title = htmlspecialchars($chapitre['title']); ?>
 
<?php ob_start(); ?>

<div>
    <div class="headerChap">

        <h1>Mon voyage en Alaska</h1>

        <?php if (isset($_SESSION['isadmin']) && isset($_SESSION['id']) && $_SESSION['isadmin'] == 1) { ?>
            <ul>
                <li><a href="index.php?action=showDash&id=<?=$_SESSION['id'] ?>">Dashboard</a></li>
                <li><a href="index.php?action=logout">Se déconnecter</a></li>
            </ul>
        <?php } ?>

    </div>

    <div class="container">
        <p><a class="button1" id="buttonRetour" href="index.php">Retour à la liste des billets</a></p>
        <div class="news">
            <h3>
                <?= htmlspecialchars($chapitre['title']) ?>
                <em>le <?= $chapitre['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= $chapitre['content'] ?>
            </p>
        </div>
        
        <div class="commentsChap">
            <h2>Commentaires</h2>
            <form action="index.php?action=addComment&amp;id=<?php echo $_GET['id']; ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input class="inputComments" type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea class="areaComments" id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input class="button1" type="submit" />
                </div>
            </form>
            
            <?php
            while ($comment = $comments->fetch())
            {
            ?>
                <div class="comments">
                    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    <a class="button2" id="signaler" href="index.php?action=report&amp;id=<?= $comment['id'] ?>"> Signaler </a>
                </div>
            <?php
            }
            ?>
            
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
 
<?php require(VIEWFRONT.'template.php'); ?>