<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attributs et Méthodes</title>
</head>
<body>
    <?php
  /* 
      Accesseurs : getter (lire l'attribut) -> getAttribute    
                 : setter (modifier un attribut) -> setAttribute
  */
    class Vehicle
    {
    
        private $_name;
        private $_speed;

        // si on veut accéder à l'attribut privé on crée une methode public qui s'encharge de ça
        public function getName(){
            return $this->_name;
        }
        
        // créer le constructeur 
        public function __construct($name, $speed)
        {
            $this->_name=$name;
            $this->_speed=$speed;
        }

        //Créer une méthode
        public function move(){
            echo"Le véhicule ".$this->_name." se déplace à une vitesse de ".$this->_speed ." km/h";
        }
        
    }
 
    $objet1= new Vehicle("XC450", 650);
    $objet1->move();
     //accéder à l'attribut privé avec la méthode getName()
     echo "<br>";
     echo $objet1-> getName();

    ?>
    
</body>
</html>