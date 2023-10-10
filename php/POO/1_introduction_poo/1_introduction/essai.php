<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratique</title>
</head>
<body>
    <?php

use Categorie as GlobalCategorie;

    class Categorie {
        public $id;
        private $nom;
        public $description;
      
        public function __construct($id=0, $nom="", $description="") {
          $this->id = $id;
          $this->nom = $nom;
          $this->description = $description;
        }
      
        public function getNom() {
          return $this->nom;
        }
      
        public function setNom($nom) {
          $this->nom = $nom;
          return $this;
        }
      
        public function afficher() {
          echo $this->nom . " : " . $this->description;
        }
      }

    $cat=new GlobalCategorie(2,"pasta", " toutes les patates");
    echo "La description du plat est : ".$cat->description."<br>";
    echo "Le nom de la catégorie : ".$cat->getNom()."<br>";
    $cat->setNom("Patate");
    echo "Le nom de la catégorie : ".$cat->getNom()."<br>";
  



    ?>
</body>
</html>