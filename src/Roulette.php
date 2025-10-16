<?php

class Roulette {

    private array $grille = [0=>'vert', 1=>'rouge', 2=>'noir', 3=>'rouge', 
                                    4=>'noir', 5=>'rouge', 6=>'noir', 
                                    7=>'rouge', 8=>'noir', 9=>'rouge',
                                    10=>'noir', 11=>'noir', 12=>'rouge',
                                    13=>'noir', 14=>'rouge', 15=>'noir',
                                    16=>'rouge', 17=>'noir', 18=>'rouge',
                                    19=>'rouge', 20=>'noir', 21=>'rouge',
                                    22=>'noir', 23=>'rouge', 24=>'noir',
                                    25=>'rouge', 26=>'noir', 27=>'rouge',
                                    28=>'noir', 29=>'noir', 30=>'rouge',
                                    31=>'noir', 32=>'rouge', 33=>'noir',
                                    34=>'rouge', 35=>'noir', 36=>'rouge'];
    private array $caseTiree;

    private array $historique;


    public function __construct(){
        $this->historique = [];
    }

    public function tirerCaseRandom():void {
        $rand = rand(0,37);
        $this->caseTiree[$rand] = $this->grille[$rand];
        array_push($this->historique, $this->caseTiree) ;
    }


    public function afficherCase():string{ 
        if(implode($this->caseTiree) == 'rouge'){
            $couleurTexte = "\033[31m";
        } else {
            $couleurTexte = "\033[30m";
        }
        return "\n".$couleurTexte.key($this->caseTiree)." ".implode($this->caseTiree)."\033[0m ";
    }

    public function getPlateau():array{
        return $this->grille;
    }

    public function getHistorique():array{
        return $this->historique;
    }

    public function afficherPlateauCouleur():string{
        $str = " ";
        foreach($this->grille as $key => $value) {
            
            if($value == 'rouge'){
                $str .= "\033[31m ".$key." ".$value."\033[0m - "; 
            }else if($value == 'noir'){
                $str .= "\033[30m ".$key." ".$value."\033[0m - "; 
            }else if($value == 'vert'){
                $str .= "\033[32m ".$key." ".$value."\033[0m - "; 
            }
            
        }
        return $str;
    }

    public function miserCase(int $nbJetonsTotal, int $nbJetonsMise, int $caseChoisi):int{
        if ($caseChoisi == key($this->caseTiree)){
            $nbJetonsTotal += $nbJetonsMise*36;
        } else {
            $nbJetonsTotal = $nbJetonsTotal-$nbJetonsMise;
        }
        return $nbJetonsTotal;
        
    }

    public function miseCouleur(int $nbJetonsTotal, int $nbJetonsMise, string $couleur):int{
        if ($couleur == implode($this->caseTiree)){
            $nbJetonsTotal += $nbJetonsMise*2;
        } else {
            $nbJetonsTotal = $nbJetonsTotal-$nbJetonsMise;
        }
        return $nbJetonsTotal;
    }

    public function miseParite(int $nbJetonsTotal, int $nbJetonsMise, string $parite):int{
        if ($parite == 'pair'){
            if (key($this->caseTiree)%2==0){
                $nbJetonsTotal += $nbJetonsMise*2;
            } else {
                $nbJetonsTotal = $nbJetonsTotal-$nbJetonsMise;
            }
        } else if ($parite == 'impair'){
            if (key($this->caseTiree)%2!=0){
                $nbJetonsTotal += $nbJetonsMise*2;
            } else {
                $nbJetonsTotal = $nbJetonsTotal-$nbJetonsMise;
            }
        }
        return $nbJetonsTotal;
    }

    
}