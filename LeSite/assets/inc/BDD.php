<?php
Const APP_BDD_ADDRESSE 	= 'localhost';
Const APP_BDD_USER 		= 'root';
Const APP_BDD_PASSWORD 	= '';
Const APP_BDD_BASE 		= 'capsadomotique';

/**
 * Class d'objet bdd de base
 */
class APP_BDD
{
	
	public $link;

	function __construct()
	{
		$this->link = new mysqli(APP_BDD_ADDRESSE, APP_BDD_USER, APP_BDD_PASSWORD,APP_BDD_BASE);
		if (mysqli_connect_errno()) {
		    printf("//- Échec de la connexion : %s\n", mysqli_connect_error());
		    exit();
		}
	}

	public function __destruct()
	{
		$this->link->close();
	}


// Quelques fonctions un peu superflu mais bon, ca sert de rappel.
	function connectToBase()
	{
	    $link = mysqli_connect(APP_BDD_ADDRESSE, APP_BDD_USER, APP_BDD_PASSWORD);  
	    mysqli_select_db($link, APP_BDD_BASE) ;
	}

	function whatIsMyBddName()
	{
		// Connexion
		$mysqli = new mysqli(APP_BDD_ADDRESSE, APP_BDD_USER, APP_BDD_PASSWORD,APP_BDD_BASE);
		// En cas d'erreur
		if (mysqli_connect_errno()) {
		    printf("Échec de la connexion : %s\n", mysqli_connect_error());
		    exit();
		}
		// Ressort le nom de la base
		if ($result = $mysqli->query("SELECT DATABASE()")) {
		    $row = $result->fetch_row();
		    printf("La base de données courante est %s.\n", $row[0]);
		    $result->close();
		}
		$mysqli->close();
	}
}

?>