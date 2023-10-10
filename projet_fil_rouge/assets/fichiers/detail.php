<?php
session_start();
$nomPlat = $_SESSION["detail_plat"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style1.css">
    <title>Détail du plat</title>
</head>

<body>
    <?php
    require("header.php")
    ?>
    <div class="contenaire mt-5 mx-3">
        <div class="row justify-content-center">
            <?php


            try {
                require("../../connexion.php");
                $connexion =  new PDO($SDN, $user, $pass, $option);

                $sql = "SELECT * From plat WHERE libelle=:libelle";
                $requete = $connexion->prepare($sql);
                $requete->bindParam(":libelle", $nomPlat);
                $requete->execute();
                // $data = $requete->fetchColumn();

                $data = $requete->fetchAll(PDO::FETCH_OBJ);


                foreach ($data as $resultat) {
                    
                    echo '<div class="col-md-4 mx-3">';
                    echo '<form action="addPanier.php" method="post">';
                    echo '<img src="../img/category/' . $resultat->image . '" class="card-img-top" alt="...">';
                    echo '</div>';
                    echo '<div class="col-md-5 mx-3">';
                    echo '<h2 class="text-primary">' . $resultat->libelle . '</h2>';
                    echo '<h4 class="py-3">' . $resultat->prix . '€</h4>';

                    echo '<input type="hidden" value="' . $resultat->libelle . '" name="nomPlat">';
                    echo '<input type="hidden" value="' . $resultat->image . '" name="nomImage">';
                    echo '<input type="hidden" value="' . $resultat->prix . '" name="prix">';

                    echo '<label class="card-text text-end h5">Quantité </label>';
                    echo '<input type="number" class="text-center quantite" placeholder="0" name="quantite">';
                    echo '<h5 class="text-primary mt-3">Ingrédients :</h5>';
                    echo '<p>' . $resultat->description . '</p>';
                    echo '<input type="submit" class="btn btn-primary  my-2" value="Ajouter au panier" name="addpanier"> <br>';
                    echo '<a href="../../index.php" class="btn btn-lg btn-primary my-5 ">Continuer les achats </a>';
                    echo '<a href="addPanier.php" class="btn btn-lg btn-success  ms-md-5 ">Passer la commande </a>';
                    echo '</div>';
                    echo '</div>';
                    echo ' </form>';
                    echo '</div>';
                    
                }
            } catch (PDOException $e) {
                echo "Probleme de connexion à la base de donnée" . $e->getMessage();
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