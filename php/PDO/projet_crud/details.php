<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Détails de disc</title>
</head>

<body>
  <?php
  // Récupéré la valeur de disc_id dans l'url
  if (isset($_GET["disc_id"])) {
    $disc_id =  $_GET["disc_id"];
  }
  
  // connexion à la base de données record et récupérer les détails de disc
  require_once("connexion.php");
  try {
    $connexion = new PDO($SDN, $user, $pass, $option);
    $sql = "SELECT d.*, a.artist_name  FROM disc d 
          JOIN artist a
          ON a.artist_id = d.artist_id
          where disc_id = :disc_id";
    $requete = $connexion->prepare($sql);
    $requete->bindParam(":disc_id", $disc_id);
    $requete->execute();
    $data = $requete->fetchAll(PDO::FETCH_OBJ);
    foreach ($data as $detail) {
      $title = $detail->disc_title;
      $artist = $detail->artist_name;
      $year = $detail->disc_year;
      $genre = $detail->disc_genre;
      $label = $detail->disc_label;
      $price = $detail->disc_price;
      $picture = $detail->disc_picture;
      
    }
    
  ?>
    <form action="traitement.php" method="POST">
      <div class="row g-3 mx-3 mt-5">
        <h3>Details</h3>
        <div class="col-md-3">
          <!--Passer la valeur de disc_id en  utilisant un champs caché -->
          <input type="hidden" name="disc_id" value="<?php echo $disc_id ?>">
          <!--Passer le nom disc_picture en utilisant un champs caché -->
          <input type="hidden" name="disc_picture" value="<?php echo $picture ?>">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control  bg-secondary" id="title" name="title" value="<?php echo $title ?>">
        </div>
        <div class="col-md-3">
          <label for="artist" class="form-label">Artist</label>
          <input type="text" class="form-control bg-secondary" id="artist" name="artist" value="<?php echo $artist ?>">
        </div>
      </div>
      <div class="row g-3 mx-3">
        <div class="col-md-3">
          <label for="year" class="form-label">Year</label>
          <input type="text" class="form-control bg-secondary" id="year" name="year" value="<?php echo $year ?>">
        </div>
        <div class="col-md-3">
          <label for="genre" class="form-label">Genre</label>
          <input type="text" class="form-control bg-secondary" id="genre" name="genre" value="<?php echo $genre ?>">
        </div>
      </div>
      <div class="row g-3 mx-3">
        <div class="col-md-3">
          <label for="label" class="form-label">Label</label>
          <input type="text" class="form-control bg-secondary" id="label" name="label" value="<?php echo $label ?>">
        </div>
        <div class="col-md-3">
          <label for="price" class="form-label">Price</label>
          <input type="text" class="form-control bg-secondary" id="price" name="price" value="<?php echo $price ?>">
        </div>
      </div>
      <div class="row g-3 mx-3">
        <div class="col-md-3">
          <input type="hidden" value="<?php echo $picture ?>" name="picture">
          <label for="picture" class="form-label">Picture</label> <br>
          <img src="assets/img/<?php echo $picture ?>" value="<?php echo $picture ?>" alt="" height="450">
        </div>
      </div>
      <div class="row g-3 mx-3">
        <div class="col-md-3">
          <input type="submit" class="btn btn-primary mt-5" name="modifier" value="Modifier">
          <input  type="submit" value="Supprimer" name="supprimer" class="btn btn-primary mt-5">
          <a href="index.php"><button type="button" class="btn btn-primary mt-5">Retour</button></a>
        </div>
      </div>
    </form>
  <?php
  } catch (PDOException $e) {
    echo "Erreur de connexion à la base de données" . $e->getMessage();
  }

  ?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>