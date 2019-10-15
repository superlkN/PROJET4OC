<?php 

namespace P4OC\site\Model;

class Manager 
{
    /**
     *  Connexion à la base de donnée
     * 
     * @return PDO return la connexion à la bdd
     * 
     */

    protected function dbConnect()
    {
        $db = new \PDO(DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER , DBPASSWD);
        return $db;
    }
}