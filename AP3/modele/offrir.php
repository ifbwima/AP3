<?php
class offrir{
    private $rapport;
    private $medicament;
    private $quantite;

    public function __construct($rap, $med, $quantite)
    {
        $this->rapport = $rap;
        $this->medicament = $med;
        $this->quantite = $quantite;
    }

    public function getrapport(){return $this->rapport;}
    public function getmedicament(){return $this->medicament;}
    public function getquantite(){return $this->quantite;}
}