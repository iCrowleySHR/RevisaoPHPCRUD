<?php

// ============================== Delete ==============================

class Delete 
{
    private static $table; // variável para guardar o nome da tabela
    private static $column; // variável para guardar o nome da coluna

    public function __construct(String $table, String $column)
    {
        self::$table = $table;
        self::$column = $column;
    }
  
    public function deleteWithQuery(Int $id): void
    {
        // monta e executa o código sql de exclusão
        Connection::$pdo->query('DELETE FROM '.self::$table.' WHERE '.self::$column.' = '.$id);
    }

    public function deleteWithBindValue(Int $id): void
    {
        // prepara o código sql de exclusão
        $delete = Connection::$pdo->prepare('DELETE FROM '.self::$table.' WHERE '.self::$column.' = :id');

        // insere os parametros/valores
        $delete->bindValue(':id', $id);

        // executa
        $delete->execute();
    }

    public function deleteWithBindParam(Int $id): void
    {
        // prepara o código sql de exclusão
        $delete = Connection::$pdo->prepare('DELETE FROM '.self::$table.' WHERE '.self::$column.' = :id');

        // insere os parametros/valores
        $delete->bindParam(':id', $id);
        
        // executa
        $delete->execute();
    }
}

// ====================================================================

// instanciando uma nova classe Delete e passando nome da tabela e nome da coluna através do método construtor
$deleteFuncionario = new Delete('funcionario', 'funcional'); 

// delete1
$deleteFuncionario->deleteWithQuery(3);

// ====================================================================

$deleteDepartamento = new Delete('departamento', 'codDepartamento');

// delete2
$deleteDepartamento->deleteWithBindParam(1);

// delete3
$deleteDepartamento->deleteWithBindParam(4);

// ====================================================================

$deleteCargo = new Delete('cargo', 'codCargo');

// delete4
$deleteCargo->deleteWithBindValue(1);