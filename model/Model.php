<?php
class Model{

    protected function dbconnect () {

        $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
        return $database;

    }
}