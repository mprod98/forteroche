<?php

class Manager
{
    protected function dbConnect()
    {
        require ('config.php');
        $db = new PDO('mysql:host='.$CONFIG['host'].';dbname='.$CONFIG['dbname'].';charset=utf8',$CONFIG['user'], $CONFIG['password']);
        return $db;
        
   
    }
   

}