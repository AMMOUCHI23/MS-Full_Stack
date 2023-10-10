<?php
// Récupérer les données envoyées par le formulaire
if (isset($_POST["ajouter"])) {
  $title = $_POST["title"];
  $artist = $_POST["artist"];
  $year = $_POST["year"];
  $genre = $_POST["genre"];
  $label = $_POST["label"];
  $price = $_POST["price"];
  
}
// Télechargé l'image et l'enregestrée
if(isset($_FILES["picture"]) ){
  $file_name = $_FILES["picture"]["name"];
  $file_tmp = $_FILES["picture"]["tmp_name"];
}
else {
  echo "la case files est vide";
}
//Définir le dossier d'enregestrement des images téléchargées
$upload_dir = "assets/img/";
//Déplacer les images téléchargées au dossier d'enregestrement 
if(move_uploaded_file($file_tmp,$upload_dir.$file_name)) {
  echo "L'image a été téléchargée et enregistrée avec succès.";
} else {
  echo "Erreur lors du téléchargement de l'image.";
}

// connexion à la base de donnée record
require_once("connexion.php");
try {
  $connexion = new PDO($SDN, $user, $pass, $option);
  echo "connexion réussie";

  //RÉcupérer artist_id
  $requete = $connexion->prepare("SELECT artist_id FROM artist where artist_name=:artist_name");
  $requete->bindParam(":artist_name", $artist);
  $requete->execute();
  $data = $requete->fetch(PDO::FETCH_OBJ);
  $artist_id = $data->artist_id;

  // Enregestrement des donneé dans la base de donneé
  $sql = ("INSERT INTO disc (disc_title , disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id)
  VALUES ( :disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price ,:artist_id  )");
  $requete = $connexion->prepare($sql);
  $requete->bindParam(":disc_title",$title );
  $requete->bindParam(":disc_year", $year);
  $requete->bindParam(":disc_picture", $file_name);
  $requete->bindParam(":disc_label", $label);
  $requete->bindParam(":disc_genre", $genre);
  $requete->bindParam(":disc_price", $price);
  $requete->bindParam(":artist_id", $artist_id);
  $requete->execute();
  header("Location: index.php");
  
} catch (PDOException $e) {
  echo "connexion echouée" . $e->getMessage();
}
?>