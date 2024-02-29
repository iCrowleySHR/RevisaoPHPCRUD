create database empresa;
use empresa;

create table cargo(
	nomeCargo varchar(50) not null,
    codCargo int(11) auto_increment primary key
);

create table departamento(
	nomeDepartamento varchar(45) unique not null,
    codDepartamento int(11) primary key auto_increment
);

create table funcionario(
	funcional int(11) auto_increment primary key,
    cpf char(11) unique not null,
    nome varchar(40) not null,
    telefone char(15),
    endereco varchar(70) not null,
    
    codCargo int(11) not null,
    constraint fkcargoFunc foreign key(codCargo) references cargo(codCargo),
    
    codDepartamento int(11) not null,
    constraint fkfuncDepto foreign key(codDepartamento) references departamento(codDepartamento)
);