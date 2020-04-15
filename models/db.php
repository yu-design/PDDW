<?php

function getDb(){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=bedeprog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}catch (Exception $e){
		die('Erreur de connection à la base de donnée : ' . $e->getMessage());
	}
}

$db = getDb();

?>