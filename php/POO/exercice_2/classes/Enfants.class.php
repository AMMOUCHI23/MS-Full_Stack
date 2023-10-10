<?php
require_once("Employe.class.php");
class Enfants extends Employe{
    private $enfant_0_10;
    private $enfant_11_15;
    private $enfant_16_18;
    
    public function __construct($nom, $prenom, $dateEmbouche, $poste, $salaire, $service,$enfant_0_10,$enfant_11_15,$enfant_16_18)
    {
        parent::__construct($nom, $prenom, $dateEmbouche, $poste, $salaire, $service);
        $this->enfant_0_10=$enfant_0_10;
        $this->enfant_11_15=$enfant_11_15;
        $this->enfant_16_18=$enfant_16_18;
    }
//Définir les fonctions guiters
public function getEnfants_0_10(){
    $this->enfant_0_10;
}
public function getEnfants_11_15(){
    $this->enfant_11_15;
}
public function getEnfants_16_18(){
    $this->enfant_16_18;
}
// Définir la méthode chèques Noèl
public function chequeNoel(){
    if (($this->enfant_0_10 !=0) || ($this->enfant_11_15 !=0) || ($this->enfant_16_18 !=0)) {
        echo "Le Salarié à le droit aux chèques Noèl <br>";
        if ($this->enfant_0_10 !==0) {
            echo "Nombre de chèques de 20 euros est :" .$this->enfant_0_10."<br>" ;
        }
        if ($this->enfant_11_15 !==0) {
            echo "Nombre de chèques de 30 euros est :" .$this->enfant_11_15."<br>" ; 
        }
        if ($this->enfant_16_18 !==0) {
            echo "Nombre de chèques de 50 euros est :" . $this->enfant_16_18 ."<br>"; 
        }
    }

    else {
        echo "Le Salarié n'a pas le droit aux chèques Noèl <br>";
    }
}
}
echo "Bonjour";
$enfant1 = new Enfants("AMMOUCHI", "Abdallah", "2023/04/15", "technicien", 20000, "production",1,1,2);
    echo $enfant1 ->chequeNoel();
?>