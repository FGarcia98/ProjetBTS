<?php
class user
{

    //Propiétés
    private $_identifiant;
    private $_mdp;
    private $_idUser;
    private $_isadmin;

    //Methodes
    public function getIdUser() // Florian Garcia
    {
        return $this->_idUser;
    }
    public function getIdentifiant() // Florian Garcia
    {
        return $this->_identifiant;
    }
    public function construct($id_user, $identifiant, $mdp, $isadmin) //Mathis Clermont
    {
        $this->_idUser = $id_user;
        $this->_identifiant = $identifiant;
        $this->_mdp = $mdp;
        $this->_isadmin = $isadmin;
    }
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


    public function Modification_user($identifiant, $bdd, $newid, $newmdp) // Florian Garcia
    {
        try {
            $requete = $bdd->query('SELECT identifiant,id_user FROM user WHERE "' . $identifiant . '"=`identifiant`');
            $compte = $requete->rowCount();

            if ($compte == 1) {
                $tabinfo = $requete->fetch();
                $id = $tabinfo['id_user'];
                $requete2 = $bdd->query('UPDATE user SET identifiant= "' . $newid . '",mdp="' . $newmdp . '" WHERE id_user="' . $id . '"');
            }
        } catch (Exception $erreur) {
            echo $erreur->getMessage() . " l'utilisateur n'existe pas";
        }
    }


    public function deleteUser() // Florian Garcia
    {
        try {
            $bdd = new PDO('mysql:host=localhost; dbname=projetgps; charset=utf8', 'root', 'root');
            echo "L'utilisateur " . $this->_identifiant . " | ID de l'utilisateur: " . $this->_idUser . "| Admin:" . $this->_isadmin;
            $delet = $bdd->prepare("DELETE FROM `user` WHERE `id_user` = ? ");
            $delet->execute(array($this->_idUser));
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
    }
}

?>