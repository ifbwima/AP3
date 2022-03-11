<?php
include_once "./modele/medecin.inc.php";

//recuperation des données saisies et appelle de la fonction update medecin
if (isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) && isset($_POST["tel"]) && isset($_POST["specialite"]))
{
    $id = $_POST["id"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $adresse=$_POST["adresse"];
    $specialite=$_POST["specialite"];
    if (is_numeric($_POST["tel"])){
        $tel = $_POST["tel"];

        daomedecin::updatemedecin($id, $nom, $prenom, $adresse, $tel, $specialite);
        $message = "médecin modifié !";
    }
    else{
        $message="Entrez un numero de télephone correct";
    }
    include "medecin.php";
}
else {
//recuperation du medecin pour l'affichage dans les encadrés
    if (isset($idmedecin)) {
        $med = daomedecin::getmedecinbyid($idmedecin);
    }

//appel des fichiers de la vue
    include './vue/entete.php';
    include './vue/modifmedecin.php';
    include './vue/pied.php';
}
?>