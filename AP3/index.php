<?php
include_once "modele/pdo.inc.php";
include_once "modele/connexion.php";
include_once "controleur/controleurprincipal.php";

if (isset($_GET["action"])) {
    //recuperation de 'action' en methode get
    $action = $_GET["action"];

    if($action == "deconnexion"){
        logout();
        $action = "defaut";
    }
}
else {
    if(isset($_GET["idmedecinmod"]))   //recupere l'id medecin pour la modification
    {
        $idmedecin = $_GET["idmedecinmod"];
        $action = "modifmedecin";
    }
    elseif(isset($_GET["idrapport"]))   //recupere l'id rapport pour la modification de rapport
    {
        $idrapport = $_GET["idrapport"];
        $action = "modifrapport";
    }
    elseif(isset($_GET["idmedecinrap"]))    //recupere l'id medecin  pour l'affichage de ses rapports
    {
        $idmedecin = $_GET["idmedecinrap"];
        $action = "rapmed";
    }
    else
    {
        $action = "defaut";       
    }
}

if(isset($_POST["action"]))     //recupere l'action si elle est en methode post
{
    $action = $_POST["action"];
}

if(isLoggedOn())    //si l'utilisateur est connecter, il a acces au site, sinon il doit se connecter
{
    $fichier = controleurPrincipal($action);
    include_once "controleur/$fichier";
}
else
{
    include_once "controleur/connexion.php";
}

?>