<!DOCTYPE html>
<html>
<head>
      <title>Exercice PHP</title>
      <meta charset="utf-8">
<body>
    <a href ="ajout_produit.php">Afficher la liste des produits </a>
      <form action="ajout_produit.php" method="POST">
            <fieldset>
            <legend>Ajouter un produit</legend>
            <label for="libelle">Libellé</label>
            <input type="text" id="libelle" name="libelle" required autofocus><br/>

            <label for="categorie">Catégorie </label>
            <input type="text" id="categorie" name="categorie" required=""><br/>

            <label for="marque">Marque </label>
            <input type="text" id="marque" name="marque" required=""><br/>

            <label for="quantite">Quantité </label>
            <input type="text" id="quantite" name="quantite" required=""><br/>

            <label for="prixUnitaire">Prix unitaire </label>
            <input type="text" id="prixUnitaire" name="prixUnitaire" required=""><br/>

            <label for="tva">TVA </label>
            <input type="text" id="tva" name="tva" required=""><br/>

            <label for="description">Description </label>
            <input type="text" id="description" name="description" required=""><br/>            

            <input type="submit" value="Ajouter">
            </fieldset>
      </form>
</body>
</html>
