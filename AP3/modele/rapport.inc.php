<?php
include_once 'rapport.php';

class daorapport
{
    //fonction qui creer un rapport dans la base de données
    public static function createrapport($id, $date, $motif, $bilan, $idmedecin){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare('insert into rapport(date, motif, bilan, idVisiteur, idMedecin) values (:date, :motif, :bilan, :idvisiteur, :idmedecin);');
            $req->bindValue(':date', $date, PDO::PARAM_STR);
            $req->bindValue(':motif', $motif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $req->bindValue(':idvisiteur', $id, PDO::PARAM_STR);
            $req->bindValue(':idmedecin', $idmedecin, PDO::PARAM_INT);
            $req->execute();

            return true;
    
        } catch (PDOException $e) {
            $e;
            return false;
        }
    }

    //recupere une liste de rapport en fonction de l'utilisateur actuel
    public static function getrapportbyidvisiteur()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where idVisiteur like :id;");
            $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne)
            {
                $resultat[] = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$ligne["idVisiteur"],
                $ligne["idMedecin"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    //recupere une liste de rapport selon la date
    public static function getrapportbydate($date)
    {
        try {
            $resultat = array();

            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where date like :date and idVisiteur like :id;");
            $req->bindValue(':date', $date, PDO::PARAM_STR);
            $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne)
            {
                $resultat[] = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$ligne["idVisiteur"],
                $ligne["idMedecin"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    //recupere un rapport selon un id
    public static function getrapportbyid($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where id like :id;");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$ligne["idVisiteur"], $ligne["idMedecin"]);
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    //met a jour un rapport
    public static function updaterapport($id, $date, $motif, $bilan, $idmed)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("update rapport set date = :date, motif = :motif, bilan = :bilan, idMedecin = :idmed where id = :id");
            $req->bindValue(':date', $date, PDO::PARAM_STR);
            $req->bindValue(':motif', $motif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $req->bindValue(':idmed', $idmed, PDO::PARAM_STR);
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            return true;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
            die();
        }
    }

    //recupere les rapports effectuer par un medecin
    public static function getrapportbyidmed($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where idMedecin like :id;");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne)
            {
                $resultat[] = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$ligne["idVisiteur"], $ligne["idMedecin"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    //supprime un rapport
    public static function deleterapport($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("delete from rapport where id like :id;");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ligne;
    }
}

