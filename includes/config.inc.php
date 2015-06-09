<?php
// Q_RBEX: config


error_reporting(E_WARNING | E_ERROR);



// Pour l'utilisation en local.
$host = 'localhost';
$dbname = 'q-rbex';
$user = 'root';
$password = 'root';


// Pour l'utilisation en ligne.
//$host = 'mettre vos identifiants';
//$dbname = 'mettre vos identifiants';
//$user = 'mettre vos identifiants';
//$password = 'mettre vos identifiants';



try{
	$connexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Si je m'affiche, c'est que mon script a réussi a se connecter à mysql <br />";
} catch(PDOException $e){
	echo $e->getMessage();
}