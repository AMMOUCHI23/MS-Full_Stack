<?php
session_start();

if (($_SESSION["auth"]) && ($_SESSION["auth"] == "ok")) {
   unset($_SESSION["auth"]);
   unset($_SESSION["panier"]);
   header("Location: connexionCompte.php");
} else {
    require("login.php");
}
?>