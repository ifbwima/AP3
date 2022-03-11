<?php
//recuperation des variable pour la connexion
if (isset($_POST["login"]) && isset($_POST["mdp"])){
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];

    login($login, $mdp);
}

//appel des fichiers de la vue
if(isLoggedOn()){
    include './controleur/accueil.php';
}
else{
    include './vue/entete.php';
    include './vue/connexion.php';
    include './vue/pied.php';
}

?>