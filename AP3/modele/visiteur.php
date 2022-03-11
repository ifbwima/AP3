<?php
class visiteur{
    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    private $adresse;
    private $cp;
    private $ville;
    private $dateembauche;

    public function __construct($unid, $unnom, $unprenom, $unlogin, $unmdp, $uneadresse, $uncp, $uneville, $unedate)
    {
        $this->id = $unid;
        $this->nom = $unnom;
        $this->prenom = $unprenom;
        $this->login = $unlogin;
        $this->mdp = $unmdp;
        $this->adresse = $uneadresse;
        $this->cp = $uncp;
        $this->ville = $uneville;
        $this->dateembauche = $unedate;
    }
    public function getid(){return $this->id;}
    public function getmdp(){return $this->mdp;}
    public function getlogin(){return $this->login;}
    public function getnom(){return $this->nom;}
    public function getprenom(){return $this->prenom;}
    public function getadresse(){return $this->adresse;}
    public function getcp(){return $this->cp;}
    public function getville(){return $this->ville;}
    public function getdate(){return $this->dateembauche;}
}