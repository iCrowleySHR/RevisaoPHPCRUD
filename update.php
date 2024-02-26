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

    // Método para mudar todos os dados inseridos anteriormente na tabela funcionario
    public function updateFuncionario($funcional,$cpf, $nome, $telefone, $endereco){
        $update = Connection::$pdo->prepare("UPDATE funcionario SET 
        cpf = :cpf,
        nome = :nome,
        telefone = :telefone,
        endereco = :endereco 
        WHERE funcional= :funcional");
        $update->bindValue(":cpf", $cpf);
        $update->bindValue(":nome",$nome);
        $update->bindValue(":telefone",$telefone);
        $update->bindValue(":endereco",$endereco);
        $update->bindValue(":funcional",$funcional);
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
$functions -> updateCargo('Gerente de Projetos',1);

// O funcionario “Milton Neves” deve estar alocado na linha 04 da sua tabela.
$functions -> updateFuncionario(4, '15878987584', 'Milton Neves', '11968558524', 'Rua Da Alegria');

// A funcionaria “Etelvina Hernandez” deve estar alocada na linha 02 da sua tabela.
$functions -> updateFuncionario(2, '2040807584', 'Etelvina Hernandez', '11975718524', 'Rua Da Vida');

// O funcionario “Rock Balboa” deve ser o registro 03 da sua tabela e possuir o cpf 888555666-00
$functions -> updateFuncionario(3, '88855566600', 'Rock Balboa', '11440455824', 'Rua Da Sorte');
