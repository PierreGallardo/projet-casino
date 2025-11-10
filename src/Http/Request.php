<?php

class Request {

    private array $get;
    private array $post;
    private array $server;
    private string $method;
    private string $action;

    public function __construct(){
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->action = $_GET['action'] ?? 'index';
    }


    public function get(string $key, $default = null):string{
        return $this->get[$key] ?? $default;
    }

    public function post(string $key, $default = null):string{
        return $this->post[$key] ?? $default;
    }

    public function allPost():array{
        return $this->post;
    }

    public function allGet():array{
        return $this->get;
    }

    public function isPost():bool{
        return $this->method === "POST";
    }

    public function isGet():bool{
        return $this->method === "GET";
    }

    public function getMethod():string{
        return $this->method;
    }

    public function getAction():string{
        return $this->action;
    }

    public function has(string $key):bool{
        return isset($this->get[$key])||isset($this->post[$key]);
    }

    public function getUrl():string{
        return "http://" . $this->server['HTTP_HOST'] . $this->server['REQUEST_URI'];
    }

    public function getClientIp():string{
        return $this->server['HTTP_CLIENT_IP'];
    }


}