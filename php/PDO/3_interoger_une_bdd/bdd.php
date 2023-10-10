<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bdd </title>
</head>
<body>
    <?php
    // afficher toutes les erreures
    ini_set("display_errors",1);
    /* 
    La PDO (PHP Data Object) est une interface qui permet de travailler et de manipuler une base de données 
    quelque soit le systeme de gestion de base de données qu'on utilise
    */
     
    $DB_DSN= "mysql:host=localhost;dbname=test";
    $DB_USER= "root";
    $DB_PASS= "Maformation";
    // mode de gestion des erreurs (seront gérées comme des exceptions)
    $option= [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION];

    try
    {
      $pdo = new PDO ($DB_DSN,$DB_USER,$DB_PASS,$option);
      $result=$pdo->query("SELECT * FROM utilisateur ");
      /*
       fetch : Retourne la ligne suivante d'un ensemble de résultats
       BOTH par défaut
       ASSOC retourne un tableau associatif
       OBJ : objet
      */
      /*
      echo "La liste des utilisateurs est:<br> ";
      while($data = $result->fetch(PDO::FETCH_OBJ))
      {
        echo $data->nom ." / ".$data-> prenom ." / ".$data-> sex ."<br>";
      }
      */
      //echo "connexion établie";
      //pour parcourire plusieur donnée on utilise fetchall avec foreach
      $listeClients=$result->fetchAll(PDO::FETCH_ASSOC);
      foreach ($listeClients as $client){
        echo $client["nom"]."<br>";
      }
    }
     catch (PDOException $e)
     {
      echo "Erreur :".$e->getMessage();
     }
    ?>
</body>
</html>