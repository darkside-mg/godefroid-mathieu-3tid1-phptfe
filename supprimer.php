<?php

// PAGE SUPPRIMER.PHP



//SESSION START
	session_start();
	error_reporting(E_WARNING | E_ERROR);
	error_reporting(E_ALL); ini_set('display_errors',1);

	// On récupère "config.inc.php" et "functions.inc.php"
	include ('includes/common.app.php');


	$id =$_SESSION['id'];

	$delete=$connexion->prepare("DELETE FROM compte_user WHERE id = $id");
	$delete->bindValue(':id',$id,PDO::PARAM_INT);
	$delete->execute();
	session_destroy();
	unset($_SESSION);
	header("Location: index.php");
	exit();





