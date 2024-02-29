<?php

// =============================== Read ===============================

class Read 
{
    private $join; // variável para guardar o inner join das tabelas
    private static $table; // variável para guardar o nome da tabela

    public function __construct(String $table)
    {
        self::$table = $table;
    }

    public function join(String $foreignTable, String $match, String $joinType = "INNER JOIN"): void
    {
        // concatena o INNER JOIN + TABELA + ON + COMPARAÇÃO
        $this->join .= " {$joinType} {$foreignTable} ON {$match} ";
    }

    public function select(String $fields = '*', String $where = null, String $order = null): array
    {
        // verifica se a váriavel existe e monta o bloco de código
        isset($where) ? $where = ' WHERE '.$where.' ' : $where = '';
        isset($order) ? $order = ' ORDER BY '.$order.' ' : $order = '';
        isset($this->join) ? $join = $this->join : $join = '';
        
        // montando o código de consulta no banco e executa
        $query = Connection::$pdo->query("SELECT {$fields} FROM ".self::$table.$join.$where.$order);

        // retorna a consulta em formato de array associativo
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

// =========================== Where/order ============================

// instanciando uma nova classe Read e passando nome da tabela através do método construtor
$selectCargo = new Read('cargo');

// consulta1
$result[] = $selectCargo->select('nomeCargo',null,'nomeCargo ASC');

// consulta2
$result[] = $selectCargo->select('*','codCargo IN (4,5)');

// consulta3
$selectFuncionario = new Read('funcionario');

$result[] = $selectFuncionario->select('nome, cpf, funcional','funcional IN (1,3,5)');

// consulta4
$selectDepartamento = new Read('departamento');

$result[] = $selectDepartamento->select();

// consulta5
$selectFuncionario = new Read('funcionario');

$result[] = $selectFuncionario->select('nome, funcional',null,'funcional ASC');

// ============================ Inner join ============================

// consulta6
$selectDepartamento = new Read('departamento');
$selectDepartamento->join('funcionario', 'departamento.codDepartamento = funcionario.codDepartamento');

$result[] = $selectDepartamento->select('departamento.nomeDepartamento, funcionario.nome');

// consulta7
$selectFuncionario = new Read('funcionario');
$selectFuncionario->join('cargo', 'cargo.codCargo = funcionario.codCargo');

$result[] = $selectFuncionario->select('funcionario.nome, funcionario.funcional, cargo.nomeCargo');

// consulta8
$selectFuncionario = new Read('funcionario');

$selectFuncionario->join('cargo', 'cargo.codCargo = funcionario.codCargo');
$selectFuncionario->join('departamento', 'departamento.codDepartamento = funcionario.codDepartamento');

$result[] = $selectFuncionario->select('funcional, nomeDepartamento,nomeCargo',null,'funcional ASC');