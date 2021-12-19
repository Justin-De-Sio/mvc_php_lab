<?php

function getPosts()
{
    $user = 'root';
    $pass = '';
    $dbname = 'test';
    $host = 'localhost';
    try {
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;
}
