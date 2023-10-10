<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>

<body>
    <?php
    include_once("visiteur.class.php");
    $visiteur1 = new Visiteur;
   
    $visiteur1->set_prenom("Abdallah");
    $visiteur1->set_nom("AMMOUCHI");

    //ici on peut acceder à la propriété nom (public) et pas à la proprieté prenom(private)

    echo "Votre nom est " .$visiteur1-> nom."<br>"; 
    echo "Votre prénom est ".$visiteur1 -> prenom;
   
  
   


    ?>

</body>

</html>