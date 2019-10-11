<?php 

namespace P4OC\site\Model;

require_once(MODEL."Manager.php");

class ChapitreManager extends Manager
{

    /**
     *  Récupère tout les chapitres en bdd
     * 
     * @return $req
     * 
     */

    public function getChapitres() 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapitres ORDER BY creation_date ASC LIMIT 0, 10');
        $req->execute();

        return $req;
    }

    /**
     *  Récupère un seul chapitre en bdd
     * 
     * @param int $postId Id du chapitre
     * @return $post
     * 
     */

    public function getChapitre($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapitres WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
     *  Récupère l'auteur dans la table auteur
     * 
     * @return $req
     * 
     */

    public function getAuteur()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, nom_auteur, content, nom_de_limage FROM auteur');
        $req->execute();
        
        return $req;
    }

    /**
     *  Ajoute un chapitre dans la bdd
     * 
     * @param String $title titre du chapitre
     * @param String $content contenu du chapitre
     * 
     * @return $req
     * 
     */

    public function addChapitre($title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO chapitres(title, content, creation_date) VALUES (?, ?, NOW())");
        $req->execute(array($title, $content));

        return $req;
    }

    /**
     *  Met à jour un chapitre dans la bdd
     * 
     * @param String $title titre du chapitre
     * @param String $content contenu du chapitre
     * @param int $id identifiant de l'entité
     * 
     * @return $affectedChapitre
     * 
     */

    public function editChapitre($title, $content, $id) 
    {
        $db = $this->dbConnect();
        $chapitres = $db->prepare('UPDATE chapitres SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');
        $affectedChapitre = $chapitres->execute(array($title, $content, $id));

        return $affectedChapitre;
    }

    /**
     *  Supprime un chapitre dans la bdd
     * 
     * @param int $id identifiant de l'entité
     * 
     * @return $delete
     * 
     */

    public function deleteChapitre($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM chapitres WHERE id = ?');
        $req->execute(array($id));
        $delete = $req->fetch();

        return $delete;

    }
}