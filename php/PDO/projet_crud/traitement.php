<?php
 
    if (isset($_POST["modifier"]))  {
        $disc_title = $_POST["title"];
        $artist_name = $_POST["artist"];
        $disc_year = $_POST["year"];
        $disc_genre = $_POST["genre"];
        $disc_label = $_POST["label"];
        $disc_price = $_POST["price"];
        $disc_picture = $_POST["disc_picture"];
        $disc_id = $_POST["disc_id"];
        include('update_form.php');
    }
    elseif (isset($_POST["supprimer"])){
        $disc_title = $_POST["title"];
        $artist_name = $_POST["artist"];
        $disc_year = $_POST["year"];
        $disc_genre = $_POST["genre"];
        $disc_label = $_POST["label"];
        $disc_price = $_POST["price"];
        $disc_picture = $_POST["picture"];
        $disc_id = $_POST["disc_id"];
        include('delete_form.php');
    }
    else {
        echo "Probleme de connexion à la page traitemen";
    }
?>