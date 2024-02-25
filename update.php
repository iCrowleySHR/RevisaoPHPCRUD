<?php
// ============================== Update ==============================
// NÃO Usando STATIC FUNCTION
class Update
{
    // Método para atualizar tabela departamento
    public function updateDepartamento($nomeD, $id)
    {
        $update = Connection::$pdo->prepare("UPDATE departamento SET nomeDepartamento = :nomeD WHERE codDepartamento = :codD");
        $update->bindValue(":nomeD", $nomeD);
        $update->bindValue(":codD", $id);
        $update->execute();
    }

    // Método para mudar o nomeCargo atraves do id 
    public function updateCargo($attCargo,$id)
    {
        $update = Connection::$pdo->prepare("UPDATE cargo SET nomeCargo = :att WHERE codCargo= :codC");
        $update->bindValue(":att", $attCargo);
        $update->bindValue(":codC", $id);
        $update->execute();
    }

    // Método que muda a posição dos cargos
    public function updatePosicaoCargo($oldId,$newId)
    {
        $update = Connection::$pdo->prepare("UPDATE cargo SET codCargo = :new WHERE codCargo = :old");
        $update->bindValue(":old", $oldId);
        $update->bindValue(":new", $newId);
        $update->execute();
    }

    public function updatePosicaoFuncionario($oldId, $newId){
        $update = Connection::$pdo->prepare("UPDATE funcionario SET codFuncionario = :new WHERE codFuncionario = :old");
        $update->bindValue(":old", $oldId);
        $update->bindValue(":new", $newId);
        $update->execute();
    }

    public function updatePosicaoFuncionarioCpf($oldId, $newId, $cpf){
        $update = Connection::$pdo->prepare("UPDATE funcionario SET codFuncionario = :new WHERE codFuncionario = :old");
        $update->bindValue(":old", $oldId);
        $update->bindValue(":new", $newId);
        $update->execute();

        $update = Connection::$pdo->prepare("UPDATE funcionario SET cpf = :cpf WHERE codFuncionario = :id");
        $update->bindValue(":cpf", $cpf);
        $update->bindValue(":id", $newId);
        $update->execute();
    }

}

// =======================================================================================
$functions = new Update;

// O departamento de codigo 05, deve ser denominado de “Gerencia de projetos”
$functions -> updateDepartamento('Gerencia de projetos',5);

// O cargo Cozinheiro deve ser o registro 02 da sua tabela
$functions -> updateCargo('Cozinheiro',2);

// O cargo “Gerente de Projetos” deve ser a linha 01 da sua tabela.
$functions -> updatePosicaoCargo(5,1);

// O funcionario “Milton Neves” deve estar alocado na linha 04 da sua tabela.
$functions -> updatePosicaoFuncionario(1,4);

// A funcionaria “Etelvina Hernandez” deve estaralocada na linha 02 da sua tabela.
$functions -> updatePosicaoFuncionario(5,2);

// O funcionario “Rock Balboa” deve ser o registro 03 da sua tabela e possuir o cpf 888555666-00
$functions -> updatePosicaoFuncionarioCpf(4,3,'88855566600');
