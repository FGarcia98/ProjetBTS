<?php
class user
{

    //Propiétés
    private $_identifiant;
    private $_mdp;

    //Methodes
    public function Connexionbdd() //Romain FLEMAL
    {
        try {
            $bdd = new PDO('mysql:host=localhost; dbname=projetgps; charset=utf8', 'root', 'root');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
        return $bdd;
    }

    public function Autorisation($identifiant, $mdp, $bdd) // Romain FLEMAL
    {
        $requser = $bdd->prepare('SELECT * FROM user WHERE "' . $identifiant . '"=`identifiant` && "' . $mdp . '"=`mdp');
        $requser->execute(array($identifiant, $mdp));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['identifiant'] = $userinfo['identifiant'];

            if ($userinfo['isadmin'] == 0) {

                echo "Vous étes connecter en tant que " . $userinfo['identifiant'] . " voulez vous " ?> <a href="index.php">acceder au site?</a>

            <?php

            }
            
            if ($userinfo['isadmin'] == 1) // Proposition de mode admin si l'utilisateur en est un
            {
                echo "<p>Voulez vous vous connecter en tant que </p>";
                echo "<p></p>";
                include("modal.html");
            }
        } else {
            echo "Identifiant ou mot de passe incorrect !";
        }
    }


    public function Modification_user($identifiant, $mdp, $bdd) // Florian Garcia
    {
    }

    public function Suppression_user($identifiant, $mdp, $bdd) // Romain FLEMAL
    {
    }
}

?>