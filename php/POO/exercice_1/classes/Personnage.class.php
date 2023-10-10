<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Personnage</title>
</head>

<body>
    <?php
    //  Créer la classe Personnage
    class Personnage
    {
        private $nom;
        private $prenom;
        private $age;
        private $sexe;

      // définir les fonctions giters 
        public function getNom()
        {
            return $this->nom;
        }
        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function getSexe()
        {
            return $this->sexe;
        }



      // définir les fonctions siters
        public function setNom($nom)
        {
            return $this->nom = $nom;
        }

        public function setPrenom($prenom)
        {
            return $this->prenom = $prenom;
        }

        public function setAge($age)
        {
            return $this->age=$age;
        }

        public function setSexe($sexe)
        {
            return $this->sexe=$sexe;
        }
    }
    ?>

</body>

</html>