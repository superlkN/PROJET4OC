<?php

include_once('_config.php');
require_once(CONTROLLERFRONT.'Home.php');
require_once(CONTROLLERBACK.'UserController.php');

try 
{
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'showHome') 
        {
            showHome();
        }
        elseif ($_GET['action'] == 'showPost') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                showPost();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'showLogin')
        {
            showLogin();
        }
        elseif ($_GET['action'] == 'showDash')
        {
            showDash();
        }
        elseif ($_GET['action'] == 'showInscription')
        {
            showInscription();
        }
        elseif ($_GET['action'] == 'showDash')
        {
            showDash();
        }
        elseif ($_GET['action'] == 'logout')
        {
            logout();
        }
        elseif ($_GET['action'] == 'inscription' && isset($_POST['forminscription'])) 
        {
            
            inscription($_POST['pseudo'], $_POST['mail'], $_POST['mdp']);
            
        }
        elseif ($_GET['action'] == 'login' && isset($_POST['formconnexion']))
        {
            checklogin($_POST['mailconnect']); 
        }
        /*
        elseif ($_GET['action'] == 'dashboard')
        {
            dashboard($_GET['id']);
        } */

        elseif ($_GET['action'] == 'viewChapitre' && isset($_GET['id']) && $_GET['id'] > 0)
        {
            viewChapitre($_GET['id']); 
        }
    }
    else 
    {
        showHome();
    } 
} 
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}

