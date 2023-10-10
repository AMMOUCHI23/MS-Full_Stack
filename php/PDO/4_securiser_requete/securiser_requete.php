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
    /*
    Sécuriser les requêtes PHP est essentiel pour protéger votre application contre les attaques 
    potentielles telles que les injections SQL et d'autres...
    Voici quelques pratiques recommandées pour sécuriser vos requêtes PHP :

   1- Utilisez des requêtes préparées (Prepared Statements) :
    Les requêtes préparées permettent de séparer les données des instructions SQL,
    réduisant ainsi le risque d'injection SQL. 
    
    2-Validez et échappez les données utilisateur :
    Avant d'utiliser les données provenant des utilisateurs, validez-les et échappez-les 
    correctement pour empêcher les attaques XSS et autres problèmes de sécurité. 
    Utilisez des fonctions comme filter_input(), htmlspecialchars() ou des bibliothèques 
    de validation de données.

    */
    $DB_DSN= "mysql:host=localhost;dbname=test";
    $DB_USER= "root";
    $DB_PASS= "Maformation";
    // mode de gestion des erreurs (seront gérées comme des exceptions)
    $option= [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION];

    try
    {
     // query(): permet de renvoyer les données repondant à une ou plusieurs conditions
      $pdo = new PDO ($DB_DSN,$DB_USER,$DB_PASS,$option);

      //préparer la requete
      $requete=$pdo->prepare("SELECT *FROM utilisateur WHERE nom=?");
      /* bindValue(): permet de lier des valeurs à des parametres et permet d'exicuter 
      une requete plusieurs fois juste en changeant les parametres, elle évalue la requete 
      au moment de l'appeler
      bindParam(): fait le meme travaille que bindValue(), sauf elle évalue la requete
      au moment de son exicution par (execute()).
      !!! au lieu de nom=? on peut ecrire :nom et aprés bindValue(nom,"AMMOUCHI")
      */
      $requete->bindValue(1,$nom);

      // Éxicuter la requete
      $requete->execute();

      //afficher la requete
      echo"<pre>";
      print_r($requete->fetch(PDO::FETCH_ASSOC));
      echo"<pre>";
      echo "connexion à la base de données réussie";
    }
     catch (PDOException $e)
     {
      echo "Erreur :".$e->getMessage();
     }
    ?>
</body>
</html>