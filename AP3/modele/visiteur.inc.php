<?php
include_once 'visiteur.php';

class daovisiteur{
    //recupere le visiteur selon son login
    public static function getVisiteurByLogin($login) {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from visiteur where login=:login");
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            $ligne = new visiteur($resultat["id"],$resultat["nom"],$resultat["prenom"],$resultat["login"],$resultat["mdp"],
                $resultat["adresse"],$resultat["cp"],$resultat["ville"],$resultat["dateEmbauche"]);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ligne;
    }
}