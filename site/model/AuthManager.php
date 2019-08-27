<?php

class AuthManager extends Manager 
{

    public function setUser($username, $password, $email)
    {
        $db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO user (username, pw, email) VALUES(?, ?, ?)');
        $affectedLines = $req->execute(array($username, $password, $email));
        
		return $affectedLines;
    }
}