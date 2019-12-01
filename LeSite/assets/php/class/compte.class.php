<?php
class Compte{

private $var_idCompte;
private $var_login;
private $var_password;
private $var_profil;

public function IdCompte(){
	if (func_num_args() > 0) {$this->var_idCompte = func_get_arg(0);}
	else {return($this->var_idCompte);}
}

public function Login(){
	if (func_num_args() > 0) {$this->var_login = func_get_arg(0);}
	else {return($this->var_login);}
}

public function Password(){
	if (func_num_args() > 0) {$this->var_password = func_get_arg(0);}
	else {return($this->var_password);}
}

public function Profil(){
	if (func_num_args() > 0) {$this->var_profil = func_get_arg(0);}
	else {return($this->var_profil);}
}

}
?>