<?php

// ============== Gustavo Sachetto e Gustavo Gualda ==============

// Incluí arquivo de conexão
require 'conection/Connection.php';

// Incluí arquivo de inserção
include_once 'crud/Create.php';

// Inclui arquivo de atualização de dados
include_once 'crud/Update.php';

// Inclui arquivo de exclusão de dados
include_once 'crud/Delete.php';

// Inclui arquivo de leitura de dados
include_once 'crud/Read.php';

// Exibindo resultado das consultas
for ($i=0; $i < count($result); $i++) { 
    $consulta = $i + 1;
    echo "<h1>Resultado da Consulta {$consulta}:</h1>";
    echo "<pre>";
    print_r($result[$i]);
    echo "</pre>";
}