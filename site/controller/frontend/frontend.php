<?php
// Chargement des classes
require_once(MODEL.'ChapitreManager.php');
// require_once('model/CommentManager.php');
  
function listPosts()
{
    $chapitreManager = new P4OC\site\Model\ChapitreManager();
    $chapitre = $chapitreManager->getChapitres();
  
    require(VIEWFRONT.'chapitresView.php');
}
  
function post()
{
    $chapitreManager = new P4OC\site\Model\ChapitreManager();
   // $commentManager = new \TPBLOG\Model\CommentManager();
  
    $chapitre = $chapitreManager->getChapitre($_GET['id']);
   // $comments = $commentManager->getComments($_GET['id']); 
  
    require(VIEWFRONT.'chapitresView.php');
      
      
}