<?php
include_once 'medicament.php';

class daomedicament
{
    //recuperation du medicament par id
    public static function getmedicamentbyid($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medicament where id like :id;");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = new medicament($ligne["id"],$ligne["nomCommercial"],$ligne["idFamille"],$ligne["composition"],$ligne["effets"], $ligne["contreIndications"]);
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    //recuperation des medicaments
    public static function getmedicament()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medicament;");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne)
            {
                $resultat[] = new medicament($ligne["id"],$ligne["nomCommercial"],$ligne["idFamille"],$ligne["composition"],$ligne["effets"], $ligne["contreIndications"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}