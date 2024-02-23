create database empresa;
use empresa;

create table cargo(
	nomeCargo varchar(50) not null,
    codCargo int(11) primary key auto_increment
);

create table departamento(
	nomeDepartamento varchar(45) not null,
    codDepartamento int(11) primary key auto_increment
);

create table funcionario(
	funcional int(11) not null,
    cpf char(11) not null unique,
    nome varchar(40) not null,
    telefone char(15) not null,
    endereco varchar(70) not null,
    
    cargo_codCargo int(11) not null,
    constraint FK_cargo_funcionario foreign key(cargo_codCargo) references cargo(codCargo),
    
    departamento_codDepartamento int(11) not null,
    constraint FK_departamento foreign key(departamento_codDepartamento) references departamento(codDepartamento)
);

select * from funcionario;
select * from departamento;
select * from cargo;