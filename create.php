<?php

// ============================= Inserção =============================

// Variaveis aux
$cargo =[
    'cargo1' => "dono",
    'cargo2' => "CEO",
    'cargo3' => "Ex-Dono",
    'cargo4' => "Esposa do Dono",
    'cargo5' => "Funcionario"
];

//  Inserção por meio do método query();
$pdo->query("INSERT INTO departamento (nomeDepartamento) VALUES ('Secreatario')");
$pdo->query("INSERT INTO departamento (nomeDepartamento) VALUES ('Contador')");
$pdo->query("INSERT INTO departamento (nomeDepartamento) VALUES ('Auxiliar')");
$pdo->query("INSERT INTO departamento (nomeDepartamento) VALUES ('Faz-tudo')");
$pdo->query("INSERT INTO departamento (nomeDepartamento) VALUES ('Gerente')");

// Inserção com método prepare(), mas validação por meiode bindParam().
$insert = $pdo->prepare("INSERT INTO cargo (nomeCargo) VALUES (:nome)");
$insert->bindParam(":nome",$cargo['cargo1']);
$insert->execute();

$insert = $pdo->prepare("INSERT INTO cargo (nomeCargo) VALUES (:nome)");
$insert->bindParam(":nome",$cargo['cargo2']);
$insert->execute();

$insert = $pdo->prepare("INSERT INTO cargo (nomeCargo) VALUES (:nome)");
$insert->bindParam(":nome",$cargo['cargo3']);
$insert->execute();

$insert = $pdo->prepare("INSERT INTO cargo (nomeCargo) VALUES (:nome)");
$insert->bindParam(":nome",$cargo['cargo4']);
$insert->execute();

$insert = $pdo->prepare("INSERT INTO cargo (nomeCargo) VALUES (:nome)");
$insert->bindParam(":nome",$cargo['cargo5']);
$insert->execute();

//  Inserção utilizando método prepare(), com validação por meio de bindValue()

// 1
$insert = $pdo->prepare("INSERT INTO funcionario (funcional, cpf, nome, telefone, endereco,cargo_codCargo, departamento_codDepartamento)
VALUES (:func, :cpf, :nome, :tel, :ende, :codC, :codD )");

$insert->bindValue(":func","564541");
$insert->bindValue(":cpf","11111121111");
$insert->bindValue(":nome","Gustavo Sachetto");
$insert->bindValue(":tel","1158743244");
$insert->bindValue(":ende","Rua Dcimal");
$insert->bindValue(":codC","2");
$insert->bindValue(":codD","1");
$insert->execute();

// 2
$insert = $pdo->prepare("INSERT INTO funcionario (funcional, cpf, nome, telefone, endereco,cargo_codCargo, departamento_codDepartamento)
VALUES (:func, :cpf, :nome, :tel, :ende, :codC, :codD )");

$insert->bindValue(":func","353535");
$insert->bindValue(":cpf","11111411111");
$insert->bindValue(":nome","Geovanni Pereira");
$insert->bindValue(":tel","1158783246");
$insert->bindValue(":ende","Rua Francis");
$insert->bindValue(":codC","4");
$insert->bindValue(":codD","3");
$insert->execute();

// 3
$insert = $pdo->prepare("INSERT INTO funcionario (funcional, cpf, nome, telefone, endereco,cargo_codCargo, departamento_codDepartamento)
VALUES (:func, :cpf, :nome, :tel, :ende, :codC, :codD )");

$insert->bindValue(":func","5454541");
$insert->bindValue(":cpf","11111151111");
$insert->bindValue(":nome","Maria paula");
$insert->bindValue(":tel","1158783247");
$insert->bindValue(":ende","Rua José qui");
$insert->bindValue(":codC","2");
$insert->bindValue(":codD","4");
$insert->execute();

// 4
$insert = $pdo->prepare("INSERT INTO funcionario (funcional, cpf, nome, telefone, endereco,cargo_codCargo, departamento_codDepartamento)
VALUES (:func, :cpf, :nome, :tel, :ende, :codC, :codD )");

$insert->bindValue(":func","1111135");
$insert->bindValue(":cpf","11111111911");
$insert->bindValue(":nome","José Rodrigues");
$insert->bindValue(":tel","54646565654");
$insert->bindValue(":ende","Rua Lucas");
$insert->bindValue(":codC","4");
$insert->bindValue(":codD","2");
$insert->execute();

// 5
$insert = $pdo->prepare("INSERT INTO funcionario (funcional, cpf, nome, telefone, endereco,cargo_codCargo, departamento_codDepartamento)
VALUES (:func, :cpf, :nome, :tel, :ende, :codC, :codD )");

$insert->bindValue(":func","6666694564");
$insert->bindValue(":cpf","11141111189");
$insert->bindValue(":nome","Mateus andré");
$insert->bindValue(":tel","1158783288");
$insert->bindValue(":ende","Rua Francisco c");
$insert->bindValue(":codC","2");
$insert->bindValue(":codD","3");
$insert->execute();