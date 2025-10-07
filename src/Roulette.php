<?php

class Roulette {
    private array $grille = [['rouge', 1],['noir', 2],['rouge', 3],
                            ['noir', 4], ['rouge', 5], ['noir', 6],
                            ['rouge',7], ['noir', 8], ['rouge', 9],
                            ['noir', 10], ['noir', 11], ['rouge', 12],
                            ['noir', 13], ['rouge', 14], ['noir', 15],
                            ['rouge', 16], ['noir', 17], ['rouge', 18],
                            ['rouge', 19], ['noir', 20], ['rouge', 21],
                            ['noir', 22], ['rouge', 23], ['noir', 24],
                            ['rouge', 25], ['noir', 26], ['rouge', 27],
                            ['noir', 28], ['noir', 29], ['rouge', 30],
                            ['noir', 31], ['rouge', 32], ['noir', 33],
                            ['rouge', 34], ['noir', 35], ['rouge', 36]];


    public function __construct(){}

    public function getCaseRandom():array {
        return $this->grille[rand(0,36)];
    }
}