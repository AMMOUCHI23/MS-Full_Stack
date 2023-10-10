<?php
class Visiteur{
    //publique et private pour définir les droits d'accés, si on peut acceder aux proprietés en dehors de la class
    //il y a trois niveaux d'accés private, public et protected
    private $prenom;
    public $nom;
    //méthode set_prenom
    public function set_prenom($nouveau_prenom){
        $this-> prenom = $nouveau_prenom;
    
    }
    public function set_nom($nouveau_nom){
        $this-> nom = $nouveau_nom;
    
    }
    //méthode get_prenom
    public function get_prenom(){
        return $this-> prenom;
    }
}
?>