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
        showHome();
    }

    if(isset($action))
    {
        switch ($action)
        {
            case "showHome":
                showHome();
                break;
            case "showPost":
                showPost();
                break;
            case "addComment":
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                break;
            case "showLogin":
                showLogin();
                break;
            case "showDash":
                showDash();
                break;
            case "showInscription":
                showInscription();
                break;
            case "logout":
                logout();
                break;
            case "inscription":
                inscription($_POST['pseudo'], $_POST['mail'], $_POST['mdp']);
                break;
            case "login":
                checklogin($_POST['mailconnect']);
                break;
            case "dashboard":
                dashboard($_GET['id']);
                break;
            case "modifyChapitre":
                modifyChapitre($_POST['title'], $_POST['content'], $_GET['id']); 
                break;
            case "viewChapitre":
                viewChapitre($_GET['id']);
                break;
            case "report":
                report($_GET['id']);
                break;
            case "deleteChapitre":
                deleteChap($_GET['id']);
                break;
            case "createChapitre":
                createChapitre($_POST['title'], $_POST['content']);
                break;
            case "viewCreateChap":
                viewCreateChap();
                break;
            case "deleteComment":
                deleteComment($_GET['id']);
                break;
            case "resetComment":
                resetComment($_GET['id']);
                break;
            default:
                showHome();
        }
    }    
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}

