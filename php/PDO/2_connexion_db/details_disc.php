<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher le détail d'un disc</title>
</head>
<body>
<?php
    require_once("connexion.php");
    try {
        $connexion= new PDO($SDN,$user,$pass,$option);
        echo "connexion à la base de donnée record réussie <br>";
        $requete=$connexion->prepare("select * from disc where disc_id= :disc_id");
        $disc_id=3;
        $requete->bindParam(":disc_id",$disc_id, PDO::PARAM_INT);
        
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
       foreach ($data as $disc) {
        echo "le numéro de disc ".$disc->disc_id."<br>";
        echo "le nom de disc ".$disc->disc_title."<br>";
        echo "l'année de disc ".$disc->disc_year."<br>";
       }

    } catch (PDOException $e) {
        echo "Erreure : ".$e->getMessage();
    }
    ?>
   
    
</body>
</html>