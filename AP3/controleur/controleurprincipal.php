<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["rapport"] = "rapport.php";
    $lesActions["medecin"] = "medecin.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["modifmedecin"] = "modifmedecin.php";
    $lesActions["modifrapport"] = "modifrapport.php";
    $lesActions["rapmed"] = "rapmed.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}
?>