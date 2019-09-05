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
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?action=showLogin"); 
    }

    function checkLogin()
    {

    }
