<?php

namespace P4OC\site\Model;

require_once(MODEL."Manager.php");

class AuthManager extends Manager 
{
    /**
     *  Insère un pseudo, mail et un mot de passe dans la base de donnée
     * 
     * @param String $pseudo Pseudo du nouvel utilisateur
     * @param String $mail Mail du nouvel utilisateur
     * @param String $mdp_hash Mot de passe du nouvel utilisateur
     *  
     * @return $memberinfo
     * 
     */

    public function getUser($pseudo, $mail, $mdp_hash) {
        
        $db = $this->dbConnect();
        $insertmbr = $db->prepare("INSERT INTO users(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
        $insertmbr->execute(array($pseudo, $mail, $mdp_hash));
        $memberinfo = $insertmbr->fetch();

        return $memberinfo;
    }
    
    /**
     *  Vérification du mail de l'utilisateur présent en BDD
     * 
     * @param String $mail Mail de l'utilisateur
     * 
     * @return $mailinfo
     * 
     */

    public function getMail($mail)
    {
        $db = $this->dbConnect();
        $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailinfo = $reqmail->fetch();

        return $mailinfo;
    }

    /**
     *  Vérification du mail de l'utilisateur présent en BDD
     * 
     * @param String $mailconnect Mail de l'utilisateur
     * 
     * @return $userinfo
     * 
     */

    public function checkLoginManager($mailconnect)
    {
        $db = $this->dbConnect();
        $requser = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $requser->execute(array($mailconnect));
        $userinfo = $requser->fetch();

        return $userinfo;
    }

    /**
     *  Récupère l'id de l'utilisateur en BDD
     * 
     * @param int $getid Id de l'utilisateur
     *  
     * @return $userinfo
     * 
     */

    public function dashboardManager($getid)
    {
        $db = $this->dbConnect();
        $requser = $db->prepare('SELECT * FROM users WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();

        return $userinfo;
    }
     
}