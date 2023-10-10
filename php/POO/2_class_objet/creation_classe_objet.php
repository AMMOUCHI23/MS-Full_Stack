<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //*************créer une classe****************/
    // la premiere lettre du nom de la classe est en majuscule aussi la premiere lettre des autres mots
    class Vehicle
    {
        //__construct() permet de déclarer le constructeur de la classe composé des méthodes
        public function __construct()
        {
            echo "je suis construit !! <br>";
        }
        
    }
    // créer les objets (instances)
    $objet1= new Vehicle();
    $objet2= new Vehicle();
    
    ?>
    
</body>
</html>