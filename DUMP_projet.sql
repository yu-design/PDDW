DROP DATABASE IF EXISTS bedeprog;
CREATE DATABASE bedeprog;
USE bedeprog;

CREATE TABLE roleUtilisateur(
	ID INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Nom VARCHAR(255) NULL
)ENGINE=INNODB;

CREATE TABLE utilisateur(
	ID INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Nom VARCHAR(255) NOT NULL,
	Prenom VARCHAR(255) NOT NULL,
	Pseudo VARCHAR(255) NULL,
	Pass VARCHAR(255) NULL,
	DateNaissance DATE NULL,
	AdresseMail VARCHAR(255) NULL,
	Adresse VARCHAR(255) NULL,
	CP INTEGER(11) NULL,
	Ville VARCHAR(255) NULL,
	NumTelephone INTEGER(15) NULL,
	RoleUtilisateur_ID INTEGER(11) NOT NULL REFERENCES roleUtilisateur(ID)
)ENGINE=INNODB;

CREATE TABLE paiement(
	ID INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ModeDePaiement VARCHAR(255) NULL
)ENGINE=INNODB;

CREATE TABLE vente(
	ID INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	DateTransaction DATETIME NOT NULL,
	Utilisateur_ID INTEGER(11) NOT NULL REFERENCES utilisateur(ID),
	Paiement_ID INTEGER(11) NOT NULL REFERENCES paiement(ID),
	StatutVente INTEGER(11) NULL
)ENGINE=INNODB;

CREATE TABLE typeArticle(
	ID INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Nom VARCHAR(255) NULL
)ENGINE=INNODB;

CREATE TABLE article(
	ID INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	EAN VARCHAR(13) NOT NULL,
	ISBN VARCHAR(17) NULL,
	TypeArticle_id INTEGER(11) NOT NULL REFERENCES typeArticle(ID),
	Titre VARCHAR(255) NULL,
	Auteur VARCHAR(255) NULL,
	Dessinateur VARCHAR(255) NULL,
	Edition VARCHAR(255) NULL,
	Collection VARCHAR(255) NULL,
	Prix FLOAT(11) NULL,
	Visible BOOLEAN
)ENGINE=INNODB;

CREATE TABLE venteArticle(
	ID INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Vente_ID INTEGER(11) NOT NULL REFERENCES vente(ID),
	Article_ID INTEGER(11) NOT NULL REFERENCES article(ID),
	PrixArticle FLOAT(11) NULL
)ENGINE=INNODB;


INSERT INTO roleUtilisateur (Nom) VALUES ('Admin');
INSERT INTO roleUtilisateur (Nom) VALUES ('Employe');
INSERT INTO roleUtilisateur (Nom) VALUES ('client');

INSERT INTO utilisateur (Nom, Prenom, Pseudo,DateNaissance,Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Admin', 'Julien', 'yu-design', '1987-07-01', 'Rue d\'ici ou d\'ailleur, 8', 7100, 'La Louvière', 1);

INSERT INTO utilisateur (Nom, Prenom, Pseudo,Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Test', 'Vendeur1', 'Vendeur1', 'Rue d\'ici ou d\'ailleur, 10', 7100, 'La Louvière', 2);

INSERT INTO utilisateur (Nom, Prenom, Pseudo, Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Test', 'Vendeur2', 'Vendeur2', 'Rue d\'ici ou d\'ailleur, 10', 7100, 'La Louvière', 2);

INSERT INTO utilisateur (Nom, Prenom, Pseudo, Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Test', 'Client1', 'Client1', 'Rue des acheteurs, 1', 7100, 'La Louvière', 3);

INSERT INTO utilisateur (Nom, Prenom, Pseudo, Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Test', 'Client2', 'Client2', 'Rue des acheteurs, 3', 7100, 'La Louvière', 3);

INSERT INTO utilisateur (Nom, Prenom, Pseudo, Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Test', 'Client3', 'Client3', 'Rue des acheteurs, 5', 7100, 'La Louvière', 3);

INSERT INTO utilisateur (Nom, Prenom, Pseudo, Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Test', 'Client4', 'Client4', 'Rue des acheteurs, 7', 7100, 'La Louvière', 3);

INSERT INTO typeArticle (Nom) VALUES ('Bande dessinée');
INSERT INTO typeArticle (Nom) VALUES ('Comics');
INSERT INTO typeArticle (Nom) VALUES ('Manga');

INSERT INTO article (EAN, ISBN, TypeArticle_id, Titre, Auteur, Dessinateur, Edition, Collection, Prix, Visible)
VALUES ('9782505015932', '978-2-505-01593-2', 1, 'Naruto collector Tome 1','Masashi Kishimoto', 'Masashi Kishimoto', 'KANA', 'SHONEN', 14.90, 1);

INSERT INTO article (EAN, ISBN, TypeArticle_id, Titre, Auteur, Dessinateur, Edition, Collection, Prix, Visible)
VALUES ('9782505015949', '978-2-505-01594-9', 1, 'Naruto collector Tome 2', 'Masashi Kishimoto', 'Masashi Kishimoto', 'KANA', 'SHONEN', 14.90, 1);

INSERT INTO article (EAN, ISBN, TypeArticle_id, Titre, Auteur, Dessinateur, Edition, Collection, Prix, Visible)
VALUES ('9782505016045', '978-2-505-01604-5', 1, 'Naruto collector Tome 3', 'Masashi Kishimoto', 'Masashi Kishimoto', 'KANA', 'SHONEN', 14.90, 1);

SELECT * FROM article