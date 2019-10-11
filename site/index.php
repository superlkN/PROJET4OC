<?php

session_start();

include_once('_config.php');
require_once(CONTROLLERFRONT.'Home.php');
require_once(CONTROLLERBACK.'UserController.php');

try 
{
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
    $home = new Home;
    $home->showHome();
    }

    if(isset($action))
    {
        $home = new Home;
        $user = new UserController;

        switch ($action)
        {
            case "showHome":
                $home->showHome();
                break;
            case "showPost":
                $home->showPost();
                break;
            case "addComment":
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        $home->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;
            case "showLogin":
                $user->showLogin();
                break;
            case "showDash":
                $user->showDash();
                break;
            case "showInscription":
                $user->showInscription();
                break;
            case "logout":
                $user->logout();
                break;
            case "inscription":
                if (isset($_POST['forminscription'])) {
                    $user->inscription($_POST['pseudo'], $_POST['mail'], $_POST['mdp']);
                }
                break;
            case "login":
                if (isset($_POST['formconnexion'])) {
                    $user->checklogin($_POST['mailconnect']);
                }
                break;
            case "dashboard":
                $user->dashboard($_GET['id']);
                break;
            case "modifyChapitre":
                if(!empty($_GET['id']) && $_GET['id'] > 0)
                {
                    if(!empty($_POST['content']))
                    {
                        $user->modifyChapitre($_POST['title'], $_POST['content'], $_GET['id']); 
                    }
                    else
                    {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }  
                else
                {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;
            case "viewChapitre":
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $user->viewChapitre($_GET['id']);
                }
                break;
            case "report":
                $home->report($_GET['id']);
                break;
            case "deleteChapitre":
                $user->deleteChap($_GET['id']);
                break;
            case "createChapitre":
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $user->createChapitre($_POST['title'], $_POST['content']);
                }
                else 
                {
                    echo "contenu vide";
                }
                break;
            case "viewCreateChap":
                $user->viewCreateChap();
                break;
            case "deleteComment":
                $user->deleteComment($_GET['id']);
                break;
            case "resetComment":
                $user->resetComment($_GET['id']);
                break;
            default:
                $home->showHome();
        }
    }    
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}

