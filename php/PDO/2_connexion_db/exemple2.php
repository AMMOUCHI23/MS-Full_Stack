<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intéroger DB</title>
</head>
<body>
    <?php
    require_once("connexion.php");
    try {
        $connexion= new PDO($SDN,$user,$pass,$option);
        echo "connexion à la base de donnée record réussie";
        $requete=$connexion->prepare("select * from artist");
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        foreach ($data as $nom ) {
            echo $nom->artist_name. " / ". $nom->artist_id . "<br>";
        }

    } catch (PDOException $e) {
        echo "Erreure : ".$e->getMessage();
    }
    ?>
    
</body>
</html>