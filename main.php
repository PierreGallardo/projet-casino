<?php

require __DIR__."\src\Roulette.php";
require __DIR__."\src\Joueur.php";

function afficherMenu(){
    echo "1 : Jouer\n
    2: Voir gains\n
    3: Quitter\n";
}

$plateau = new Roulette();

$nom = readline("Votre nom :");

$nbJetons = readline("Nombres Jetons :");

$joueur = new Joueur($nom, $nbJetons);

$plateau->tirerCaseRandom();

echo $plateau->afficherCase();