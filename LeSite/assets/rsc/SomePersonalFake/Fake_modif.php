<?php
		include '../../../assets/inc/application_include.php';

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

		/**
		 * TEST
		 */
		class TEST
		{
			private $A;

			public function A(){
				if (func_num_args() > 0) {$this->A = func_get_arg(0);}
				else {return($this->A);}
			}
		}

?>