<?php
// Récupérer les données envoyées par le formulaire
if (isset($_POST["supprimer"])) {
  $disc_title = $_POST["title"];
  $artist_name = $_POST["artist"];
  $disc_year = $_POST["year"];
  $disc_genre = $_POST["genre"];
  $disc_label = $_POST["label"];
  $disc_price = $_POST["price"];
  $disc_picture = $_POST["picture"];
  $disc_id = $_POST["disc_id"];
}

// connexion à la base de donnée record
require_once("connexion.php");
try {
  $connexion = new PDO($SDN, $user, $pass, $option);
  echo "connexion réussie";
  //RÉcupérer artist_id
  $requete = $connexion->prepare("SELECT artist_id FROM artist where artist_name=:artist_name");
  $requete->bindParam(":artist_name", $artist_name);
  $requete->execute();
  $data = $requete->fetchAll(PDO::FETCH_OBJ);
  foreach ($data as $artist) {
    $artist_id = $artist->artist_id;
  }

  // Enregestrement les modifications dans la base de donneé
  $sql = ("DELETE FROM disc 
  WHERE disc_id=:disc_id");
  $requete= $connexion->prepare($sql);
  $requete->bindParam(":disc_id",$disc_id);
  $requete->execute();
  header("Location:index.php");
  
} 
catch (PDOException $e) {
  echo "connexion echouée" . $e->getMessage();
}

?>