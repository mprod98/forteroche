<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=forteroche;charset=utf8', 'root', '');
        $password=password_hash('ani',PASSWORD_DEFAULT);
        $query=$db->prepare('INSERT INTO users (id, login, pass) VALUES(33, ?, ?)');
        $query->execute(['ani',$password]);
        return $db;
   
    }
   

}