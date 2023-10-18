<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes employé</title>
</head>

<body>
    <?php
    require_once("Magasins.class.php");
    class Employe extends Magasins
    {
        protected $nom;
        protected $prenom;
        protected $dateEmbouche;
        protected $poste;
        protected $salaire;
        protected $service;

        public function __construct($nom, $prenom, $dateEmbouche, $poste, $salaire, $service)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateEmbouche = $dateEmbouche;
            $this->poste = $poste;
            $this->salaire = $salaire;
            $this->service = $service;
        }

        public function getNom()
        {
            return $this->nom;
        }
        public function getPreom()
        {
            return $this->prenom;
        }
        public function getPste()
        {
            return $this->poste;
        }
        public function getEmbouche()
        {
            return $this->dateEmbouche;
        }
        public function getSalaire()
        {
            return $this->salaire;
        }
        public function getService()
        {
            return $this->service;
        }
        
        // 1. Méthode permettant de savoir depuis combien d'années l'employé est dans l'entreprise
        public function enciente()
        {
            $annee = date("Y", strtotime($this->dateEmbouche));
            $anneEnciente = (date("Y") - $annee);
            return $anneEnciente . " ans <br>";
            $this->prime();
            $this->chequeVacance();
        }
        // 2. Calcule de la prime de fin de l'année
        public function prime()
        {
            @$prime = ($this->salaire * 0.05) + (0.02 * $this->salaire * $this->enciente());
            echo "La prime de fin de l'année est : " . $prime . "<br>";
            $date1 = new DateTime();
            $date2 = new DateTime("11/30");
            if ($date1 > $date2) {
                return "L'ordre de transfere du la prime anuelle a été envoyer à la banque <br>";
            } else {
                return "L'ordre de transfere du la prime anuelle n'est pas encore envoyer à la banque <br>";
            }
        }

        //6. Intégrer les chèques vacances
        public function chequeVacance(){
            if ($this->enciente()>=1) {
                return "Le salarié a le droit à des chèques vacances <br>";
            }
            else{
                return "Le salarié n'a pas le droit à des chèques vacances <br>";
            }
        }

    }
    $employe1 = new Employe("AMMOUCHI", "Abdallah", "2023/04/15", "technicien", 20000, "production");
    $employe2 = new Employe("BERNARD", "Olivier", "2018/01/10", "vendeur", 24000, "vente");

    echo $employe1->enciente();
    echo $employe1->getnom();
    echo "<br>";
    echo $employe1->prime();
    echo $employe1->chequeVacance();

    echo $employe2->enciente();

    echo $employe2->prime();

    echo $employe2->chequeVacance();
    

    ?>
</body>

</html>