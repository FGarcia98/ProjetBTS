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
        $requser = $bdd->prepare('SELECT * FROM user WHERE "' . $identifiant . '"=`identifiant` && "' . $mdp . '"=`mdp'); // Vérifie si l'identifiant et le mdp sont les meme quand base
        $requser->execute(array($identifiant, $mdp));// mise en tableau
        $userexist = $requser->rowCount(); 
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['identifiant'] = $userinfo['identifiant'];
            
            if($userinfo['isadmin']==0){

                echo"Vous etes connecter en tant que " . $_SESSION['identifiant'] ." cliquer ici" ?> <a href="home.php">pour acceder au site</a> <?php
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
            echo "L'utilisateur " . $this->_identifiant . " à bien été suprimer !";
            $delet = $bdd->prepare("DELETE FROM `user` WHERE `id_user` = ? ");
            $delet->execute(array($this->_idUser));
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
    }
}

?>