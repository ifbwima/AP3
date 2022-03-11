<?php
class rapport{
    private $id;
    private $date;
    private $motif;
    private $bilan;
    private $idvisiteur;
    private $idmedecin;

    public function __construct($unid, $unedate, $unmotif, $unbilan, $unidvisiteur, $unidmedecin)
    {
        $this->id = $unid;
        $this->date = $unedate;
        $this->motif = $unmotif;
        $this->bilan = $unbilan;
        $this->idvisiteur = $unidvisiteur;
        $this->idmedecin = $unidmedecin;
    }

    public function getid(){return $this->id;}
    public function getdate(){return $this->date;}
    public function getmotif(){return $this->motif;}
    public function getbilan(){return $this->bilan;}
    public function getidmedecin(){return $this->idmedecin;}
}