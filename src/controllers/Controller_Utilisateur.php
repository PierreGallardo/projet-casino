<?php

require_once __DIR__ . '/../Http/Request.php';
require_once __DIR__ . '/../Http/Response.php';

function creerCompte(Request $request, Response $response){
    $data = [];
    $response->view(__DIR__ . '/../../templates/pages/create-compte.php', $data);
}