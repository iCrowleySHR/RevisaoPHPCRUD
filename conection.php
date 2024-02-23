<?php

$dbname = 'empresa';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$pdo;

try {
    $pdo = new PDO("mysql:dbname=".$dbname.";host=".$dbhost,$dbuser,$dbpass);
} catch (\PDOException $th) {
    echo "Erro de conexão: ".$th->getMessage();
} catch (\Exception $th) {
    echo "Erro generico: ".$th->getMessage();
}