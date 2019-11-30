<?php
class Vue{

private $var_id_vue;
private $var_password;
private $var_vue_name;
private $var_last_actif_date;
private $var_actif;

public function IdVue(){
	if (func_num_args() > 0) {$this->var_id_vue = func_get_arg(0);}
	else {return($this->var_id_vue);}
}

public function Password(){
	if (func_num_args() > 0) {$this->var_password = func_get_arg(0);}
	else {return($this->var_password);}
}

public function VueName(){
	if (func_num_args() > 0) {$this->var_vue_name = func_get_arg(0);}
	else {return($this->var_vue_name);}
}

public function LastActifDate(){
	if (func_num_args() > 0) {$this->var_last_actif_date = func_get_arg(0);}
	else {return($this->var_last_actif_date);}
}

public function Actif(){
	if (func_num_args() > 0) {$this->var_actif = func_get_arg(0);}
	else {return($this->var_actif);}
}

}
?>