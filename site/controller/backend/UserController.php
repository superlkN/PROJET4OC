<?php

require_once(MODEL.'AuthManager.php');
require_once(MODEL.'ChapitreManager.php');
require_once(MODEL.'CommentManager.php');


    function showLogin()
    {
        require(VIEWBACK.'login.php');
    }

    function showDash()
    {

        if ($_SESSION['isadmin'] == 1)
        {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitres = $chapitreManager->getChapitres();
        $commentManager = new P4OC\site\Model\CommentManager();
        $comments = $commentManager->getReportedComments();

        require(VIEWBACK.'dashboard.php');
        } 
        else 
        {
            echo "Vous n'avez pas accès à cette page, vous allez être redirigé à la page d'accueil.";
            header( "refresh:3;url=index.php" );
        }
    }

    function showInscription()
    {
        require(VIEWBACK.'inscription.php');
    }

    function logout() 
    {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?action=showLogin");
        exit;
    }

    function checkLogin($mailconnect)
    {

        $authManager = new P4OC\site\Model\AuthManager();
        $mailconnect = $_POST['mailconnect'];
        $mdpconnect = $_POST['mdpconnect'];
        

        if(!empty($mailconnect) && !empty($mdpconnect)) {

            $auth = $authManager->checkLoginManager($mailconnect);
            
            if(!empty($auth)) {
                
                if (password_verify($mdpconnect, $auth['motdepasse'])) {
                    $_SESSION['isadmin'] = $auth['isadmin'];

                    if ($_SESSION['isadmin'] == 1) {
                        $_SESSION['id'] = $auth['id'];
                        $_SESSION['pseudo'] = $auth['pseudo'];
                        $_SESSION['mail'] = $auth['mail'];
                        header("Location: index.php?action=showDash");
                        exit;
                    } else {
                        $_SESSION['id'] = $auth['id'];
                        $_SESSION['pseudo'] = $auth['pseudo'];
                        $_SESSION['mail'] = $auth['mail'];
                        header("Location: index.php");
                    }
                } 
            } else {
                echo "Mauvais mail ou mot de passe !";
            }
        } else {
            echo "Tous les champs doivent être complétés !";
        }
        
          
    }

    function inscription($pseudo, $mail, $mdp_hash) 
    {
        $authManager = new P4OC\site\Model\AuthManager();
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];
        
        if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])) {
            $pseudolength = strlen($pseudo);
            if($pseudolength <= 255) {
                if($mail == $mail2) {
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $authMail = $authManager->getMail($mail);
                        
                     
                    if(empty($authMail)) {
                        if($mdp == $mdp2) {
                            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                            $authUser = $authManager->getUser($pseudo, $mail, $mdp_hash);
                            header('Location:index.php?action=showLogin');
                            exit;
                            
                        } else {
                            echo "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        echo "Adresse mail déjà utilisée !";
                    }
                    } else {
                        echo "Votre adresse mail n'est pas valide !";
                    }
                } else {
                    echo "Vos adresses mail ne correspondent pas !";
                }
            } else {
                echo "Votre pseudo ne doit pas dépasser 255 caractères !";
            }
        } else {
            echo "Tous les champs doivent être complétés !";
        }
        
        
        
    }
    
    function dashboard($getid) 
    {
        $authManager = new P4OC\site\Model\AuthManager();
        
        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $getid = intval($_GET['id']);
            $dashboard = $authManager->dashboardManager($getid);
        }
    }
    
    function modifyChapitre($id, $chapitre)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
      
        $affectedChapitre = $chapitreManager->editChapitre($id, $chapitre);
        
        header('Location:index.php?action=showPost&id=' . $id);
        exit; 
        
    }

    function viewChapitre($postId)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->getChapitre($_GET['id']);

        require(VIEWBACK.'editChapView.php');
    }

    function createChapitre($title, $content)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $createChapitre = $chapitreManager->addChapitre($title, $content);

        header('Location:index.php?action=showDash');
        exit;
    }

    function viewCreateChap()
    {
        require(VIEWBACK.'newChapView.php');
    }   

    function deleteComment($id)
    {
        $commentManager = new P4OC\site\Model\CommentManager();
        $delete = $commentManager->deleteComments($id);

        header('Location:index.php?action=showDash');
        exit;
    }

    function deleteChap($id)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->deleteChapitre($id);

        header('Location:index.php?action=showDash');
        exit;
    }

