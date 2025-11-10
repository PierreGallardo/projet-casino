<?php

class Router
{
    /**
     * @var array Tableau associatif des routes (action => [fonction, méthodes])
     */
    private $routes = [];

    /**
     * @var Request Objet Request (représentant la requête HTTP)
     */
    private $request;

    /**
     * @var Response Objet Response (pour envoyer la réponse HTTP)
     */
    private $response;

    /**
     * Constructeur du router
     * @param Request $request
     * @param Response $response
     */
    public function __construct($request, $response)
    {
        $this->request  = $request;
        $this->response = $response;
    }

    /**
     * Ajoute une route au router.
     * @param string $action Nom de l'action ("index", "show", ...)
     * @param string $fonction Nom de la fonction dans le contrôleur
     * @param array $methodes Méthodes HTTP autorisées (['GET'], ['GET','POST'])
     * @return Router Pour le chaînage
     */
    public function addRoute($action, $fonction, $methodes = ['GET'])
    {
        $this->routes[$action] = [
            'fonction' => $fonction,
            'methodes' => $methodes
        ];
        return $this;
    }

    /**
     * Traite la requête courante et exécute la route ou l'erreur correspondante.
     */
    public function handleRequest()
    {
        $method = $this->request->getMethod();
        $action = $this->request->getAction();

        if (!$this->hasRoute($action)) {
            $this->handleNotFound();
            return;
        }

        $route = $this->routes[$action];

        // Vérifier les méthodes autorisées
        if (!in_array($method, $route['methodes'])) {
            $this->handleMethodNotAllowed($route['methodes']);
            return;
        }

        // Vérifier si la fonction existe
        if (!function_exists($route['fonction'])) {
            $this->handleFunctionNotFound();
            return;
        }

        // Appel de la fonction du contrôleur correspondante
        call_user_func($route['fonction'], $this->request, $this->response);

        // Envoi la réponse (en général, send est appelé juste après handleRequest dans l'index, mais ici, on peut l'appeler ici si on veut centraliser)
        $this->response->send();
    }

    /**
     * Redirige vers l'action "index" si la route recherchée n'existe pas (404 → 302 vers index).
     */
    private function handleNotFound()
    {
        $this->response->redirect("index.php?action=index")->send();
    }

    /**
     * Retourne une erreur 405 avec liste des méthodes autorisées.
     * @param array $methodesAutorisees
     */
    private function handleMethodNotAllowed($methodesAutorisees)
    {
        $this->response
            ->error(
                "Méthode non autorisée. Méthodes autorisées : " . implode(', ', $methodesAutorisees),
                405
            )
            ->send();
    }

    /**
     * Redirige vers l'action "index" si la fonction du contrôleur n'existe pas.
     */
    private function handleFunctionNotFound()
    {
        $this->response->redirect("index.php?action=index")->send();
    }

    /**
     * Retourne toutes les routes définies (pour le debug, les tests).
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Vérifie si une route existe dans le tableau des routes.
     * @param string $action
     * @return bool
     */
    public function hasRoute($action)
    {
        return isset($this->routes[$action]);
    }
}
