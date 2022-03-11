<?php
include_once 'modele/medecin.php';
include_once 'modele/medecin.inc.php';

//l'ensemble des medecins
$listemed = daomedecin::getmedecin();

//appel des fichiers de la vue
include './vue/entete.php';
include './vue/medecin.php';
include './vue/pied.php';
?>