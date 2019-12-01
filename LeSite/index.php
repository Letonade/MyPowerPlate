<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	header('Location: ./compte_connexion.php');
	exit;
?>
Something is wrong with the App installation :-(

<!--Ce fichier est tous droit pomper des classic de xampp pour la redirection vers le dashboard-->
