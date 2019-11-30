<?php $MyHomePath = (str_replace("\\", "/", explode("\\LeSite", realpath('./'))[0]."\\LeSite\\")); ?>

<?php // Constantes
define ("VUE_ID_LENGTH_MIN", 8);
define ("VUE_ID_LENGTH_MAX", 20);
define ("VUE_MDP_LENGTH_MIN", 4);
define ("VUE_MDP_LENGTH_MAX", 20);
?>

<?php include $MyHomePath.'assets/inc/BDD.php' ?>
<?php include $MyHomePath.'assets/inc/fonctions.php' ?>