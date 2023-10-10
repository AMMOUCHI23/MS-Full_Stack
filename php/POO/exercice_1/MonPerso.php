<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon personnage</title>
</head>
<body>
    <?php
    require_once("classes/Personnage.class.php");

    $personnage1= new Personnage();
  
    $personnage1->setNom("Lebowski");
    $personnage1->setPrenom("Jeff");
    echo $personnage1->getNom()."<br>";
    echo $personnage1->getPrenom()."<br>";

    $pac="12/05/2002";
    $annee=date("Y",strtotime($pac));
   
    echo "l'année d'embouche est ".$annee;
    echo"<br>";
    echo "nombre d'anneés d'encienté est ".date("Y")-$annee;

    ?>
</body>
</html>