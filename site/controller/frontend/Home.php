<?php
// Chargement des classes
require_once(MODEL.'ChapitreManager.php');
require_once(MODEL.'CommentManager.php');



    function showHome()
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->getChapitres();
        $auteur = $chapitreManager->getAuteur();
  
        require(VIEWFRONT.'chapitresView.php');
    }
    function showPost()
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $commentManager = new P4OC\site\Model\CommentManager();
    
        $chapitre = $chapitreManager->getChapitre($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']); 
    
        require(VIEWFRONT.'chapView.php');
    }

    function addComment($postId, $author, $comment)
    {
        $commentManager = new P4OC\site\Model\CommentManager();
    
        $affectedLines = $commentManager->postComment($postId, $author, $comment);
    
        if($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location:index.php?action=showPost&id=' . $postId);
            exit;
        }
    } 

    function report($id)
    {
        $commentManager = new P4OC\site\Model\CommentManager();
        $comment = $commentManager->reportComment($id);

    }

     

  
    