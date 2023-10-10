<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des ereurs</title>
</head>
<body>
    <?php
    /*error_reporting();//fixe le niveau de rapport d'erreur
    error_reporting(0);// désactive le rapport d'erreur
    error_reporting(-1);// rapporte toutes les erreurs php
    //ini_set();// Modifie la valeur d'une option de configuration
    ini_set("display_errors",0);// on affiche pas les erreurs
    ini_set("display_errors",1);// on affiche  les erreurs
    echo $produit;
    $dive=15/0;
    echo $dive;*/
    $age=17;
    try{
        if ($age <18){
            throw new Exception("Vous etes mineur");
            
        }
    }
   catch (Exception $e){
    echo $e -> getMessage();
   }
   // on peut ajouter un bloc finally : qui va s'exicuter qlq soit l'erreur
   finally{
    
   }
    ?>
    
</body>
</html>