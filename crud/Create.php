<?php
// ============================= Inserção =============================
// Usando STATIC FUNCTION

class Create
{
    // Método para inserir na tabela departamento
    //  Inserção por meio do método query();
    public static function insertDepartamento($value)
    {
        Connection::$pdo->query("INSERT INTO departamento (nomeDepartamento) VALUES ('$value')");
    }

    // Método que insere cargos na tabela.
    // Inserção com método prepare(), mas validação por meiode bindParam().
    public static function insertCargo($value)
    {
        $insert = Connection::$pdo->prepare("INSERT INTO cargo (nomeCargo) VALUES (:nome)");
        $insert->bindParam(":nome", $value);
        $insert->execute();
    }

    // Método para inserir funcionarios novos no banco de dados
    //  Inserção utilizando método prepare(), com validação por meio de bindValue()
    public static function insertFuncionario($cpf, $nome, $telefone, $endereco, $codCargo, $codDepartamento)
    {
        $insert = Connection::$pdo->prepare("INSERT INTO funcionario (cpf, nome, telefone, endereco,codCargo,codDepartamento) VALUES (:cpf, :nome, :tel, :ende, :codC, :codD )");
        $insert->bindValue(":cpf", $cpf);
        $insert->bindValue(":nome", $nome);
        $insert->bindValue(":tel", $telefone);
        $insert->bindValue(":ende", $endereco);
        $insert->bindValue(":codC", $codCargo);
        $insert->bindValue(":codD", $codDepartamento);
        $insert->execute();
    }
}

//====================================================================================
//  Inserção por meio do método query();
Create::insertDepartamento('Auxiliar');
Create::insertDepartamento('Contador');
Create::insertDepartamento('Faz-Tudo');
Create::insertDepartamento('Faz-Nada');
Create::insertDepartamento('Auxiliar docente');

//====================================================================================
// Inserção com método prepare(), mas validação por meio de bindParam().
Create::insertCargo("Dono");
Create::insertCargo("CEO");
Create::insertCargo("Ex-dono");
Create::insertCargo("Esposa do dono");
Create::insertCargo("Auxiliar");

//====================================================================================
//  Inserção utilizando método prepare(), com validação por meio de bindValue()
Create::insertFuncionario("11122233344", "Angela Rodrigues", "11223345", "Rua A, 123", 3, 5);
Create::insertFuncionario("55544433322", "Maria Oliveira", "99887755", "Avenida B, 456", 2, 2);
Create::insertFuncionario("99988877766", "Pedro Santos", "66778890", "Travessa C, 789", 3, 1);
Create::insertFuncionario("33322211100", "William dos Sanros", "55442211", "Praça D, 1011", 2, 3);
Create::insertFuncionario("77788899911", "João da Silva", "33445577", "Alameda E, 1213", 4, 2);