<?php
class Commande{

private $var_idCommande;
private $var_idProduit;
private $var_idCompte;
private $var_commentaire;
private $var_quantite;

public function IdCommande(){
	if (func_num_args() > 0) {$this->var_idCommande = func_get_arg(0);}
	else {return($this->var_idCommande);}
}

public function IdProduit(){
	if (func_num_args() > 0) {$this->var_idProduit = func_get_arg(0);}
	else {return($this->var_idProduit);}
}

public function IdCompte(){
	if (func_num_args() > 0) {$this->var_idCompte = func_get_arg(0);}
	else {return($this->var_idCompte);}
}

public function Commentaire(){
	if (func_num_args() > 0) {$this->var_commentaire = func_get_arg(0);}
	else {return($this->var_commentaire);}
}

public function Quantite(){
	if (func_num_args() > 0) {$this->var_quantite = func_get_arg(0);}
	else {return($this->var_quantite);}
}

}
?>