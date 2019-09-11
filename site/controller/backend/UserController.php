<?php

require_once(MODEL.'AuthManager.php');


    function showLogin()
    {
        require(VIEWBACK.'login.php');
    }

    function showDash()
    {
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

