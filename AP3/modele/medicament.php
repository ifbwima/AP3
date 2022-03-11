<?php
class medicament{
    private $id;
    private $nomcommercial;
    private $idfamille;
    private $composition;
    private $effets;
    private $contreindications;

    public function __construct($unid, $unnom, $unidfamille, $unecompo, $uneffet, $unecontreindication)
    {
        $this->id = $unid;
        $this->nomcommercial = $unnom;
        $this->idfamille = $unidfamille;
        $this->composition = $unecompo;
        $this->effets = $uneffet;
        $this->contreindications = $unecontreindication;
    }

    public function getid(){return $this->id;}
    public function getnom(){return $this->nomcommercial;}
    public function getidfam(){return $this->idfamille;}
    public function getcomposition(){return $this->composition;}
    public function geteffets(){return $this->effets;}
    public function getind(){return $this->contreindications;}
}