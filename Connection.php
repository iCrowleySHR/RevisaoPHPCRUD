<?php

$dbname = 'empresa';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

class Connection{
    public static $pdo; // Chama no proprio arquivo nesse trecho:pdo = New...
    public static function connect($dbname,$dbuser,$dbpass,$dbhost){
        try {
            self::$pdo = New PDO("mysql:dbname=".$dbname.";host=".$dbhost,$dbuser,$dbpass);
        } catch (\PDOException $th) {
            echo "Erro de conexão: ".$th->getMessage();
        } catch (\Exception $th) {
            echo "Erro generico: ".$th->getMessage();
        }
    }
    
}

Connection::connect($dbname, $dbuser, $dbpass, $dbhost);
