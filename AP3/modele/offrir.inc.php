<?php
include_once 'offrir.php';
include_once 'medicament.inc.php';
include_once 'rapport.inc.php';

class daooffrir
{

    //creation d'offre (medicament rapport)
    public static function createoffrir($idrapport, $idmedicament, $quantite){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare('insert into offrir(idRapport, idMedicament, quantite) values (:idrapport, :idmedicament, :quantite);');
            $req->bindValue(':idrapport', $idrapport, PDO::PARAM_STR);
            $req->bindValue(':idmedicament', $idmedicament, PDO::PARAM_STR);
            $req->bindValue(':quantite', $quantite, PDO::PARAM_INT);
            $req->execute();

            return true;
    
        } catch (PDOException $e) {
            print $e;
            return false;
        }
    }

    //verifie si une offre existe
    public static function offrirexiste($idrapport, $idmedicament){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare('select * from offrir where idRapport = :idrapport and idMedicament = :idmedicament;');
            $req->bindValue(':idrapport', $idrapport, PDO::PARAM_STR);
            $req->bindValue(':idmedicament', $idmedicament, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            if($ligne)
            {
                return true;
            }
            else
            {
                return false;
            }
    
        } catch (PDOException $e) {
            $e;
            return false;
        }
    }

    //efface une instance d'offre
    public static function deleteoffrir($idrapport, $idmedicament){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare('delete from offrir where idRapport = :idrapport and idMedicament = :idmedicament;');
            $req->bindValue(':idrapport', $idrapport, PDO::PARAM_STR);
            $req->bindValue(':idmedicament', $idmedicament, PDO::PARAM_STR);
            $req->execute();

            return true;
    
        } catch (PDOException $e) {
             print $e;
            return false;
        }
    }

    public static function getoffrirbyraport($idrap)
    {
        try 
        {
            $resultat = array();

            $cnx = connexionPDO();
            $req = $cnx->prepare('select * from offrir where idRapport = :idrap;');
            $req->bindValue(':idrap', $idrap, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne)
            {
                $resultat[] = new offrir(daorapport::getrapportbyid($idrap), daomedicament::getmedicamentbyid($ligne["idMedicament"]), $ligne["quantite"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

            return $resultat;
        } catch (PDOException $e) {
            print $e;
        }
    }
}