<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurant au cœur d'Amiens, commander en ligne parmi une large sélection de plats, manger sur place ou à emporter. Des Menus variés pour le plaisir des petis et de grands dans votre réstaurant The District">
    <title>Réstaurant The District</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style1.css">
</head>

<body>
    <?php
    require_once("header.php");
    ?>


    <div class="contenaire mt-5 mx-3">
        <div class="row justify-content-center">
        <?php
if(isset($_POST["recherche"])){
    $terme_rechercher= $_POST["terme_rechercher"];

try {
   require ("../../connexion.php");
   $connexion =  new PDO ($SDN,$user, $pass,$option);

   $sql="SELECT * From plat WHERE libelle LIKE '%$terme_rechercher%'";
   $requete = $connexion ->prepare($sql);
   $requete->execute();
  // $data = $requete->fetchColumn();
   
   $data=$requete->fetchAll(PDO::FETCH_OBJ);
  
   if(count($data) != 0){
    foreach ($data as $resultat) {
        echo'<div class="col-md-4 mx-3">';
        echo '<img src="../img/category/'.$resultat->image.'" class="card-img-top" alt="...">';
     echo '</div>';
     echo '<div class="col-md-5 mx-3">';
     echo '<h2 class="text-primary">'.$resultat->libelle.'</h2>';
     echo'<h4 class="py-3">'.$resultat->prix.'€</h4>';
        
     echo'<label class="card-text text-end h5">Quantité </label>';
     echo'<input type="number" class="text-center quantite" placeholder="0" name="quantite">';
     echo'<h5 class="text-primary mt-3">Ingrédients :</h5>';
     echo'<p>'.$resultat->description.'</p>';
     echo'<a href="#" class="btn btn-primary my-2">Ajouter au panier</a><br>';
     echo'<a href="../../index.php" class="btn btn-lg btn-primary my-5 ">Continuer les achats </a>';
     echo'<a href="#" class="btn btn-lg btn-success  ms-md-5 ">Passer la commande </a>';
     echo'</div>';
     echo'</div>';
     echo'</div>';
     echo' </form>';
        }
        
   
    
   }
   else{
    //header("Location: Nos_Entrees.php") ;
   
   }
  
} catch (PDOException $e) {
    echo "Probleme de connexion à la base de donnée".$e->getMessage();
}
}

?>
           
            
    <div class="container ">
        <div class="row text-center my-5 ">
            <div class="col-6">
                <a href="../../index.php"><button type="button" class="btn btn-primary btn-lg">Précédent</button></a>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary  btn-lg">Suivant</button>
            </div>

        </div>

    </div>
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>