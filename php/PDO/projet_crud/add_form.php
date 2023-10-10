<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Formulaire d'ajout</title>
</head>

<body>
    <?php
    require_once("fonctions.php")
    ?>

     
    <form action="add_script.php" method="post" enctype="multipart/form-data">
        <div class="container mt-5">
            <h3>Ajouter un vinyle</h3>
            <div class="row">
                <div class="mb-3 mt-3">
                    <label for="formGroupExampleInput" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Artist</label>
                    <select class="form-select" aria-label="Default select example" name="artist">
                        <option selected>Queens of the Stone Age</option>
                        <option><?php nomArtist() ?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput3" class="form-label">Year</label>
                    <input type="text" class="form-control" id="formGroupExampleInput3" name="year" placeholder="Enter year">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput4" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="formGroupExampleInput4" name="genre" placeholder="Enter genre (Rock, Pop, Prog...">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput5" class="form-label">Label</label>
                    <input type="text" class="form-control" id="formGroupExampleInput5" name="label" placeholder="Enter label (EMI, Warner, PolyGam, Univers sale ...">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput6" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="formGroupExampleInput6">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput7" class="form-label">Picture</label><br>
                    <input type="file"  name="picture" placeholder="Coisir un fichier">

                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Ajouter" name="ajouter"></input>
                    <button type="button" class="btn btn-primary">Retour</button>

                </div>


            </div>
        </div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>