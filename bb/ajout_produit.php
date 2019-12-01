<?php
$servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "gestion_produit";

// Création de la  connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST["libelle"]) && isset($_POST["categorie"]) && isset($_POST["marque"]) && isset($_POST["quantite"]) && isset($_POST["prixUnitaire"]) && isset($_POST["tva"]) && isset($_POST["description"]) )
{
//La fonction mysqli_real_escape_string est utilisée pour créer une chaîne 
//SQL valide qui pourra être utilisée dans une requête SQL. La chaîne de caractères 
//escapestr est encodée en une chaîne SQL échappée,en tenant compte du jeu de caractères courant de la connexion. 
// elle échappe les caractères spéciaux (ajoute antislash devant l'apostrophe, etc. 
  $libelle = mysqli_real_escape_string($conn,$_POST["libelle"]);
  $categorie = mysqli_real_escape_string($conn,$_POST["categorie"]);
  $marque = mysqli_real_escape_string($conn,$_POST["marque"]);
  $quantite = mysqli_real_escape_string($conn,$_POST["quantite"]);
  $prixUnitaire = mysqli_real_escape_string($conn,$_POST["prixUnitaire"]);
  $tva = mysqli_real_escape_string($conn,$_POST["tva"]);
  $description = mysqli_real_escape_string($conn,$_POST["description"]);
  
 if(preg_match("#^[A-Z]([A-Za-z])+$#", $libelle)){
  $sql = "INSERT INTO produit (libelle, categorie, marque, quantite, prixUnitaire, description)
  VALUES ('$libelle', '$categorie', '$marque', '$quantite', '$prixUnitaire', '$description')";
        
    //exécuter la requête d'insertion
  if (mysqli_query($conn, $sql)) {
      echo "Le produit a été ajouté  avec succès";
  } else {
      echo "Erreur d'insertion " ;
  }
}
else if(!preg_match("#^[A-Z]([A-Za-z])+$#", $libelle)) { 
    echo "<p style ='color:red'>le produit n'est pas valide </p>";
}
}
if(isset($_GET["message"])){
  $message=$_GET["message"];
        echo "<p style ='color:red'>".$message . "</p>";
}
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Exercice PHP</title>
  <meta charset="utf-8">
<style type="text/css">
  /* Des styles pour la mise en forme de la page*/  
     td,th{
      width: 100px;
      text-align: center;
      border: 1px solid black;
     }
  </style>
</head>
<body>
        <table>
        <tr>
        <th>Référence</th>
        <th>Libellé</th>
        <th>Catégorie</th>
        <th>Marque</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Description</th>
        <th colspan="2">Opérations</th>
        </tr>
        
        <!-- Récupération de la liste des livres  -->
        <?php
       $sql = "SELECT * FROM produit";
  $result = mysqli_query($conn, $sql);           
  if (mysqli_num_rows($result) > 0) {
      // Parcourir les lignes de résultat
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["reference"]. "</td><td>" . $row["libelle"]. 
             "</td><td>" . $row["categorie"]."</td><td>" . $row["marque"] . "</td><td>" . $row["quantite"]."</td><td>" . $row["prixUnitaire"]."</td><td>" . $row["description"]."</td><td><a href=\"modif.php?reference=".$row["reference"]."\">Modifier</a></td>"
        ."</td><td><a href=supp.php?reference=".$row["reference"]. ">Supprimer</a></td></tr>";
      }
    // Le lien Modifier envoie vers la page modif.php avec l'id du livre
   // Le lien Supprimer envoie vers la page supp.php avec l'id du livre

  } 
  ?>  
   </table> 
</body>
</html>
