<?php
class user{

    //Propiétés
    private $_identifiant;
    private $_mdp;

    //Methodes
    public function bdd()
    {
        try {
            $bdd = new PDO('mysql:host=localhost; dbname=projetgps; charset=utf8', 'root', 'root');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
        return $bdd;
    }

    public function Connexion($identifiant, $mdp , $bdd) // Romain FLEMAL
    {
            $requser = $bdd->prepare('SELECT * FROM user WHERE "'.$identifiant.'"=`identifiant` && "'.$mdp.'"=`mdp');
            $requser->execute(array($identifiant, $mdp));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['identifiant'] = $userinfo['identifiant'];
                echo "Vous être connecté en tant que " . $userinfo['identifiant'] . ".";

                if($userinfo['isadmin']==1) //admin
                {
                    echo "user ou admin?";
                }
            } else {
             echo "Identifiant ou mot de passe incorrect !";
            }
    }

    public function Autorisation($identifiant, $mdp) // Florian Garcia 
    {
<<<<<<< HEAD

=======
        
>>>>>>> cefeeeb04e7f9aee13b1a20d1f9fd6453c7ceee7



    }

    public function Modification_user($identifiant, $mdp) // Florian Garcia
    {




    }

    public function Suppression_user($identifiant, $mdp) // Romain FLEMAL
    {




    }


}

?>