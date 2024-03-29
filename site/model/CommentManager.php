<?php
namespace P4OC\site\Model;
  
require_once("Manager.php");
  
class CommentManager extends Manager
{

    /**
     *  Récupère les commentaires présent dans la table comments
     * 
     * @param int $postId Id du chapitre
     * 
     * @return int return l'id 
     * 
     */

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
  
    /**
     *  Ajoute un commentaire dans la bdd
     * 
     * @param int $postId Id du chapitre
     * @param String $author auteur du commentaire
     * @param String $comment contenu du commentaire
     * 
     * @return array return l'auteur, le contenu et l'id
     * 
     */

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, report) VALUES(?, ?, ?, NOW(), 0)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
     
    /**
     *  Récupère un seul commentaire de la table comments
     * 
     * @param int $id identifiant de l'entité
     * 
     * @return int return l'id  
     * 
     */

   public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();
        
        return $comment;
    }

    /**
     *  Incrémente de 1 dans la bdd sur le champ report de la table comments
     * 
     * @param int $id identifiant de l'entité
     * 
     * @return int return l'id 
     * 
     */

    public function reportComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET report = report + 1 WHERE id = ?');
        $req->execute(array($id));
        $reported = $req->fetch();

        return $reported;
    }

    /**
     *  Récupère tout les commentaires qui ont été report
     * 
     * @return String return les commentaires 
     * 
     */

    public function getReportedComments()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE report >= 1 ORDER BY report DESC');
        $req->execute();
        

        return $req;
    }

    /**
     *  Supprime un commentaire 
     * 
     * @param int $id identifiant de l'entité
     * @return int return l'id 
     * 
     */

    public function deleteComments($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($id));

        return $req;
    }

    /**
     *  Remet à 0 le champ report 
     * 
     * @param int $id identifiant de l'entité
     * @return int return l'id
     * 
     */

    public function resetComments($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET report = 0 WHERE id = ?');
        $req->execute(array($id));
        $reset = $req->fetch();

        return $reset;
    }
}