<?php
/**
 * Created by PhpStorm.
 * User: rere
 * Date: 14/11/17
 * Time: 17:48
 */

class Database
{

    public $pdo;

    public function __construct()
    {
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try{

            $this->pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password);

        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }

}