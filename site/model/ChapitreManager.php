<?php 

namespace P4OC\site\Model;

require_once("model/Manager.php");

class ChapitreManager extends Manager
{
    public function getChapitres()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapitres ORDER BY creation_date ASC LIMIT 0, 10');

        return $req;
    }

    public function getChapitre($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapitres WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addChapitre()
    {

    }

    public function updateChapitre() 
    {

    }

    public function deleteChapitre()
    {

    }
}