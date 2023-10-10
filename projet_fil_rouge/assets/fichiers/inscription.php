<?php
require("nav.php");
if (isset($_POST["connecter"])) {
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$email=$_POST["email"];
    @$pass=$_POST["pass"];
    @$cpass=$_POST["cpass"];
    $erreur="";
    
   //vérifier la compatibilité du nom, prenom, email et mot de passe avec leurs expressions regulieres
  if (!preg_match("/^[a-zA-Z \-éèê]+$/", $nom)) {
    $erreur = "Nom non valide";
  } elseif (!preg_match("/^[a-zA-Z \-éèê.@]+$/", $prenom)) {
    $erreur = "Prénom non valide";
  } elseif (!preg_match("/^[a-zA-Z0-9.\-_]+@{1}[a-zA-Z_-]+[.]{1}[a-zA-Z]{2,3}$/", $email)) {
    $erreur = "email non valide";
  } elseif (!preg_match("/^[a-zA-Z0-9 \-éèê.@]{3,30}$/", $pass)) {
    $erreur = "Mot de passe non valide";
    // vérifier si la confirmtion de mot de passe est identique avec le mot de passe
  } elseif ($cpass!=$pass) {
    $erreur = "Mots de passe non identiques";
  } else {
    // cryptage du mot de passe
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    //echo $passHash;
    /*connexion à la base de donnée pour vérisfier si l'utilisateur existe déja dans notre base de donnée
    et enregestrer  les données de l'utilisateur si l'utilisateur n'existe pas dans la table utilisateur*/
    try {
      require ("../../connexion.php");
      $connexion= new PDO($SDN, $user,$pass,$option);
     
      // requete pour vérifier si l'utilisateur existe dans la table utilisateur
      $sql="SELECT * FROM utilisateur WHERE email=:email";
      $requete = $connexion -> prepare($sql);
      $requete -> bindParam(":email",$email);
      $requete->execute();
      
      $data = $requete->fetchColumn();
     
     // vérifier si l'adresse mail existe déjà dans notre base de donnée
        if ($data == 0) {
         // echo "bonjourgg";
          require ("../../connexion.php");
        $connexion= new PDO($SDN, $user,$pass,$option);
       // echo "connexion bien reussie";
        $sql="INSERT INTO utilisateur (nom_prenom, email, password)
               VALUES (:nom_prenom, :email, :password) " ;
        $requete1=$connexion->prepare($sql);
       
        $nom_prenom = $nom . '_' . $prenom;
        $requete1 -> bindParam(":nom_prenom",$nom_prenom);
        
        $requete1-> bindParam(":email",$email);
        
        $requete1 -> bindParam(":password",$passHash);
      
       
        $requete1 -> execute();
        
        echo"Votre compte est créé avec succés ! <br> Cliquez sur le lien ci-dessous pour se déreger sur la page de connexion.";
    
        //header("Location: login.php");

      }else{
        echo " Un compte existe dejà avec cette adresse mail !<br> Cliquez sur le lien ci-dessous pour se déreger sur la page de connexion.";
        //header("Location: login.php");
      }
     
    } catch (PDOException $e) {
      echo " Connexion non réussie".$e->getMessage();
    }
}
}

//header("location: inscription.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Formulaire d'authentification </title>
</head>

<body>
  <h1 style="color:blue;" class="mx-3 mt-5">Inscription</h1>
  <form action="" method="post" >
    <div class="row g-3">
      <div class="col-md-3 mx-3 mt-5">
        <label for="inputNom4" class="form-label">Nom*</label>
        <input type="text" class="form-control" name="nom" id="inputNom" placeholder="Entrer votre nom">
      </div>
      <div class="col-md-3 mx-3 mt-5">
        <label for="inputPrenom4" class="form-label">Prénom*</label>
        <input type="text" class="form-control" name="prenom" id="inputPrenom" placeholder="Entrer votre prénom">
      </div>

    </div>
    <div class="row g-3">
      <div class="col-md-3 mx-3 mt-5">
        <label for="inputEmail4" class="form-label">Email*</label>
        <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="toto@hotmail.com">
      </div>
      <div class="col-md-3 mx-3 mt-5">
        <label for="inputPassword4" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" name="pass" id="inputPassword4">
      </div>
      <div class="col-md-3 mx-3 mt-5">
        <label for="inputPassword" class="form-label">Confirmation de mot de passe*</label>
        <input type="password" class="form-control" name="cpass" id="inputPassword">
      </div>

      <div class="col-12 mx-3 mx-3 mt-3">
        <input type="submit" class="btn btn-lg btn-primary" name="connecter" value="se connecter">
      </div>

      <div class="mx-3" id="message" style="color: red;"><?php echo @$erreur; ?></div>

    </div>
    </div>
  </form>
  <div class="col-12 mx-3 mx-3 mt-3">
    <label for="">Pour se connecter à votre compte cliquez ici</label>
    <a href="login.php">lien de connexion </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>