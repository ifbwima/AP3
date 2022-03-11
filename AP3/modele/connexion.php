<?php 
include_once 'visiteur.inc.php';

//test si l'utilisateur est connecter
function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["login"])) {
        $util = daovisiteur::getvisiteurbylogin($_SESSION["login"]);
        if ($util->getlogin() == $_SESSION["login"] && $util->getmdp() == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

//fonction de connexion
function login($login, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $visiteur = daovisiteur::getvisiteurbylogin($login);
    $mdpBD = $visiteur->getmdp();

    if ($mdpBD == $mdp) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["id"] = $visiteur->getid();
        $_SESSION["login"] = $login;
        $_SESSION["nom"] = $visiteur->getnom();
        $_SESSION["prenom"] = $visiteur->getprenom();
        $_SESSION["mdp"] = $mdpBD;
        $_SESSION["adresse"] = $visiteur->getadresse()." ".$visiteur->getcp()." ".$visiteur->getville();
        $_SESSION["date"] = $visiteur->getdate();
    }
}

//deconnexion
function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["login"]);
    unset($_SESSION["mdp"]);
}

?>