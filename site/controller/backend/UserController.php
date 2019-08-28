<?php

require_once(MODEL.'AuthManager.php');

class UserController 
{
    public function showLogin()
    {
        require(VIEWBACK.'login.php');
    }

    public function showDash()
    {
        require(VIEWBACK.'dashboardView.php');
    }

    public function logout() 
    {
    
    }

    public function checkLogin()
    {

    }
}