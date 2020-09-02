Pour bien démarrer
------------------

Base de donnée créée avec sqlyog

Pour créer un lien entre le site et la base de donnée, modifier la ligne 5 : $bdd = new PDO('mysql:host=localhost;dbname=bedeprog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); dans le fichier db.php qui se trouve dans les models.
A la place de 'root', indiquer votre login et mettre votre mots de passe entre les '' qui suivent.


Version de PHP utilisé
======================
Utilisation de XAMPP Control Pannel v3.2.4
Version de PHP 5.2.0
Version de base de données ; MariaDB 


Modifications à effectuer dans db.php
=====================================
Modifier le chemin d'accès à la DB
Login actuel : ROOT
Pass actuel : ""


Modifications à effectuer dans index
====================================
Modification à la ligne permettant d'accéder au controlers via l'index : define('ROOT_PATH', "/PDDW/");
Modifier la partie PDDW afin d'avoir accès via votre profil.


Installation du serveur
=======================
Editer le fichier hosts dans "C:\Windows\System32\drivers\etc" :

```
127.0.0.1 localhost  
::1 localhost  
127.0.0.1 monprojet.test
```


Ajouter à la fin du fichier "httpd-vhosts.conf":  
ajouter le chemin menant à votre propre dossier

```
<Directory "C:\xampp\htdocs\Sell_Instrument_ProjectWeb\project">  
AllowOverride All  
Options Indexes MultiViews FollowSymLinks  
Require all granted  
</Directory>  
```

```
<VirtualHost *:80>  
DocumentRoot C:\xampp\htdocs\Sell_Instrument_ProjectWeb\project  
ServerName instru.test  
</VirtualHost>  
```

url home : http://monprojet.test


Profil utilisables sur le site
==============================
Type d'utilisateur existant pour effectuer des tests :
Admin		Login : Admin		Pass : test
Vendeur		Login : Vendeur1	Pass : test
User		Login : Client2		Pass : test