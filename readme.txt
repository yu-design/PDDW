Pour bien démarrer
------------------

Base de donnée créée avec sqlyog
Pour charge la base de donnée, modifier la ligne _____________ dans le fichier ________.php

Version de PHP utilisé
======================
Utilisation de XAMPP Control Pannel v3.2.4
Version de PHP 5.2.0
Version de base de données ; MariaDB 


Modifications à effectuer dans index
====================================
Modification à la ligne permettant d'accéder au controlers via l'index : define('ROOT_PATH', "/PDDW/");


Modifications à effectuer dans db.php
=====================================
Modifier le chemin d'accès à la DB
Login actuel : ROOT
Pass actuel : ""

Type d'utilisateur existant pour effectuer des tests :
Admin		Login : Admin		Pass : test
Vendeur		Login : Vendeur1	Pass : test
User		Login : Client2		Pass : test





Reste à faire :
===============
- Modification utilisateur
- Administration utilisateur
- Tout le traitement article (Ajouter un article, modifier un article, mettre en inactif un article)
	+ images,...
- Effectuer une commande
- Valider une commande
- Modifier un prix et vérifier qu'il ne modifie pas la commande du client
- panier
- Statistique de vente

Extra souhaité par moi :
- Mode de paiement (paypal test)
- Carte de fidélité
- Favoris du client (Indiquer quand un article n'est plus disponible)