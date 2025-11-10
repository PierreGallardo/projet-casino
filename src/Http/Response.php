<?php

class Response
{

    private $statusCode;

    private $headers;

    private $body;

    private $contentType;

    // Encodage du contenu
    private $charset;

    // Constructeur : initialise la réponse avec les valeurs par défaut.
    public function __construct()
    {
        $this->statusCode  = 200;
        $this->headers     = [];
        $this->body        = '';
        $this->contentType = 'text/html';
        $this->charset     = 'UTF-8';
    }

    /**
     * Définit le code de statut HTTP.
     * @param int $statusCode
     * @return Response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = (int) $statusCode;
        return $this;
    }

    /**
     * Définit le corps de la réponse.
     * @param string $body
     * @return Response
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Ajoute ou modifie un header HTTP.
     * @param string $name
     * @param string $value
     * @return Response
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * Définit le type de contenu de la réponse.
     * @param string $contentType
     * @return Response
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $fullContentType = $this->contentType;
        if (!empty($this->charset)) {
            $fullContentType .= '; charset=' . $this->charset;
        }
        $this->setHeader('Content-Type', $fullContentType);
        return $this;
    }

    /**
     * Récupère le code de statut HTTP.
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Récupère le corps de la réponse.
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Récupère la valeur d'un header HTTP spécifique.
     * @param string $name
     * @return string|null
     */
    public function getHeader($name)
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : null;
    }

    /**
     * Récupère tous les headers HTTP.
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Effectue une redirection HTTP.
     * @param string $url
     * @param int $statusCode
     * @return Response
     */
    public function redirect($url, $statusCode = 302):self
    {
        $this->setStatusCode($statusCode);
        $this->setHeader('Location', $url);
        $this->setBody(''); // Un corps vide pour la redirection
        return $this;
    }

    /**
     * Rendu d'un template PHP avec données et modification du statut si fourni.
     * @param string $templatePath
     * @param array $data
     * @param int $statusCode
     * @return Response
     */
    public function view($templatePath, $data = [], $statusCode = 200):self
    {
        if ($statusCode) {
            $this->setStatusCode($statusCode);
        }
        // Extraction et capture du rendu
        ob_start();
        extract($data, EXTR_SKIP);
        include $templatePath;
        $content = ob_get_clean();
        $this->setContentType('text/html');
        $this->setBody($content);
        return $this;
    }

    /**
     * Génère une réponse d'erreur formatée sous forme HTML simple.
     * @param string $message
     * @param int $statusCode
     * @return Response
     */
    public function error($message, $statusCode = 500):self
    {
        $this->setStatusCode($statusCode);
        $this->setContentType('text/html');
        $html = "<div style=\"padding:1em;border:1px solid #c00;color:#900;background:#fee;\">
                    <h1>Erreur</h1>
                    <p>{$message}</p>
                 </div>";
        $this->setBody($html);
        return $this;
    }

    /**
     * Génère une réponse de succès formatée sous forme HTML simple.
     * @param string $message
     * @param int $statusCode
     * @return Response
     */
    public function success($message, $statusCode = 200):self
    {
        $this->setStatusCode($statusCode);
        $this->setContentType('text/html');
        $html = "<div style=\"padding:1em;border:1px solid #090;color:#060;background:#efe;\">
                    <h1>Succès</h1>
                    <p>{$message}</p>
                 </div>";
        $this->setBody($html);
        return $this;
    }

    /**
     * Envoie la réponse HTTP au client et termine le script.
     */
    public function send()
    {
        // Envoi du code de statut
        if (!headers_sent()) {
            http_response_code($this->statusCode);

            foreach ($this->headers as $name => $value) {
                header("{$name}: {$value}");
            }
        }
        echo $this->body;
        // pour empêcher tout code PHP de continuer après
        exit;
    }

    /* =========================
     * Méthodes statiques utilitaires
     * ========================= */

    /**
     * Crée rapidement une instance de redirection HTTP.
     * @param string $url
     * @param int $statusCode
     * @return Response
     */
    public static function redirectTo($url, $statusCode = 302)
    {
        $instance = new self();
        return $instance->redirect($url, $statusCode);
    }

    /**
     * Crée rapidement une réponse d'erreur.
     * @param string $message
     * @param int $statusCode
     * @return Response
     */
    public static function errorResponse($message, $statusCode = 500)
    {
        $instance = new self();
        return $instance->error($message, $statusCode);
    }
}
