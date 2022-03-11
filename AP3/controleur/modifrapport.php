<?php
include_once "./modele/rapport.inc.php";
include_once "./modele/medecin.inc.php";
include_once "./modele/offrir.inc.php";

//recuperation des données saisies et appelle de la fonction update
if (isset($_POST["id"]) && isset($_POST["datemod"]) && isset($_POST["motifmod"]) && isset($_POST["bilanmod"]) && isset($_POST["medecin"]))
{
    //affectation des valeurs recuperées
    $id = $_POST["id"];
    $date = $_POST["datemod"];
    $motif=$_POST["motifmod"];
    $bilan=$_POST["bilanmod"];
    $medecin = $_POST["medecin"];

    //appel de la fonction update
    daorapport::updaterapport($id, $date, $motif, $bilan, $medecin);

    //remplacement des medicaments dans la bdd si necessaire
    for($i=0; $i<3; $i++)
    {
        if($_POST["medicament".$i]!="" && $_POST["quantite".$i]!="" && is_numeric($_POST["quantite".$i]))
        {
            if(daooffrir::offrirexiste($id, $_POST["medicament".$i]))
            {
                daooffrir::deleteoffrir($id, $_POST["medicament".$i]);
                daooffrir::createoffrir($id, $_POST["medicament".$i], $_POST["quantite".$i]);
            }
            else
            {
                daooffrir::createoffrir($id, $_POST["medicament".$i], $_POST["quantite".$i]);
            }

            $message = "Médicament ".$_POST["medicament".$i]." ajouté !\n";
        }

    }
    $message = "le(s) médicament(s) n'a pas pu etre ajouté(s)";

    include "rapport.php";
}
else
{
    //recuperation du rapport pour l'affichage dans les encadrés
    if(isset($idrapport))
    {
        $rapport = daorapport::getrapportbyid($idrapport);

        $lesofferts = daooffrir::getoffrirbyraport($idrapport);
    }

    $listemedicament = daomedicament::getmedicament();
    $listemed = daomedecin::getmedecin();

    //appel des fichiers de la vue
    include './vue/entete.php';
    include './vue/modifrapport.php';
    include './vue/pied.php';
}


?>