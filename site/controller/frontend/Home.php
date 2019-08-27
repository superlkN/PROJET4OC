<?php
// Chargement des classes
require_once(MODEL.'ChapitreManager.php');
require_once(MODEL.'CommentManager.php');


class Home 
{
    public function showHome()
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->getChapitres();
        $auteur = $chapitreManager->getAuteur();
  
        require(VIEWFRONT.'chapitresView.php');
    }
    public function showPost()
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $commentManager = new P4OC\site\Model\CommentManager();
    
        $chapitre = $chapitreManager->getChapitre($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']); 
    
        require(VIEWFRONT.'chapView.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new P4OC\site\Model\CommentManager();
    
        $affectedLines = $commentManager->postComment($postId, $author, $comment);
    
        if($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location:chapitre?action=showPost&id=' . $postId);
        }
    } 
}
     

  
    