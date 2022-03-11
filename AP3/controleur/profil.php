<?php
include_once 'modele/rapport.inc.php';

$tabrapport = daorapport::getrapportbyidvisiteur();

$visiteur = daovisiteur::getVisiteurByLogin($_SESSION['login']);

//appel des fichiers de la vue
include './vue/entete.php';
include './vue/profil.php';
include './vue/pied.php';
?>