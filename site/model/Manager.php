<?php 

namespace P4OC\site\Model;

class Manager 
{
    protected function dbConnect()
    {
        $db = new \PDO(DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER , DBPASSWD);
        return $db;
    }
}