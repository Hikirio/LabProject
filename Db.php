<?php
/**
 * Created by PhpStorm.
 * User: Анатолий
 * Date: 26.09.2018
 * Time: 17:37
 */

class Db
{

    const USER = "root";
    const PASS = "";
    const HOST = "127.0.0.1";
    const DB = "MihasProject";

    public static function connToDB()
    {

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host;charset=UTF8", $user, $pass);
        return $conn;

    }
}