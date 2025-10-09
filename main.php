<?php

require __DIR__."\src\Roulette.php";
require __DIR__."\src\Joueur.php";

function afficherMenu(){
    echo "
    1: Jouer\n
    2: Voir gains\n
    3: Quitter\n";
}

function afficherMenu2(): void{
    echo "\n- Choix de la mise - \n
    1: Rouge\n
    2: Noir\n
    3: Pair \n
    4: Impair\n
    5: Rouge-Pair\n
    6: Rouge-Impair\n
    7: Noir-Pair\n
    8: Noir-Impair\n";
}

$plateau = new Roulette();

//$nom = readline("Votre nom :");

$nbJetons = readline("Nombres Jetons :");

afficherMenu();
$choix1 = readline("Votre choix :");
switch ($choix1) {
    case 1:
        echo $plateau->afficherPlateau();
        afficherMenu2();
        $choix2= readline("Votre choix :");
        $mise = readline("Nombre à miser : ");
        while ($mise > $nbJetons) {
            echo "Impossible vous n'avez pas assez de jetons !\n;";
            $mise = readline("Nombre à miser : ");
        }
        switch ($choix2) {
            
            case 1:
                $plateau->tirerCaseRandom();
                echo $plateau->afficherCase();
                $nbJetons = $plateau->miseCouleur($nbJetons, $mise, 'rouge');
                echo "\nNombre de jetons : $nbJetons";
                break;

            case 2:
                $plateau->tirerCaseRandom();
                echo $plateau->afficherCase();
                $nbJetons = $plateau->miseCouleur($nbJetons, $mise, 'noir');
                echo "\nNombre de jetons : $nbJetons";
                break;
            case 3:
                $plateau->tirerCaseRandom();
                echo $plateau->afficherCase();
                $nbJetons = $plateau->miseParite($nbJetons, $mise, 'pair');
                echo "\nNombre de jetons : $nbJetons";
                break;
            case 4:
                $plateau->tirerCaseRandom();
                echo $plateau->afficherCase();
                $nbJetons = $plateau->miseParite($nbJetons, $mise, 'impair');
                echo "\nNombre de jetons : $nbJetons";
                break;
            case 5:
                $plateau->tirerCaseRandom();
                echo $plateau->afficherCase();
                $nbJetons = $plateau->miseCouleur($nbJetons, $mise, 'rouge');
                $nbJetons = $plateau->miseParite($nbJetons, $mise, 'pair');
                echo "\nNombre de jetons : $nbJetons";
                break;
        }
        
        break;
    
    case 2:

        break;

    case 3: 

        break;

    default:
        break;
}
    

//$joueur = new Joueur($nom, $nbJetons);

