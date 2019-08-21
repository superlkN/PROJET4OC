<?php 

namespace P4OC\site\Model;

class Manager 
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=projet4_oc;charset=utf8', 'root', '');
        return $db;
    }
}