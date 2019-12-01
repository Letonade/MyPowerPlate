<?php
function Produit_Insert($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'INSERT INTO produit VALUES (
	'.sqlStrNull($obj->IdProduit()).'
	, '.sqlStrNull($obj->Libelle()).'
	, '.sqlStrNull($obj->Categorie()).'
	, '.sqlStrNull($obj->Marque()).'
	, '.sqlStrNull($obj->Quantite()).'
	, '.sqlStrNull($obj->PrixUnitaire()).'
	, '.sqlStrNull($obj->Tva()).'
	, '.sqlStrNull($obj->Description()).'
	, '.sqlStrNull($obj->Reference()).'
	, '.sqlStrNull($obj->LienImage()).')';
	if ($res = $connQuery->link->query($sql)) {
		$obj->IdProduit(mysqli_insert_id($connQuery->link));
		$obj = Produit_SelectOne($obj);
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, insert failed.');
	}
}

function Produit_Update($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'UPDATE produit SET 
	idProduit = '.sqlStrNull($obj->IdProduit()).'
	, libelle = '.sqlStrNull($obj->Libelle()).'
	, categorie = '.sqlStrNull($obj->Categorie()).'
	, marque = '.sqlStrNull($obj->Marque()).'
	, quantite = '.sqlStrNull($obj->Quantite()).'
	, prixUnitaire = '.sqlStrNull($obj->PrixUnitaire()).'
	, tva = '.sqlStrNull($obj->Tva()).'
	, description = '.sqlStrNull($obj->Description()).'
	, reference = '.sqlStrNull($obj->Reference()).'
	, lienImage = '.sqlStrNull($obj->LienImage()).'
	WHERE 
	idProduit = '.$obj->IdProduit().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, update failed.');
	}
}

function Produit_Delete($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'DELETE FROM produit WHERE 
	idProduit = '.$obj->IdProduit().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return(NULL);
	}else{unset($connQuery);
		return('error, delete failed.');
	}
}

function Produit_SelectAll()
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM produit ORDER BY produit.categorie';
	$temp_coll = array();
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj = new Produit;
			$temp_obj->IdProduit($val['idProduit']);
			$temp_obj->Libelle($val['libelle']);
			$temp_obj->Categorie($val['categorie']);
			$temp_obj->Marque($val['marque']);
			$temp_obj->Quantite($val['quantite']);
			$temp_obj->PrixUnitaire($val['prixUnitaire']);
			$temp_obj->Tva($val['tva']);
			$temp_obj->Description($val['description']);
			$temp_obj->Reference($val['reference']);
			$temp_obj->LienImage($val['lienImage']);
			array_push($temp_coll, $temp_obj);
		}
		return $temp_coll;
	}
	else
	{
		unset($connQuery);
		return('error, select all failed.');
	}
	unset($connQuery);
	return(1);
}

function Produit_SelectOne($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new Produit;
	$sql = 'SELECT * FROM produit WHERE 
	idProduit = '.$obj->IdProduit().'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj->IdProduit($val['idProduit']);
			$temp_obj->Libelle($val['libelle']);
			$temp_obj->Categorie($val['categorie']);
			$temp_obj->Marque($val['marque']);
			$temp_obj->Quantite($val['quantite']);
			$temp_obj->PrixUnitaire($val['prixUnitaire']);
			$temp_obj->Tva($val['tva']);
			$temp_obj->Description($val['description']);
			$temp_obj->Reference($val['reference']);
			$temp_obj->LienImage($val['lienImage']);
		}
		return $temp_obj;
	}
	else
	{
		unset($connQuery);
		return('error, select one failed.');
	}
	unset($connQuery);
	return(1);
}

function Produit_AllCol($obj)
{
	return('idProduit
		, libelle
		, categorie
		, marque
		, quantite
		, prixUnitaire
		, tva
		, description
		, reference
		, lienImage');
}

?>