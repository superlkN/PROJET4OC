<?php

include_once(CONTROLLERFRONT.'Home.php');

class Routeur 
{
    private $request;

    private $routes = [ "home"    => ["controller" => "Home", "method" => "showHome"],
                        "contenu" => ["controller" => "Home", "method" => "showPost"],
                        "comment" => ["controller" => "Home", "method" => "addComment"]
                        ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function renderController()
    {
        $request = $this->request;

        if(key_exists($request, $this->routes))
        {
            $controller = $this->routes[$request]['controller'];
            $method = $this->routes[$request]['method'];

            $currentController = new $controller();
            $currentController->$method();
        } 
        else 
        {
            echo '404';
        }
    }
}