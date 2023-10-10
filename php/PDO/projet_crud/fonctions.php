<?php

function nomArtist(){
    try {
        require_once("connexion.php");
        $connexion= new PDO ($SDN,$user,$pass,$option);
        $requete=$connexion->prepare("SELECT artist_name FROM artist");
        $requete-> execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $artist) {
           echo "<option>".$artist->artist_name."</option>";
        }
    } catch (PDOException $e) {
        echo "Error : ".$e-> getMessage();
    }
}

function detailDisc(){
    try {
        require_once("connexion.php");
        $connexion= new PDO ($SDN,$user,$pass,$option);
        $requete=$connexion->prepare("SELECT d.disc_title, a.artist_name, d.disc_label, d.disc_year, d.disc_genre
         FROM artist a
         Join disc d
         ON d.artist_id = a.artist_id");
        $requete-> execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $artist) {
           echo $artist->disc_title."/".$artist->artist_name."/".$artist->disc_label."<br>" ;
        }
    } catch (PDOException $e) {
        echo "Error : ".$e-> getMessage();
    }
}



?>