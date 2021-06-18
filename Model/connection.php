<?php
declare(strict_types=1);

//setting database connection
class Connection
{

    public static function openConnection(): PDO
    {

        $dbhost = "localhost";
        $dbuser = "becode";
        $dbpass = "becode";
        $db = "Product";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    }
}


