<?php
include_once 'medecin.php';

class daomedecin{
    //recuperation de l'ensemble des medecins
    public static function getmedecin()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medecin;");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne)
            {
                $resultat[] = new medecin($ligne["id"],$ligne["nom"],$ligne["prenom"],$ligne["adresse"],$ligne["tel"],
                $ligne["specialitecomplementaire"],$ligne["departement"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    //recuperation des medecins par son id
    public static function getmedecinbyid($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medecin where id like :id;");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = new medecin($ligne["id"],$ligne["nom"],$ligne["prenom"],$ligne["adresse"],$ligne["tel"],$ligne["specialitecomplementaire"],$ligne["departement"]);
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    //update du medecin
    public static function updatemedecin($id, $nom, $prenom, $adresse, $tel, $specialite)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("update medecin set nom = :nom, prenom = :prenom, adresse = :adresse, tel = :tel, specialitecomplementaire = :specialite where id = :id");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
            $req->bindValue(':tel', $tel, PDO::PARAM_STR);
            $req->bindValue(':specialite', $specialite, PDO::PARAM_STR);
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            return true;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
            die();
        }
    }
}