<?php

function Vue_Insert($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'INSERT INTO vue VALUES (
	'.sqlIntNull($obj->IdVue()).'
	, '.sqlStrNull($obj->Password()).'
	, '.sqlStrNull($obj->VueName()).'
	, '.sqlDateNull($obj->LastActifDate()).')';
	if ($res = $connQuery->link->query($sql)) 
	{
		$obj->IdVue(mysqli_insert_id($connQuery->link));
		$obj = Vue_SelectOne($obj);
		unset($connQuery);
		return($obj);
	}else
	{
		unset($connQuery);
		return('error, insert failed.');
	}
}

function Vue_Update($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'UPDATE vue SET 
	id_vue = '.sqlIntNull($obj->IdVue()).'
	, password = '.sqlStrNull($obj->Password()).'
	, vue_name = '.sqlStrNull($obj->VueName()).'
	, last_actif_date = '.sqlDateNull($obj->LastActifDate()).'
	WHERE 
	id_vue = '.$obj->IdVue().'
	';
	if ($res = $connQuery->link->query($sql)) 
	{
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, update failed.');
	}
}

function Vue_Delete($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'DELETE FROM vue WHERE 
	id_vue = '.$obj->IdVue().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return(NULL);
	}else{unset($connQuery);
		return('error, delete failed.');
	}
}

function Vue_SelectAll()
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM vue';
	$temp_coll = array();
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj = new Vue;
			$temp_obj->IdVue($val['id_vue']);
			$temp_obj->Password($val['password']);
			$temp_obj->VueName($val['vue_name']);
			$temp_obj->LastActifDate($val['last_actif_date']);
			array_push($temp_coll, $temp_obj);
		}
		return $temp_coll;
	}
	else
	{
		unset($connQuery);
		return('error, update failed.');
	}
	unset($connQuery);
	return(1);
}

function Vue_SelectOne($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new Vue;
	$sql = 'SELECT * FROM vue WHERE 
	id_vue = '.$obj->IdVue().'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj->IdVue($val['id_vue']);
			$temp_obj->Password($val['password']);
			$temp_obj->VueName($val['vue_name']);
			$temp_obj->LastActifDate($val['last_actif_date']);
		}
		return $temp_obj;
	}
	else
	{
		unset($connQuery);
		return('error, update failed.');
	}
	unset($connQuery);
	return(1);
}


function Vue_AllCol($obj)
{
	return('id_vue
		, password
		, vue_name
		, last_actif_date');
}

function Vue_SelectOneByNameAndPassword($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new Vue;
	$sql = 'SELECT * FROM vue WHERE 
	vue_name = '.sqlStrVide($obj->VueName()).'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			if (password_verify($obj->Password(), $val['password'])) {
				$temp_obj->IdVue($val['id_vue']);
				$temp_obj->Password($obj->Password());
				$temp_obj->VueName($val['vue_name']);
				$temp_obj->LastActifDate($val['last_actif_date']);
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

function Vue_FindOneByVueName($name)
{
	$connQuery = new APP_BDD;
	//$temp_obj = new Vue;
	$sql = 'SELECT * FROM vue WHERE 
	vue_name = '.sqlStrVide($name).'
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

?>