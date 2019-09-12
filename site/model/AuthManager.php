<?php

namespace P4OC\site\Model;

require_once(MODEL."Manager.php");

class AuthManager extends Manager 
{
    public function getUser($pseudo, $mail, $mdp_hash) {
        
        $db = $this->dbConnect();
        $insertmbr = $db->prepare("INSERT INTO users(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
        $insertmbr->execute(array($pseudo, $mail, $mdp_hash));

        return $insertmbr;
    }

    public function getMail($mail)
    {
        $db = $this->dbConnect();
        $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();

        return $reqmail;
    }

    public function checkLoginManager($mailconnect)
    {
        $db = $this->dbConnect();
        $requser = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $requser->execute(array($mailconnect));
        $userinfo = $requser->fetch();
        $userexist = $requser->rowCount();

        return $requser;
    }

    /*
    public function dashboardManager($getid)
    {
        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $db = $this->dbConnect();
            $getid = intval($_GET['id']);
            $requser = $db->prepare('SELECT * FROM users WHERE id = ?');
            $requser->execute(array($getid));
        }
    }
    */ 
}