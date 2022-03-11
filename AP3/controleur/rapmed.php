<?php
include_once "./modele/medecin.inc.php";
include_once "./modele/rapport.inc.php";

//recuperation du medecin pour l'affichage dans les encadrés
if(isset($idmedecin))
{
    $med = daomedecin::getmedecinbyid($idmedecin);

    $lesrapports = daorapport::getrapportbyidmed($idmedecin);
}

//appel des fichiers de la vue
include './vue/entete.php';
include './vue/rapmed.php';
include './vue/pied.php';
?>