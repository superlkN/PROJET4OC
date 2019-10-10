<?php 

namespace P4OC\site\Model;

class Manager 
{
    /**
     *  Connexion à la base de donnée
     * 
     * @return $db
     * 
     */

    protected function dbConnect()
    {
        $db = new \PDO(DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER , DBPASSWD);
        return $db;
    }
}