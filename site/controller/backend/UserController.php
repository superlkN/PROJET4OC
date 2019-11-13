<?php

require_once(MODEL.'AuthManager.php');
require_once(MODEL.'ChapitreManager.php');
require_once(MODEL.'CommentManager.php');

class UserController 
{
    /**
     *  Affiche la vue login
     * 
     */

    public function showLogin()
    {
        require(VIEWBACK.'login.php');
    }

    /**
     *  Affiche la vue dashboard
     * 
     */

    public function showDash()
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

    /**
     *  Affiche la vue inscription
     * 
     */

    public function showInscription()
    {
        require(VIEWBACK.'inscription.php');
    }

    /**
     *  Déconnexion de l'utilisateur
     * 
     */

    public function logout() 
    {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?action=showLogin");
        exit;
    }

    /**
     *  Connexion de l'utilisateur 
     * 
     */

    public function checkLogin($mailconnect)
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
                } else {
                    header("refresh:2;url=index.php?action=showLogin");
                    echo "Mauvais mail ou mot de passe !";
                    exit;
                }
            } else {
                header("refresh:2;url=index.php?action=showLogin");
                echo "Mauvais mail ou mot de passe!";
                exit;
            }
        } else {
            header("refresh:2;url=index.php?action=showLogin");
            echo "Tous les champs doivent être complétés !";
            exit;
        }      
    }

    /**
     *  Inscription de l'utilisateur
     * 
     */

    public function inscription($pseudo, $mail, $mdp_hash) 
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
                            header('refresh:3;url=index.php?action=showInscription');
                            echo "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        header('refresh:3;url=index.php?action=showInscription');
                        echo "Adresse mail déjà utilisée !";
                    }
                    } else {
                        header('refresh:3;url=index.php?action=showInscription');
                        echo "Votre adresse mail n'est pas valide !";
                    }
                } else {
                    header('refresh:3;url=index.php?action=showInscription');
                    echo "Vos adresses mail ne correspondent pas !";
                }
            } else {
                header('refresh:3;url=index.php?action=showInscription');
                echo "Votre pseudo ne doit pas dépasser 255 caractères !";
            }
        } else {
            header('refresh:3;url=index.php?action=showInscription');
            echo "Tous les champs doivent être complétés !";
        }
        
        
        
    }
    
    /**
     *  S'il y a un id en GET, lance la méthode dashboardManager()
     * 
     */

    public function dashboard($getid) 
    {
        $authManager = new P4OC\site\Model\AuthManager();
        
        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $getid = intval($_GET['id']);
            $dashboard = $authManager->dashboardManager($getid);
        }
    }
    
    /**
     *  Modifie le chapitre
     * 
     */

    public function modifyChapitre($title, $content, $id)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
      
        $affectedChapitre = $chapitreManager->editChapitre($title, $content, $id);

        header('Location:index.php?action=showPost&id=' . $id);
        exit; 
        
    }

    /**
     *  Affiche le vue d'edition d'un chapitre
     * 
     */

    public function viewChapitre($postId)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->getChapitre($_GET['id']);

        require(VIEWBACK.'editChapView.php');
    }

    /**
     *  Création d'un nouveau chapitre
     * 
     */

    public function createChapitre($title, $content)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $createChapitre = $chapitreManager->addChapitre($title, $content);

        header('Location:index.php?action=showDash');
        exit;
    }

    /**
     *  Affiche la vue de création d'un chapitre
     * 
     */

    public function viewCreateChap()
    {
        require(VIEWBACK.'newChapView.php');
    }   

    /**
     *  Supprime un commentaire
     * 
     */

    public function deleteComment($id)
    {
        $commentManager = new P4OC\site\Model\CommentManager();
        $delete = $commentManager->deleteComments($id);

        header('Location:index.php?action=showDash');
        exit;
    }

    /**
     *  Supprime un chapitre
     * 
     */

    public function deleteChap($id)
    {
        $chapitreManager = new P4OC\site\Model\ChapitreManager();
        $chapitre = $chapitreManager->deleteChapitre($id);

        header('Location:index.php?action=showDash');
        exit;
    }

    /**
     *  Reset le commentaire signalé
     * 
     */

    public function resetComment($id)
    {
        $commentManager = new P4OC\site\Model\CommentManager();
        $reset = $commentManager->resetComments($id);

        header('Location:index.php?action=showDash');
        exit;
    }
}

