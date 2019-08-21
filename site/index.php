<?php
include_once('_config.php');

/*** Le routeur ***/

$request = $_GET['r']; // index.php?r.....


if ($request == "home")
{
    require(CONTROLLERFRONT.'frontend.php');

    try {
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == 'listPosts') {
                listPosts();
            }
            elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
        }
    
        else 
        {
            listPosts();
        }
    } 
    catch(Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

} else {
    echo '404';
}