<?php
@session_start();
if (isset($_POST["connecter"])) {
  // email et mot de passe saisis par l'utilisatseur
  $email = $_POST["email"];
  $passe = $_POST["passe"];
  $erreur = "";

  //vérifier si l'email existe dans la base dedonnée
  try {
    require("../../connexion.php");
    $connexion = new PDO($SDN, $user, $pass, $option);

    $sql = "SELECT * FROM utilisateur WHERE email=:email";
    $requete = $connexion->prepare($sql);
    $requete->bindParam(":email", $email, PDO::PARAM_STR);
    $requete->execute();
    $data = $requete->fetch(PDO::FETCH_OBJ);
    if ($data) {
      //vérifier si le mot de passe associé à cette adresse est le meme avec celui introduit par l'utilisateur
      $hash = $data->password;


      // vérifier le mot de passe en utilisant la fonction d'ashage
      if (password_verify($passe, $hash)) {
        echo "vous etes connecté";
        // créer une variable de session
        $_SESSION["auth"] = "ok";
        //afficher la page index
      //unset($_SESSION["auth"]);
         
      header("Location: ../../index.php");
        
      } else {
        $erreur = "mot de passe incorrect";
      }
    } else {
      $erreur = "L'adresse e-mail n'existe pas dans la base de données.";
    }
  } catch (PDOException $e) {
    echo "Connexion à la base de donnée échouée";
  }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Connexion </title>
</head>

<body>
<?php
require("nav.php");
?>
  <h1 style="color:blue;" class="mx-3 mt-5">Authentification</h1>
  <form action="" method="post" class="row g-3">
    <div class="col-md-3 mx-3 mt-5">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4">
    </div>
    <div class="col-md-3 mx-3 mt-5">
      <label for="inputPassword4" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" name="passe" id="inputPassword4">
    </div>

    <div class="col-12 mx-3">
      <input type="submit" class="btn btn-primary" name="connecter" value="se connecter">
    </div>

    <div class="mx-3" id="message" style="color: red; "><?php echo @$erreur;?></div>

  </form>
  <div class="col-12 mx-3 mx-3 mt-3">
    <label for="">Si vous n'avez pas de compte</label>
    <a href="inscription.php">créer un compte </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>