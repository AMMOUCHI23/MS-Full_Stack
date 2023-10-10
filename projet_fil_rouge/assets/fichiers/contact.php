<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurant au cœur d'Amiens, commander en ligne parmi une large sélection de plats, manger sur place ou à emporter. Des Menus variés pour le plaisir des petis et de grands dans votre réstaurant The District">
    <title>Nous Contacter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style1.css">
</head>

<body>
    

    
    <?php
    //importer le fichier header.php
    require_once("header.php");
    ?>

    <form method="post"  name="contact" id="contact" class="row g-3 my-5 ms-3">
        <div class="row justify-content-center">
            <div class="col-md-4 my-3">
                <label for="inputNom" class="form-label">Nom<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nom" id="inputNom" placeholder="votre nom">
                <p id="nom_inv" style="color: red;"></p>
            </div>
            <div class="col-md-4 my-3">
                <label for="inputPrenom" class="form-label">Prénom<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="prenom" id="inputPrenom" placeholder="votre prénom">
                <p id="prenom_inv" style="color: red;"></p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 my-3">

                <label for="inputEmail" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="toto@hotmail.fr">
                <p id="email_inv" style="color: red;"></p>
            </div>
            <div class="col-md-4 my-3">
                <label for="inputTelephone" class="form-label">Téléphone<span class="text-danger">*</span></label>
                <input type="tel" class="form-control" name="telephone" id="inputTelephone" placeholder="0680808080">
                <p id="telephone_inv" style="color: red;"></p>
            </div>
        </div>
        
        <div class="row  justify-content-center">
            <div class="col-md-8 my-3">
                <label for="text" >Votre demande<span class="text-danger">*</span></label>
                <textarea class="form-control" placeholder="Votre demande..." name="text" id="floatingTextarea2" style="height: 100px"></textarea>
                <p id="text_inv" style="color: red;"></p>
                <p id="obligatoire"> <span class="text-danger">*</span> Champs Obligatoires</p>
            </div>
        </div>
        
        <div class="row justify-content-end">
            <div class="col-3 mt-3">
                <button type="submit" name="envoyer" id="envoi" class="btn btn-primary btn-lg">Envoyer</button>

            </div>
        </div>
    </form>

    <?php
    //importer le fichier footer.php
    require_once("footer.php");

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="../javascript/script.js"></script>


</body>

</html>