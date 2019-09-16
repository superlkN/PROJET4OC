<?php

namespace P4OC\site\Model;

require_once(MODEL."Manager.php");

class AuthManager extends Manager 
{
    public function getUser($pseudo, $mail, $mdp_hash) {
        
        $db = $this->dbConnect();
        $insertmbr = $db->prepare("INSERT INTO users(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
        $insertmbr->execute(array($pseudo, $mail, $mdp_hash));
        $memberinfo = $insertmbr->fetch();

        return $insertmbr;
    }

    public function getMail($mail)
    {
        $db = $this->dbConnect();
        $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailinfo = $reqmail->fetch();

        return $mailinfo;
    }

    public function checkLoginManager($mailconnect)
    {
        $db = $this->dbConnect();
        $requser = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $requser->execute(array($mailconnect));
        $userinfo = $requser->fetch();

        return $userinfo;
    }

    public function dashboardManager($getid)
    {
        $db = $this->dbConnect();
        $requser = $db->prepare('SELECT * FROM users WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();

        return $userinfo;
    }
     
}