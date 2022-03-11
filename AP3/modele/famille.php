<?php
class famille{
    private $id;
    private $libelle;

    public function __construct($unid, $unlibelle)
    {
        $this->id = $unid;
        $this->libelle = $unlibelle;
    }
}