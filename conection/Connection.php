<?php

$dbname = 'empresa';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

class Connection{
    public static $pdo; // Chama no proprio arquivo nesse trecho:pdo = New...
    public static function config($dbname,$dbuser,$dbpass,$dbhost)
    {
        try {
            self::$pdo = New PDO("mysql:dbname=".$dbname.";host=".$dbhost,$dbuser,$dbpass);
            $result = 'Sucesso na conexão';
        } catch (\PDOException $th) {
            $result = 'Erro de conexão: '.$th->getMessage();
        } catch (\Exception $th) {
            $result = 'Erro genérico: '.$th->getMessage();
        } finally {
            echo '<script>console.log("'.$result.'");</script>';
        }
    }
}

Connection::config($dbname, $dbuser, $dbpass, $dbhost);