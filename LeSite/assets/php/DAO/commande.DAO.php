<?php
function Commande_Insert($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'INSERT INTO commande VALUES (
	'.sqlStrNull($obj->IdCommande()).'
	, '.sqlStrNull($obj->IdProduit()).'
	, '.sqlStrNull($obj->IdCompte()).'
	, '.sqlStrNull($obj->Commentaire()).'
	, '.sqlStrNull($obj->Quantite()).')';
	if ($res = $connQuery->link->query($sql)) {
		$obj->IdCommande(mysqli_insert_id($connQuery->link));
		$obj = Commande_SelectOne($obj);
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, insert failed.');
	}
}

function Commande_Update($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'UPDATE commande SET 
	idCommande = '.sqlStrNull($obj->IdCommande()).'
	, idProduit = '.sqlStrNull($obj->IdProduit()).'
	, idCompte = '.sqlStrNull($obj->IdCompte()).'
	, commentaire = '.sqlStrNull($obj->Commentaire()).'
	, quantite = '.sqlStrNull($obj->Quantite()).'
	WHERE 
	idCommande = '.$obj->IdCommande().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, update failed.');
	}
}

function Commande_Delete($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'DELETE FROM commande WHERE 
	idCommande = '.$obj->IdCommande().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return(NULL);
	}else{unset($connQuery);
		return('error, delete failed.');
	}
}

function Commande_SelectAll()
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM commande';
	$temp_coll = array();
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj = new Commande;
			$temp_obj->IdCommande($val['idCommande']);
			$temp_obj->IdProduit($val['idProduit']);
			$temp_obj->IdCompte($val['idCompte']);
			$temp_obj->Commentaire($val['commentaire']);
			$temp_obj->Quantite($val['quantite']);
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

function Commande_SelectOne($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new Commande;
	$sql = 'SELECT * FROM commande WHERE 
	idCommande = '.$obj->IdCommande().'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj->IdCommande($val['idCommande']);
			$temp_obj->IdProduit($val['idProduit']);
			$temp_obj->IdCompte($val['idCompte']);
			$temp_obj->Commentaire($val['commentaire']);
			$temp_obj->Quantite($val['quantite']);
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

function Commande_AllCol($obj)
{
	return('idCommande
		, idProduit
		, idCompte
		, commentaire
		, quantite');
}

?>