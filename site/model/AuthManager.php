<?php

namespace P4OC\site\Model;

require_once(MODEL."Manager.php");

class AuthManager extends Manager 
{
    public function inscriptionManager($pseudo, $mail, $mdp_hash) {
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];
        print_r($mdp);
        echo "<br>";
        print_r($mdp2);
        
        if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])) {
            $pseudolength = strlen($pseudo);
            if($pseudolength <= 255) {
                if($mail == $mail2) {
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $db = $this->dbConnect();
                        $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
                        $reqmail->execute(array($mail));
                        $mailexist = $reqmail->rowCount();

                    if($mailexist == 0) {
                        if($mdp == $mdp2) {
                            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                            $db = $this->dbConnect();
                            $insertmbr = $db->prepare("INSERT INTO users(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                            $insertmbr->execute(array($pseudo, $mail, $mdp_hash));
                            header('Location:index.php?action=showLogin');
                            
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

    public function checkLoginManager($mailconnect)
    {
        session_start();

        $mailconnect = $_POST['mailconnect'];
        $mdpconnect = $_POST['mdpconnect'];
        

        if(!empty($mailconnect) && !empty($mdpconnect)) {

            $db = $this->dbConnect();
            $requser = $db->prepare("SELECT * FROM users WHERE mail = ?");
            $requser->execute(array($mailconnect));
            $userexist = $requser->rowCount();

            if($userexist == 1) {
                $userinfo = $requser->fetch();
                if (password_verify($mdpconnect, $userinfo['motdepasse'])) {
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                $_SESSION['mail'] = $userinfo['mail'];
                header("Location: index.php?action=showDash&id=".$_SESSION['id']);
                } 
            } else {
                echo "Mauvais mail ou mot de passe !";
            }
        } else {
            echo "Tous les champs doivent être complétés !";
        }
    }

    public function logoutManager()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?action=showLogin"); 
    }

    /*
    public function dashboardManager($getid)
    {
        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $db = $this->dbConnect();
            $getid = intval($_GET['id']);
            $requser = $db->prepare('SELECT * FROM users WHERE id = ?');
            $requser->execute(array($getid));
        }
    }
    */ 
}