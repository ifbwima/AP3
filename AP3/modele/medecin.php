<?php
class medecin{
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $tel;
    private $specialitecomplementaire;
    private $departement;

    public function __construct($unid, $unnom, $unprenom, $uneadresse, $untel, $specialitecomplementaire, $undepartement)
    {
        $this->id = $unid;
        $this->nom = $unnom;
        $this->prenom = $unprenom;
        $this->adresse = $uneadresse;
        $this->tel = $untel;
        $this->specialitecomplementaire = $specialitecomplementaire;
        $this->departement = $undepartement;
    }

    public function getnom(){return ($this->nom);}
    public function getprenom(){return ($this->prenom);}
    public function getadresse(){return ($this->adresse);}
    public function gettel(){return ($this->tel);}
    public function getspecialite(){return ($this->specialitecomplementaire);}
    public function getid(){return $this->id;}

}