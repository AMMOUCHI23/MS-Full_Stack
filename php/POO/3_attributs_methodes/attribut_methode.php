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
          Attribut( ou propriété): variable appartenant à une classe
          Méthode                : fonction appartenant à une classe

  */
    class Vehicle
    {
        // Créer les attributs 
        // avec public on peut accéder directement à l'attribut en dehors de la classe donc il n'est pa sécurisé
        // on générale on déclare les attributs en privates et les méthodes en public
        public $_name;
        public function __construct($name)
        {
            $this->_name=$name;
        }

        //Créer une méthode
        public function move(){
            echo"Le véhicule est en mouvement <br>";
        }
        
    }
 
    $objet1= new Vehicle("Mon bolide");
    echo $objet1->_name."<br>";
    //acceder à la methode
    $objet1->move();
    $objet2= new Vehicle("Mon autre bolide");
    echo $objet2->_name;
    
    ?>
    
</body>
</html>