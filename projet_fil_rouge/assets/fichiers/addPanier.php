<?php
session_start();
if (isset($_POST["addpanier"])) {
    $quantite = $_POST["quantite"];
    $nomPlat = $_POST["nomPlat"];
    $nomImage = $_POST["nomImage"];
    $prix = $_POST["prix"];
}

// Vérifier si le panier existe déjà dans la session
if (!isset($_SESSION['panier'])) {
    // Si le panier n'existe pas, le créer en tant que tableau vide
    $_SESSION['panier'] = array();
}
/*else {
    echo '<h3 class="text-danger">Votre panier est vide, merci d\'ajouter des plats</h3>';
}*/

// ajouter le produit dans la panier
$produit = array(
    "nomPlat" => @$nomPlat,
    "nomImage" => @$nomImage,
    "prix" => @$prix,
    "quantite" => @$quantite

);

if (@$quantite >= 1) {
    // Ajouter le produit dans le tableau
    $_SESSION['panier'][$nomPlat] = $produit;
}
/* else {
    echo '<h3 class="text-danger">Le dernier produit n\'est pas ajouté au panier,  quantité invalide</h3>';
}*/

// exit();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Panier</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>

<body>
    <?php
    require_once("header.php");
    ?>

    <div class="container d-none  d-md-block ">
        <div class="row text-center my-5 ">
            <div class="col-10">
                <table class="table">
                    <thead>
                        <tr>
                            <img src="" alt="" width="" class="img-fluid">

                            <th scope="col">Image</th>
                            <th scope="col">Plat</th>
                            <th scope="col">Prix Unitaire</th>
                            <th scope="col">Qantité</th>
                            <th scope="col">Sous total</th>
                            <th scope="col">Supprimer </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION["panier"] as $produit) {
                            echo '<tr>';

                            echo ' <td><img src="../img/category/' . $produit["nomImage"] . '" alt="" width="200" class="img-fluid" > </td>';
                            echo '<td>' . $produit["nomPlat"] . '</td>';
                            echo '<td>' . $produit["prix"] . ' €</td>';
                            echo '<td>' . $produit["quantite"] . '</td>';
                            echo '<td>' . $produit["quantite"] * $produit["prix"] . ' €</td>';
                            echo '</tr>';
                            $total = ($produit["quantite"] * $produit["prix"]) + $total;
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <form action="commande.php" method="post">

        <div class="row text-end my-5 ">
            <div class="col-10">
                <h3>Total : <?php echo $total ?> €</h3>
            </div>

            <div class="row text-center my-5 ">
                <div class="col-6">
                    <a href="../../index.php"><button type="button" class="btn btn-primary btn-lg">Continuer les achats</button></a>
                </div>
                <div class="col-6">
                <input type="hidden" value="<?php echo $total ?>" name="total">
                    <input type="submit" class="btn btn-success btn-lg" value="Passer la commande" name="commander">
                </div>

            </div>

        </div>
        </form>










        <?php
        require_once("footer.php");
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>