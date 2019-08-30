<?php

namespace P4OC\site\Model;

require_once(MODEL."Manager.php");

class AuthManager extends Manager 
{
    public function setUser()
    {
        $username = $_POST["user"];
        $password = $_POST["pw"];
        
        $db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO user (username, pw) VALUES(?, ?)');
        $affectedLines = $req->execute(array($username, $password));
        
		return $affectedLines;
    }
}