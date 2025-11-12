<?php

/**
 * Front Controller - Point d'entrée de l'application avec Router OO
 * Route les requêtes vers les bons contrôleurs via une classe Router dédiée
 */

// Configuration des erreurs pour le développement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrage de la session pour les messages
session_start();

// Inclusion des classes Request, Response et Router
require_once __DIR__ . '/../src/Http/Request.php';
require_once __DIR__ . '/../src/Http/Response.php';
require_once __DIR__ . '/../src/Routing/Router.php';

// Inclusion du contrôleur des films (et autres si besoin)
require_once __DIR__ . '/../src/controllers/Controller_Utilisateur.php';
require_once __DIR__ . '/../src/controllers/Controller_Accueil.php';

// Création des objets Request, Response et Router
$request = new Request();
$response = new Response();
$router = new Router($request, $response);

// Définition de toutes les routes de l'application
$router->addRoute('index',  'index',  ['GET'])
        ->addRoute('create-compte',  'creerCompte',  ['GET']);

// Traitement centralisé de la requête courante
$router->handleRequest();