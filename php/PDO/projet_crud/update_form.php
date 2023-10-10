<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Formulaire de modification</title>
</head>

<body>
    <?php
    require_once("traitement.php");
    require_once("fonctions.php");
    ?>


    <form action="update_script.php" method="POST" enctype="multipart/form-data">
        <div class="container mt-5">
            <h3>Modifier un vinyle</h3>
            <div class="row">
                <div class="mb-3 mt-3">
                    <!--Passer la valeur de disc_id en  utilisant un champs caché -->
                    <input type="hidden" name="disc_id" value="<?php echo $disc_id ?>">
                    <!--Passer le nom disc_picture en utilisant un champs caché -->
                    <input type="hidden" name="disc_picture" value="<?php echo $disc_picture ?>">
                    <label for="formGroupExampleInput" class="form-label">Title</label>
                    <input type="text" class="form-control text-light-emphasis" id="title" name="title" value="<?php echo $disc_title ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Artist</label>
                    <select class="form-select text-light-emphasis" aria-label="Default select example" name="artist" value="<?php echo $disc_artist_name ?>">
                        <option selected>Queens of the Stone Age</option>
                        <option><?php nomArtist() ?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput3" class="form-label">Year</label>
                    <input type="text" class="form-control text-light-emphasis" id="formGroupExampleInput3" name="year" value="<?php echo $disc_year ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput4" class="form-label">Genre</label>
                    <input type="text" class="form-control text-light-emphasis" id="formGroupExampleInput4" name="genre" value="<?php echo $disc_genre ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput5" class="form-label">Label</label>
                    <input type="text" class="form-control text-light-emphasis" id="formGroupExampleInput5" name="label" value="<?php echo $disc_label ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput6" class="form-label">Price</label>
                    <input type="text" class="form-control text-light-emphasis" name="price" value="<?php echo $disc_price ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput7" class="form-label">Picture</label><br>
                    <input type="file"  name="image" placeholder="Coisir un fichier"><br>
                    <img src="assets/img/<?php echo $disc_picture ?>"  alt="" height="450">


                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Modifier" name="modifier">
                    <a href="index.php"><button type="button" class="btn btn-primary">Retour</button></a>

                </div>


            </div>
        </div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>