<?php
// ============================= Inserção =============================
class Create
{
    // Método para inserir na tabela departamento
    public static function insertDepartamento($value)
    {
        Connection::$pdo->query("INSERT INTO departamento (nomeDepartamento) VALUES ('$value')");
    }

    // Método que insere cargos na tabela.
    public static function insertCargo($value)
    {
        $insert = Connection::$pdo->prepare("INSERT INTO cargo (nomeCargo) VALUES (:nome)");
        $insert->bindParam(":nome", $value);
        $insert->execute();
    }

    public static function insertFuncionario($funcional, $cpf, $nome, $telefone, $endereco, $codCargo, $codDepartamento)
    {
        $insert = Connection::$pdo->prepare("INSERT INTO funcionario (funcional, cpf, nome, telefone, endereco,cargo_codCargo, departamento_codDepartamento) VALUES (:func, :cpf, :nome, :tel, :ende, :codC, :codD )");
        $insert->bindValue(":func", $funcional);
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
Create::insertDepartamento('Auxiliar-Docente');

//====================================================================================
// Inserção com método prepare(), mas validação por meiode bindParam().
// Variaveis aux
$cargos = [
    'cargo1' => "dono",
    'cargo2' => "CEO",
    'cargo3' => "Ex-Dono",
    'cargo4' => "Esposa do Dono",
    'cargo5' => "Funcionario"
];
foreach ($cargos as $cargo) {
    Create::insertCargo($cargo);
}

//====================================================================================
//  Inserção utilizando método prepare(), com validação por meio de bindValue()
Create::insertFuncionario("123456", "11122233344", "João Silva", "1122334455", "Rua A, 123", "1", "1");
Create::insertFuncionario("654321", "55544433322", "Maria Oliveira", "9988776655", "Avenida B, 456", "2", "2");
Create::insertFuncionario("987654", "99988877766", "Pedro Santos", "6677889900", "Travessa C, 789", "3", "1");
Create::insertFuncionario("135792", "33322211100", "Ana Pereira", "5544332211", "Praça D, 1011", "2", "3");
Create::insertFuncionario("246810", "77788899911", "Carla Souza", "3344556677", "Alameda E, 1213", "1", "2");

