<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style1.css">
    <title>Accueil</title>
</head>

<body>
    <?php
    require("header.php");
    ?>
    '<div class="container text-center">
        <div class="row justify-content-center ">
            <?php
            require("DAO.php");
           get_categoriePopulaire();
            ?>
            <div class="description text-black redressed   text-capitalize fst-italic  justify-content-center align-items-center col-12  col-md-5 my-4 py-5">
                <h1 class="fs-2 bg-danger" id="change-position">The District</h1>
                <h3>Au cœur d'Amiens, notre Restaurant Gastronomique propose une cuisine raffinée, élaborée à partir des produits locaux et de saison. </h3>

            </div>


            <div id="carouselExampleAutoplaying" class="carousel slide justify-content-center col-10 col-md-5 my-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php 
                  
                get_platSuper();
                ?> 
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <?php
    require("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>