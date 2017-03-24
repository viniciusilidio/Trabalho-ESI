CREATE DATABASE IF NOT EXISTS Transportadora;
USE Transportadora;

CREATE TABLE Veiculos (
	Placa VARCHAR(8) NOT NULL,
	Tipo VARCHAR(10) NOT NULL,
	Data_aq VARCHAR(10) NOT NULL,
	Descricao VARCHAR(255),
	Status ENUM('Livre','Ocupado','Manutenção','Outro'),
	PRIMARY KEY(Placa)
);

CREATE TABLE Clientes (
	Nome VARCHAR(30) NOT NULL,
	Sobrenome VARCHAR(30) NOT NULL,
	Rua VARCHAR(45) NOT NULL,
	Numero SMALLINT UNSIGNED,
	Complemento VARCHAR(15),
	Bairro VARCHAR(15) NOT NULL,
	Cidade VARCHAR(20) NOT NULL,
	UF ENUM('MG', 'SP', 'RJ', 'ES' , 'BA', 'PR', 'SC', 'RS', 'GO', 'AC') NOT NULL,
	CEP VARCHAR(9) NOT NULL,
	CPF VARCHAR(14) NOT NULL,
	Telefone VARCHAR(15),
	PRIMARY KEY (CPF)
);

CREATE TABLE Encomendas (
	CPF_Remetente VARCHAR(14) NOT NULL,
	CPF_Destinatario VARCHAR(14) NOT NULL,
	Veiculo VARCHAR(8) NOT NULL,
	Peso DOUBLE(3,1) NOT NULL,
	Dimensao ENUM('XP','P','M','G','XG','Tubo','Carta/Envelope') NOT NULL,
	Data_envio VARCHAR(10),
	Data_entrega VARCHAR(10),
	Status ENUM('Em preparação','Entregue','A caminho','Erro'),
	Descricao VARCHAR(255),
	Codigo INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(Codigo)
);

ALTER TABLE Encomendas
ADD CONSTRAINT CPF_Remetente
FOREIGN KEY (CPF_Remetente)
REFERENCES Clientes(CPF)
ON UPDATE CASCADE;

ALTER TABLE Encomendas
ADD CONSTRAINT CPF_Destinatario
FOREIGN KEY (CPF_Destinatario)
REFERENCES Clientes(CPF)
ON UPDATE CASCADE;

ALTER TABLE Encomendas
ADD CONSTRAINT Veiculo
FOREIGN KEY (Veiculo)
REFERENCES Veiculos(Placa)
ON UPDATE CASCADE;


-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Pesquisas do Banco=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

--Busca de Veículos
SELECT * FROM Veículos;

--Busca de Clientes
SELECT * FROM Clientes;

--Busca de Encomendas
SELECT Placa,VD,CPF_Remetente,Nome RNome, Sobrenome RSobrenome,Rua RRua,Numero RNumero,Complemento RComplemento,Bairro RBairro,Cidade RCidade,UF RUF,CEP RCEP,Telefone RTelefone,CPF_Destinatario,DNome,DSobrenome,DRua,DNumero,DComplemento,DBairro,DCidade,DUF,DCEP,DTelefone,Peso,Dimensao,Codigo,ES,ED,Data_envio,Data_entrega FROM Clientes JOIN ( SELECT Placa,VD,CPF_Remetente,CPF_Destinatario, Nome DNome, Sobrenome DSobrenome,Rua DRua, Numero DNumero, Complemento DComplemento, Bairro DBairro, Cidade DCidade, UF DUF, CEP DCEP, Telefone DTelefone,Peso,Dimensao,Codigo,ES,ED,Data_envio,Data_entrega FROM Clientes JOIN ( SELECT Placa,Veiculos.Descricao VD,CPF_Remetente,CPF_Destinatario,Peso,Dimensao,Codigo,Encomendas.Status ES,Encomendas.Descricao ED,Data_envio,Data_entrega FROM Veiculos JOIN Encomendas ON Veiculo = Placa ) AS T1 ON CPF = CPF_Destinatario ) AS T2 ON Clientes.CPF = CPF_Remetente;
