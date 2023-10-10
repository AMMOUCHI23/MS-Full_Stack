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
     une méthode statique est une méthode qui n'agit pas sur des variables d'instance 
     mais uniquement sur des variables de classe.
  */
  
  class Database

  {
    // proprité statique
    public static $_sgbd= "MySQL";
    public static function connect(){
        echo "je me connecte...";
    }
  }
  // Afficher la méthode statique
Database::connect();
echo"<br>";

 // Afficher la propriété statique
 echo Database::$_sgbd;
    ?>
    
</body>
</html>