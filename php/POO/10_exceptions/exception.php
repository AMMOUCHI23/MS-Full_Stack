<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les exceptions</title>
</head>
<body>
    <?php
    /*
        PHP a une gestion des exceptions similaire à ce qu'offrent les autres langages 
        de programmation. Une exception peut être lancée ("throw") et attrapée ("catch") dans PHP.
        Le code devra être entouré d'un bloc try pour faciliter la saisie d'une exception 
        potentielle. Chaque try doit avoir au moins un bloc catch ou finally correspondant.
    */

    function inverse($x)
    {   
        //indiquer l'exception
        if ($x==0){
            throw new Exception("Dévision par zéro impossible");
        }
        return( 1/$x);
    }

     // lancer l'exception
    try
    {
     echo inverse(5)."<br>";
     echo inverse(0)."<br>";
     echo inverse(10)."<br>";
    }

    //attraper l'éxception
    catch (Exception $e)
    {
       echo "exception reçue :". $e->getMessage()."<br>"; 
    }

    // on peut ajouter un bloc finally : qui va s'exicuter qlq soit l'erreur
    finally
    {
        echo " finalement ce que vous cherchez  c'est l'inverce de 10 alors égale à : ".inverse(10);
    }
    ?>
</body>
</html>