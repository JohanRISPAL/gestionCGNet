CREATE DATABASE IF NOT EXISTS GestionTaches
CHARACTER SET utf8
COLLATE utf8_general_ci;

USE GestionTaches;

CREATE TABLE IF NOT EXISTS Client(
idClient int(11) NOT NULL AUTO_INCREMENT,
nomClient VARCHAR(64),
prenomClient VARCHAR(64),
collectiviteClient VARCHAR(64),
numeroClient VARCHAR(64),
autreNumeroClient VARCHAR(64),
emailClient VARCHAR(64),
PRIMARY KEY(idClient)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Machine(
idMachine int(11) NOT NULL AUTO_INCREMENT,
marqueMachine VARCHAR(64),
modeleMachine VARCHAR(64),
motDePasseMachine VARCHAR(64),
PRIMARY KEY(idMachine)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Tache(
idTache int(11) NOT NULL AUTO_INCREMENT,
titreTache VARCHAR(64),
descriptionTache TEXT,
notesTache TEXT,
coutTache TEXT,
prixTache TEXT,
dateDebutTache DATE,
dateFinTache DATE,
isUrgent TINYINT,
isStarted TINYINT,
isDone TINYINT,
idClient int(11),
idMachine int(11),
PRIMARY KEY(idTache),
CONSTRAINT Tache_idClient
FOREIGN KEY(idClient)
REFERENCES Client(idClient) ON DELETE CASCADE,
CONSTRAINT Tache_idMachine
FOREIGN KEY(idMachine)
REFERENCES Machine(idMachine)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;