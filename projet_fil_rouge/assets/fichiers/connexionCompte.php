<?php
session_start();

if ((@$_SESSION["auth"]) && ($_SESSION["auth"] == "ok")) {
    echo "vous etes sur votre page";
    header("Location: ../../index.php") ;
} else {
    require("login.php");
}
?>