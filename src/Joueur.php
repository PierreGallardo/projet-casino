<?php

class Joueur {

    private string $nom;
    private int $nbJetons;
    private array $statistiques;

    public function __construct($nom, $nbJetons){
        $this->nom = $nom;
        $this->nbJetons = $nbJetons;
    }

    public function getnbJetons():int{
        return $this->nbJetons;
    }

    public function setnbJetons(int $nbJetons){
        $this->nbJetons = $nbJetons;
    }



}