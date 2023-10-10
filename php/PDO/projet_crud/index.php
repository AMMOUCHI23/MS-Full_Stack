<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <?php
  // connexion à la base de données
  require_once("connexion.php");
  try {
    $connexion = new PDO($SDN, $user, $pass, $option);

    // afficher le nombre de disques
    $requete = $connexion->prepare("SELECT count(disc_id) nombre FROM disc");
    $requete->execute();
    $data = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
    foreach ($data as $nombre) {
      $nombreDisc = $nombre->nombre;
    }

  ?>
    <div class="row mt-3 mx-5  ">
      <div class="col-md-8">
        <h1>Liste des disques (<?php echo $nombreDisc ?>)</h1>
      </div>
      <div class="col-md-2">
        <a href="add_form.php"><input type="submit" class="btn btn-primary  mt-5 " value="Ajouter"></a>
      </div>
    </div>

    <?php
    // Afficher les disques
    $requete = $connexion->prepare("SELECT d.*, a.artist_name
     FROM artist a
     right Join disc d
     ON d.artist_id = a.artist_id");
    $requete->execute();
    $data = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

    foreach ($data as $artist) {
      $disc_picture = $artist->disc_picture;
      $disc_title = $artist->disc_title;
      $artist_name = $artist->artist_name;
      $disc_label = $artist->disc_label;
      $disc_year = $artist->disc_year;
      $disc_genre = $artist->disc_genre;
      $disc_id = $artist->disc_id;
    ?>
    
      <div class="container mx-5 " style="height: 250px;">
        <div class="row ">
          <div class="col-md-2">
            <img src="assets/img/<?php echo $disc_picture ?>" class="img-fluid rounded" alt="...">
          </div>
          <div class="col-md-3 mx-2">
            <div class="card-body">
              <strong><?php echo $disc_title ?></strong><br>
              <strong><?php echo $artist_name ?></strong><br>
              <strong>label: </strong><?php echo $disc_label ?><br>
              <strong>Year: </strong><?php echo $disc_year ?><br>
              <strong>Genre: </strong><?php echo $disc_genre ?>
              <div class="mt-5">
                <a href="details.php?disc_id=<?php echo $disc_id ?>"><input type="submit" class="btn btn-primary " name="detail" value="Détail"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php
    }
  } catch (PDOException $e) {
    echo "Connexion à la basqe de données échouée " . $e->getMessage();
  }

  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>