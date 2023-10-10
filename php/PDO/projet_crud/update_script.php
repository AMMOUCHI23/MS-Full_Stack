<?php
require_once("connexion.php");
// Récupérer les données envoyées par le formulaire
if (isset($_POST["modifier"])) {
  $disc_title = $_POST["title"];
  $artist_name = $_POST["artist"];
  $disc_year = $_POST["year"];
  $disc_genre = $_POST["genre"];
  $disc_label = $_POST["label"];
  $disc_price = $_POST["price"];
  $disc_picture = $_POST["disc_picture"];
  $disc_id = $_POST["disc_id"];
}


// Télechargé la nouvelle image si actualisée et l'enregestrée
if($_FILES['image']['error'] === UPLOAD_ERR_OK){
  print_r($_FILES["image"]);
  $file_name = $_FILES["image"]["name"];
  $file_tmp = $_FILES["image"]["tmp_name"];
  $upload_dir = "assets/img/";
  move_uploaded_file($file_tmp,$upload_dir.$file_name);
  $disc_picture=$file_name;

}
// si l'image n'est pas actualisée, on affiche l'image enregestrée déjà dans la base de donnée
 else{
  $connexion = new PDO($SDN, $user, $pass, $option);
  $sql="SELECT disc_picture FROM disc WHERE disc_id=:disc_id ";
  $requete= $connexion->prepare($sql);
  $requete->bindParam(":disc_id",$disc_id);
  $requete->execute();
  $data=$requete->fetch(PDO::FETCH_ASSOC);
    $disc_picture=$data["disc_picture"];

}


try {
  // connexion à la base de donnée si c'est la premiere connexion
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
  $sql = ("UPDATE disc 
  SET disc_title=:disc_title, disc_year=:disc_year, disc_picture=:disc_picture, disc_label=:disc_label, disc_genre=:disc_genre, disc_price=:disc_price, artist_id=:artist_id
  where disc_id=:disc_id ");
  $requete= $connexion->prepare($sql);
  $requete->bindParam(":disc_id",$disc_id);
  $requete->bindParam(":disc_title",$disc_title);
  $requete->bindParam(":disc_year",$disc_year);
  $requete->bindParam(":disc_picture",$disc_picture);
  $requete->bindParam(":disc_label",$disc_label);
  $requete->bindParam(":disc_genre",$disc_genre);
  $requete->bindParam(":disc_price",$disc_price);
  $requete->bindParam(":artist_id",$artist_id);
  $requete->execute();
  // revenir à la page index aprés l'actualisation des données
 header("Location: index.php");
  
} 
catch (PDOException $e) {
  echo "connexion echouée" . $e->getMessage();
}

?>