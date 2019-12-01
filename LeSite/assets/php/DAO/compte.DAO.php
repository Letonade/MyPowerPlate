<?php
function Compte_Insert($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'INSERT INTO compte VALUES (
	'.sqlStrNull($obj->IdCompte()).'
	, '.sqlStrNull($obj->Login()).'
	, '.sqlStrNull($obj->Password()).'
	, '.sqlStrNull($obj->Profil()).')';
	if ($res = $connQuery->link->query($sql)) {
		$obj->IdCompte(mysqli_insert_id($connQuery->link));
		$obj = Compte_SelectOne($obj);
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, insert failed.');
	}
}

function Compte_Update($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'UPDATE compte SET 
	idCompte = '.sqlStrNull($obj->IdCompte()).'
	, login = '.sqlStrNull($obj->Login()).'
	, password = '.sqlStrNull($obj->Password()).'
	, profil = '.sqlStrNull($obj->Profil()).'
	WHERE 
	idCompte = '.$obj->IdCompte().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, update failed.');
	}
}

function Compte_Delete($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'DELETE FROM compte WHERE 
	idCompte = '.$obj->IdCompte().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return(NULL);
	}else{unset($connQuery);
		return('error, delete failed.');
	}
}

function Compte_SelectAll()
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM compte';
	$temp_coll = array();
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj = new Compte;
			$temp_obj->IdCompte($val['idCompte']);
			$temp_obj->Login($val['login']);
			$temp_obj->Password($val['password']);
			$temp_obj->Profil($val['profil']);
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

function Compte_SelectOne($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new Compte;
	$sql = 'SELECT * FROM compte WHERE 
	idCompte = '.$obj->IdCompte().'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj->IdCompte($val['idCompte']);
			$temp_obj->Login($val['login']);
			$temp_obj->Password($val['password']);
			$temp_obj->Profil($val['profil']);
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

function Compte_FindOneByLoginAndProfil($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM compte WHERE 
	login = '.sqlStrVide($obj->Login()).' 
	AND profil = '.sqlStrVide($obj->Profil()).'
	';
	if ($res = $connQuery->link->query($sql))
	{
		unset($connQuery);
		return ($res->num_rows > 0 ? 1 : 0);
	}
	else
	{
		unset($connQuery);
		return("erreur de connexion;");
	}
	unset($connQuery);
	return(1);
}

function Compte_SelectOneByLoginAndPasswordAndProfil($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new Compte;
	$sql = 'SELECT * FROM compte WHERE 
	login = '.sqlStrVide($obj->Login()).' 
	AND profil = '.sqlStrVide($obj->Profil()).'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			if (password_verify($obj->Password(), $val['password'])) {
				$temp_obj->IdCompte($val['idCompte']);
				$temp_obj->Password($obj->Password());
				$temp_obj->Login($val['login']);
			}
		}
		return $temp_obj;
	}
	else
	{
		unset($connQuery);
		return('error, Find failed.');
	}
	unset($connQuery);
	return(1);
}

function Compte_AllCol($obj)
{
	return('idCompte
		, login
		, password
		, profil');
}

?>