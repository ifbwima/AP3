<?php
include_once 'modele/medecin.inc.php';
include_once 'modele/rapport.inc.php';

$message = "";

//recuperation des variables pour la creation de rapport
if (isset($_POST["date"]) && isset($_POST["motif"]) && isset($_POST["bilan"]) && isset($_POST["medecin"])){
    $id = $_SESSION["id"];
    $date = $_POST["date"];
    $motif = $_POST["motif"];
    $bilan = $_POST["bilan"];
    $idmedecin = $_POST["medecin"];

    //si la creation marche alors on affiche le message
    if(daorapport::createrapport($id, $date, $motif, $bilan, $idmedecin))
    {
        $message = "Rapport Enregistré !";
    }
    else
    {
        $message = "Veuillez completer tous les champs";
    }   
}

//recuperation de la date pour la recherche de rapport
if(isset($_POST["date2"]))
{
    $listerapport = daorapport::getrapportbydate($_POST["date2"]);
    
}
if(isset($_POST["idrapport"]))
{
    print("reussi");
}

//l'ensemble des medecins 
$listemed = daomedecin::getmedecin();





//appel des fichiers de la vue
include './vue/entete.php';
include './vue/rapport.php';
include './vue/pied.php';
?>