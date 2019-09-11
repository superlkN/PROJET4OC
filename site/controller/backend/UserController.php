<?php

require_once(MODEL.'AuthManager.php');
require_once(MODEL.'ChapitreManager.php');


    function showLogin()
    {
        require(VIEWBACK.'login.php');
    }

    function showDash()
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->getChapitres();

        require(VIEWBACK.'dashboard.php');
    }

    function showInscription()
    {
        require(VIEWBACK.'inscription.php');
    }

    function logout() 
    {
        $authManager = new P4OC\site\Model\AuthManager();
        $auth = $authManager->logoutManager();
    }

    function checkLogin($mailconnect)
    {
        $authManager = new P4OC\site\Model\AuthManager();
        $auth = $authManager->checkLoginManager($mailconnect);  
    }

    function inscription($pseudo, $mail, $mdp_hash) 
    {
        $authManager = new P4OC\site\Model\AuthManager();
        $auth = $authManager->inscriptionManager($pseudo, $mail, $mdp_hash);
        
    }
    /*
    function dashboard($getid) 
    {
        $authManager = new P4OC\site\Model\AuthManager();
        $dashboard = $authManager->dashboardManager($getid);
    }
    */

    function viewChapitre($postId)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->getChapitre($_GET['id']);

        require(VIEWBACK.'editChapView.php');
    }

