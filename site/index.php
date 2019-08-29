<?php
require('controller/frontend/Home.php');
require('controller/backend/UserController.php');
// include_once('_config.php');

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

