<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à la base de donnée record</title>
</head>
<body>
    <?php
    require_once("connexion.php");
    try {
        $connexion = new PDO ($SDN,$user,$pass,$option);
        echo "Connexion bien établie <br>";
        //Préparer la requete
        $requete=$connexion->prepare("SELECT * FROM artist");
        
        // Éxicuter la requete
        $requete->execute();
        $nomArtist=$requete->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nomArtist as $artiste ) {
            echo $artiste["artist_name"]."<br>" ;
        }
        
    } 
    catch (PDOException $e) {
        echo "Error de connexion : ".$e-> getMessage();
        echo "N° : " . $e->getCode();
    }
    ?>
    
</body>
</html>: