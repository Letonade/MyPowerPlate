<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_produit";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
 // la fonction  mysqli_connect_error() permet de retourner l'erreur de connexion
    echo "Echec de Connexion : " . mysqli_connect_error();
}
if(!empty($_GET["reference"])){
    //Supprimer le livre dont l'id est envoyé avec l'URL
	$refs = mysqli_real_escape_string($conn,$_GET["reference"]);
	$sql = "DELETE FROM produit WHERE reference=$refs";
	if (mysqli_query($conn, $sql)) {
    	$message= "Le produit a été supprimé avec succés";
	} else {
        // la fonction mysqli_error() permet de savoir l'erreur
    	$message="Erreur pendant la suppression du produit: " . mysqli_error($conn);
	}
   header("Location:ajout_produit.php?message=$message");

}
