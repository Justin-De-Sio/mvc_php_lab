<?php

namespace Funax\blogMVC\Model;
class Manager
{
    protected function dbConnect()
    {
        return new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
}