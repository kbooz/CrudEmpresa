#CRUD
/*
empregado = <PK>cod_empregado</PK>, nome_empregado, salario, <FK>cod_departamento</FK>
departamento = <PK>cod_departamento</PK>, nome_departamento, <FK>cod_chefe</FK>
projeto = <PK>cod_projeto</PK>, nome_projeto, <FK>cod_lider</FK>
participa = <PK><FK>cod_projeto</FK>, <FK>cod_empregado</FK></PK>, bonus, horas
*/

CREATE TABLE empregado
(
	cod_empregado int NOT NULL AUTO_INCREMENT,
	nome_empregado varchar(20),
	salario real,
	cod_departamento int,
	CONSTRAINT pk_empregadoID PRIMARY KEY (cod_empregado)
);

CREATE TABLE departamento
(
	cod_departamento int NOT NULL AUTO_INCREMENT,
	nome_departamento varchar(20),
	cod_chefe int,
	CONSTRAINT pk_departamentoID PRIMARY KEY (cod_departamento),
	CONSTRAINT fk_departamentoCHEFE FOREIGN KEY (cod_chefe) REFERENCES empregado (cod_empregado)
);

ALTER TABLE empregado
ADD CONSTRAINT fk_empregadoDEPARTAMENTO FOREIGN KEY (cod_departamento) REFERENCES departamento (cod_departamento);

CREATE TABLE projeto
(
	cod_projeto int NOT NULL AUTO_INCREMENT,
	nome_projeto varchar(20),
	cod_lider int,
	CONSTRAINT pk_projetoID PRIMARY KEY (cod_projeto),
	CONSTRAINT fk_projetoLIDER FOREIGN KEY (cod_lider) REFERENCES empregado (cod_empregado)
);

CREATE TABLE participa
(
	cod_projeto int,
	cod_empregado int,
	bonus real,
	horas int,
	CONSTRAINT fk_participaPROJETO FOREIGN KEY (cod_projeto) REFERENCES projeto (cod_projeto),
	CONSTRAINT fk_participaEMPREGADO FOREIGN KEY (cod_empregado) REFERENCES empregado (cod_empregado),
	CONSTRAINT pk_participaID PRIMARY KEY (cod_projeto,cod_empregado)
);
