<?php


require_once __DIR__ . '/../Http/Request.php';
require_once __DIR__ . '/../Http/Response.php';
require_once __DIR__ . '/../modeles/Modele_User.php';

function creerCompte(Request $request, Response $response){
    $data = [];
    if ($request->isPost()) {
        $data = $request->allPost();
        $success = createUser($data);
        if ($success) {
            $response->success("Compte créé avec succès");
            $response->redirect("index.php?action=index");
            return;
        } else {
            $errors['global'] = "Erreur dans la création du compte";
        }
    }
        
    $response->view(__DIR__ . '/../../templates/pages/create-compte.php', $data);
}

function connexionUser(Request $request, Response $response){
    $data = [];
    if ($request->isPost()) {
        $data = $request->allPost();
        $success = connexionUserByMail($data);
        if ($success) {
            $response->success("Connexion avec succès");
            $response->redirect("index.php?action=dashboard");
            $response->view(__DIR__ . '/../../templates/pages/dashboard.php', $data);
        } else {
            $errors['global'] = "Erreur dans la connexion au compte";
        }
    }

    $response->view(__DIR__ . '/../../templates/pages/connexion.php', $data);
}

function dashboard(Request $request, Response $response){
    $data = [];
    if(isset($_SESSION['connexion'])){
        $response->view(__DIR__ . '/../../templates/pages/dashboard.php', $data);
    }else{
        $response->redirect("index.php?action=index");
        $response->view(__DIR__ . '/../../templates/pages/index.php', $data);
    }
}

function deconnexion(Request $request, Response $response){
    $data = [];
    $_SESSION = [];
    session_destroy();
    $response->redirect("index.php?action=index");
    $response->view(__DIR__ . '/../../templates/pages/index.php', $data);
}


//<?php ?>