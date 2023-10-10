<?php
if (isset($_POST["connecter"])) {
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $cpass=$_POST["cpass"];
    $erreur="";
    if ($pass != $cpass) {
        $erreur="Erreur de confirmation de mot de passe";
        
    }

    echo $nom." / ".$prenom." / ".$email." / ".$pass." / ".$cpass;
}

else {
    echo"j'ai rien reçu";
}
header("location: inscription.php");
?>