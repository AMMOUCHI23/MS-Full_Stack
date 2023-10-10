<?php
class Magasins {
    protected $nomMag;
    protected $adresse;
    protected $codePostal;
    protected $ville;
    protected $restauration;

    //Définir les fonctions guiters
    public function getNomMag()
    {
        return $this->nomMag;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCodePostal()
    {
        return $this->codePostal;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getRestauration()
    {
        return $this->restauration;
    }

    // Définir le constructeur de la classe mère Magasins
    public function __construct($nomMag,$adresse,$codePostal,$ville,$restauration)
    {
        $this->nomMag=$nomMag;
        $this->adresse=$adresse;
        $this->codePostal=$codePostal;
        $this->ville=$ville;
        $this->restauration=$restauration;

    }

    //Méthode mode de réstauration
    public function modeRestauration(){
        if ($this->restauration){
         return "Mode de réstauration : Réstaurant";
        }
        else {
            return "Mode de réstauration : Tickets réstaurants";
        }
    }

}
?>