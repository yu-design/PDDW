USE bedeprog

SELECT * FROM utilisateur

INSERT INTO utilisateur (Login, Nom, Prenom, Pseudo, Pass, Adresse,CP,Ville,RoleUtilisateur_ID)
VALUES ('Alex', 'Test', 'Vendeur1', 'Vendeur1', 'Julien', 'Rue d\'ici ou d\'ailleur, 10', 7100, 'La Louvière', 2);

INSERT INTO utilisateur (Login, AdresseMail, Nom, Prenom, Pass, RoleUtilisateur_ID, Actif)
VALUES ('Julien', 'info@yu-design.be', 'Deyaert', 'Julien', 'coco', 3, 1);

INSERT INTO utilisateur (Login, AdresseMail, Nom, Prenom, Pass, RoleUtilisateur_ID, Actif)
VALUES ('Inactif', 'info@yu-design.be', 'Deyaert', 'Julien', 'coco', 3, 0);

UPDATE utilisateur SET Actif = 0 WHERE ID = 1;

SELECT ID, Login, RoleUtilisateur_ID, Pass, Actif FROM utilisateur WHERE Login = "Admin" AND Actif = 0;
SELECT ID, Login, RoleUtilisateur_ID, Pass, Actif FROM utilisateur WHERE Login = "Inactif" AND Actif = 1;

SELECT * FROM utilisateur WHERE login = 'Client1';

UPDATE utilisateur SET Login="coucou", Nom="coucou", Prenom="coucou", Pseudo="coucou2", Pass="$2y$10$ndduLl9SozjVECD9ETH/vuFNT4kO3n2RekW3HGjrXfnBButZfYIsG", DateNaissance="2020-05-04", AdresseMail="coucou@loulou.com", Adresse="", CP, Ville, NumTelephone, Actif=TRUE WHERE Login = "Inactif";