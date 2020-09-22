<?php
class map
{

    //Propiétés
    private $_idBateau;
    private $_longitude;
    private $_latitude;
    private $_position;


    //Methodes
    public function getIdBateau() // Romain FLEMAL 
    {
        return $this->_idBateau;
    }
    public function getLongitude() // Romain FLEMAL 
    {
        return $this->_longitude;
    }
    public function getLatitude() // Romain FLEMAL  
    {
        return $this->_latitude;
    }

    public function getPosition() // Romain FLEMAL 
    {
        return $this->_position;
    }

    public function construct($idBateau, $longitude, $latitude, $position) //Mathis Clermont
    {
        $this->_idBateau = $idBateau;
        $this->_longitude = $longitude;
        $this->_latitude = $latitude;
        $this->_position = $position;
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


   
            
}
