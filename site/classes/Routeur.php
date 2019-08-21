<?php

class Routeur 
{
    private $request;

    private $routes = [ "home.html" => "frontend"];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function renderController()
    {
        $request = $this->request;

        if(key_exists($request, $this->routes))
        {
            $controller = $this->routes[$request];
            require_once(CONTROLLERFRONT.$controller.'.php');

            try 
            {
                if (isset($_GET['action']))
                {
                    if ($_GET['action'] == 'listPosts') 
                    {
                        listPosts();
                    }
                    elseif ($_GET['action'] == 'post') 
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0) 
                        {
                            post();
                        }
                        else 
                        {
                            throw new Exception('Aucun identifiant de billet envoyé');
                        }
                    }
                }
                else 
                {
                    listPosts();
                }
            } 
            catch(Exception $e) 
            {
                echo 'Erreur : ' . $e->getMessage();
            }
        } 
        else 
        {
            echo '404';
        }
    }
}