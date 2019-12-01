<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_produit";

// Création de la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Tester la connexion
if (!$conn) {
   echo "Echec de Connexion" ;
}
//Après appel de la page on récupéré l'id du livre en question
if(isset($_GET["reference"])){
	//protection de données
	$ref = mysqli_real_escape_string($conn,$_GET["reference"]);
	$sql = "SELECT * FROM produit WHERE reference=$ref";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	// Récupérer des informations du livre en question qui seront par la suite afficher dans le formulaire en bas
        $row = mysqli_fetch_assoc($result);
        $reference=$row["reference"];
        $libelle=$row["libelle"];
        $categorie=$row["categorie"];
        $marque=$row["marque"];
        $quantite=$row["quantite"];
        $prixUnitaire=$row["prixUnitaire"];
        $tva=$row["tva"];
        $description=$row["description"];
    }  
        else{
        	//Si erreur envoie de message à la page ajout_livre.php
        $message="Le produit est introuvable";
        header("Location:ajout_produit.php?message=$message");
        }
    }
    // Après clic sur le bouton modifier on récupère les données envoyées par la méthode post
if(isset($_POST["libelle"]) && isset($_POST["categorie"]) && isset($_POST["marque"]) && isset($_POST["quantite"]) && isset($_POST["prixUnitaire"]) && isset($_POST["tva"]) && isset($_POST["description"]) ){
   
  $reference=mysqli_real_escape_string($conn, $_POST["reference"]);
	$libelle = mysqli_real_escape_string($conn,$_POST["libelle"]);
	$categorie = mysqli_real_escape_string($conn, $_POST["categorie"]);
	$marque = mysqli_real_escape_string($conn, $_POST["marque"]);
  $quantite = mysqli_real_escape_string($conn, $_POST["quantite"]);
  $prixUnitaire = mysqli_real_escape_string($conn, $_POST["prixUnitaire"]);
  $tva = mysqli_real_escape_string($conn, $_POST["tva"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);

         if(preg_match("#^[A-Z]([A-Za-z])+$#", $libelle)){
	$sql = "update produit set libelle='$libelle', categorie='$categorie' , marque='$marque' , quantite='$quantite' , prixUnitaire='$prixUnitaire' , tva='$tva' , description='$description' 
     WHERE reference=$reference";
    //executer le requete de l'update et redirection vers la page ajout_livre.php
	if (mysqli_query($conn, $sql)) {
    	$message= "Le produit a été mis à jour avec succes";
	} else {
    	$message = "Erreur de mise à jour " ;
	}
	header("Location:ajout_produit.php?message=$message");
}
else 
     echo "<p style ='color:red'>Le produit n'est pas valide </p>";
}
        ?>
<!--  Afficher le formulaire rempli par les données du livre récupéré en haut.-->
        <form name="exe" action="modif.php" method="post">
      		<fieldset>
      			<legend>Modifier un produit</legend>

      			<input type="hidden" id="reference" name="reference" value="<?php if(isset($reference)) { echo $reference; } ?>"><br/>

      			<label for="libelle">Libellé</label>
      			<input type="text" id="libelle" name="libelle" required value="<?php if(isset($libelle)) { echo $libelle; } ?>"><br/>

      			<label for="categorie">Catégorie</label>
      			<input type="text" id="categorie" name="categorie" required value="<?php if(isset($categorie)) { echo $categorie; } ?>"><br/>

            <label for="marque">Marque</label>
            <input type="text" id="marque" name="marque" required value="<?php if(isset($marque)) { echo $marque; } ?>"><br/>

            <label for="quantite">Quantité</label>
            <input type="text" id="quantite" name="quantite" required value="<?php if(isset($quantite)) { echo $quantite; } ?>"><br/>

            <label for="prixUnitaire">Prix Unitaire</label>
            <input type="text" id="prixUnitaire" name="prixUnitaire" required value="<?php if(isset($prixUnitaire)) { echo $prixUnitaire; } ?>"><br/>

            <label for="tva">TVA</label>
            <input type="text" id="tva" name="tva" required value="<?php if(isset($tva)) { echo $tva; } ?>"><br/>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" required value="<?php if(isset($description)) { echo $description; } ?>"><br/>
      			
      			<input Type="submit" value="Modifier">
      		</fieldset>
      </form>
