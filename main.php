<?php

require __DIR__."\src\Roulette.php";

$plateau = new Roulette();

$case = $plateau->getCaseRandom();

var_dump($case);