<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Introduction</title>
</head>

<body>
  <?php
  // La POO utilisée à partir de php5
  /*
    la programmation orientée objet est un outil incroyable pour améliorer la qualité,
     la lisibilité et la modularité de votre code. 
     Les objets sont des instances de classes qui contiennent des propriétés (attributs) 
     et des comportements (méthodes).
    ********* Le concept de classe*********
      La notion la plus importante en programmation orientée objet est le concept de classe.
      Les classes sont des moules, des patrons qui permettent de créer des objets en série 
      sur le même modèle.
      Le nom de la classe ne peut contenir que des caractères alphanumérique et des underscores
Chaque classe doit par ailleurs être définie dans un fichier qui lui est propre, et qui porte par 
convention le nom de la classe suivi de l'extension (ex: NomClasse.class.php).


 Les principaux concepts de la Programmation Orientée Objet :
Classes : Une classe est un modèle ou un plan pour créer des objets.
          Elle décrit les attributs (variables) et les méthodes (fonctions) que possède l'objet.

Objets : Un objet est une instance d'une classe. Il est créé à partir d'une classe 
         et possède ses attributs et ses méthodes. Par exemple, un objet de la classe "Plat" peut 
         avoir un attribut "nom" et une méthode "afficher" qui affiche le nom du plat.

Encapsulation : L'encapsulation est le fait de cacher les détails d'implémentation d'un objet et 
                de ne laisser accéder que les méthodes qui sont nécessaires à l'utilisateur de l'objet. 
                Cela permet de protéger les données de l'objet et d'améliorer la sécurité et 
                la maintenabilité du code.

Héritage : L'héritage permet de créer une nouvelle classe à partir d'une classe existante 
           en héritant de ses attributs et méthodes. La nouvelle classe peut ensuite ajouter ses propres
           attributs et méthodes ou modifier ceux de la classe parent. Cela permet de réutiliser 
           le code et de créer une hiérarchie de classes.

Polymorphisme : Le polymorphisme permet à un objet d'être utilisé de différentes manières. 
                Il peut prendre différentes formes en fonction du contexte. Par exemple, une méthode  
                "afficher" peut avoir une implémentation différente dans une classe "Plat" 
                et dans une classe "Categorie".

Abstraction : L'abstraction consiste à simplifier un concept complexe en enlevant les détails 
qui ne sont pas nécessaires à l'utilisateur. Cela permet de rendre le code plus facile à comprendre 
et à utiliser. Par exemple, une classe "Menu" peut abstraire les détails de chaque plat et catégorie 
en fournissant simplement une liste de plats disponibles.
    */
/*
Constructeur
           Le constructeur est une méthode qui permet de lancer des opérations automatiquement lors d'une instanciation
           Le constructeur doit être déclaré avec la méthode suivante : __construct() et peut recevoir des arguments.
           Le constructeur est facultatif en PHP (mais obligatoire dans certains langages).
Destructeur
          L'inverse du constructeur est le destructeur : __destruct() qui permet de déréférencer des valeurs
          (attributs de l'objet).
          Cette méthode reste optionnelle en PHP et peu utilisée. Elle revêt une utilité dans certains cas,
           par exemple pour fermer une ressource, par exemple un fichier ouvert avec la fonction fopen().
*/
  // 1. Création de la classe catégorie :

  class Categorie
  {
    public $id;
    public $nom;
    public $description;

    public function __construct($id, $nom, $description)
    {
      $this->id = $id;
      $this->nom = $nom;
      $this->description = $description;
    }
    // la fonction afficher() permet d'afficher l'id, le nom, et la description de la catégorie
    public function afficher()
    {
      return $this->id . " " . $this->nom . " " . $this->description;
    }
    // on peut utiliser le fonction __toString pour afficher
    public function __toString()
    {
      return $this->id . " " . $this->nom . " " . $this->description;
    }
  }

  // 2. Création de la classe Plat :
  class Plat
  {
    public $id;
    public $nom;
    public $description;
    public $prix;
    public $categorie;

    public function __construct($id, $nom, $description, $prix, $categorie)
    {
      $this->id = $id;
      $this->nom = $nom;
      $this->description = $description;
      $this->prix = $prix;
      $this->categorie = $categorie;
    }

    public function afficher()
    {
      echo $this->id . " " . $this->nom . " : " . $this->description . " (" . $this->prix . "€) " . $this->categorie;

      // *Attention: $this->categorie ne fonctionnera pas si sur la classe Categorie il n'y a pas de fonction 
      // magique __toString() qui nous permet de traiter un objet comme chaîne de caractères! 
      // Dans ce cas, vous devez ou la rajouter ou alors appeler un ou plusieurs attributs de la classe 
      // Categorie.  
      // Par ex: $this->categorie->nom (si la propriété nom est declarée comme publique) ou 
      // $this->categorie->getNom() (si la propriété est déclarée comme privée, mais qu'elle a un getter 
      // (c'est-à-dire une fonction publique getNom()))
      //$categorie est une instance de la classe Categorie qui représente la catégorie à laquelle le plat est associé.
    }
  }

  // 3. Création de la classe enfant  PlatSpecial :
  // La création d'une classe enfant permet d'hériter des proprietés et des comportement d'une classe parent.

  class PlatSpecial extends Plat
  {
    public $specialite;

    public function __construct($id, $nom, $description, $prix, $categorie, $specialite)
    {
      parent::__construct($id, $nom, $description, $prix, $categorie);
      $this->specialite = $specialite;
    }

    public function afficher()
    {
      echo $this->nom . " : " . $this->description . " (" . $this->prix . "€)";
      echo " Spécialité : " . $this->specialite;
    }
  }
  /*
      Explication : Dans cet exemple, la classe PlatSpecial hérite de la classe Plat. On a ajouté 
      en plus une propriété publique ($specialite) et une méthode publique (le constructeur __construct 
      et la méthode afficher). La méthode afficher() surcharge la méthode afficher() de la classe Plat 
      pour y ajouter l'affichage de la spécialité du plat.
      */

  // 4 . Utilisation des classes que nous avons crées
  /*Vous pouvez créer une instance d'une classe n'importe où dans votre code, à condition que 
       la classe soit accessible dans l'espace de noms de votre fichier PHP. */

  // Inclusion des fichiers Plat.php, Categorie.php, PlatSpecial.php
  /*require_once('Categorie.php');
  require_once('Plat.php');
  require_once('PlatSpecial.php');*/

  // Création d'une instance de la classe Categorie
  $categoriePizza = new Categorie(1, "Pizzas", "Les meilleures pizzas du monde !");

  // Création d'une instance de la classe Plat
  $platMargherita = new Plat(1, "Margherita", "Tomate, mozzarella, basilic", 9.50, $categoriePizza);

  // Création d'une instance de la classe PlatSpecial
  $calzone = new PlatSpecial(1, "Calzone", "Tomate, mozzarella, jambon, champignons", 12.50, $categoriePizza, "Spécialité du chef");

  // Affichage des propriétés des objets
  $categoriePizza->afficher();
  echo "<br>";

  // Affiche "1 Pizzas : Les meilleures pizzas du monde !"
  $platMargherita->afficher();
  echo "<br>";
  // Affiche "1 Margherita : Tomate, mozzarella, basilic (9.5€) 1 - Pizzas"
  $calzone->afficher();
  echo "<br>";
  // Affiche "1 Calzone : Tomate, mozzarella, jambon, champignons" (12.5€) Spécialité de chef

  // 5 . Héritage vs Aggrégation
  /*
   L'héritage et l'agrégation sont deux concepts importants en Programmation Orientée Objet pour établir
    des relations entre les classes. Cependant, ils ont des approches différentes pour 
    établir ces relations.

    L'héritage est une relation entre une classe parent et une classe enfant, où la classe enfant 
    hérite des propriétés et des méthodes de la classe parent. En d'autres termes, la classe enfant 
    utilise la structure et le comportement de la classe parent (est un ("is a" en anglais) pour créer 
    ses propres propriétés et méthodes. L'héritage est souvent utilisé pour créer des classes 
    plus spécialisées à partir d'une classe générale. Dans l'exemple précédent, la classe PlatSpecial 
    hérite de la classe Plat pour ajouter une propriété et une méthode supplémentaires.

    L'agrégation, quant à elle, est une relation entre deux classes où une classe contient une autre 
    classe comme l'une de ses propriétés. En d'autres termes, la classe conteneur utilise la classe 
    contenue pour remplir une partie de sa fonctionnalité. L'agrégation est souvent utilisée pour créer 
    des relations "a un" ("has a" en anglais) ou "a plusieurs" entre les classes. Par exemple, dans le 
    projet The District, nous avons ajouté un attribut "categorie" dans la classe "Plat" qui contiendra 
    un objet de la classe "Categorie". Nous pouvons ensuite accéder à l'attribut "nom" de la classe 
    "Categorie" en utilisant cet objet.
   */
  $calzone->afficher(); // Affiche le plat
  $calzone->categorie->afficher(); // Affiche la catégorie du plat

  // 6. Encapsulation / Getter / Setter
  /*
  Pour protéger les détails de l'implémentation d'une classe, certaines propriétés peuvent être déclarées
  en private ou protected. De ce fait ces propriétés ne sont plus accessibles directement. 
  Pour autoriser l'accès, nous créons une méthode get qui permet de lire et set qui permet de modifier.
  */

  class Pategorie
  {
    public $id;
    private $nom;
    public $description;

    public function __construct($id = 0, $nom = "", $description = "")
    {
      $this->id = $id;
      $this->nom = $nom;
      $this->description = $description;
    }

    public function getNom()
    {
      return $this->nom;
    }

    public function setNom($nom)
    {
      $this->nom = $nom;
      return $this;
    }

    public function afficher()
    {
      echo $this->nom . " : " . $this->description;
    }
  }
  // Exemple d'utilisation
  $cat = new Pategorie(2, "Pasta", "Toutes les pates...");

  // echo $cat->nom; // NE FONCTIONNE PAS, LA PROPRIETE EST PRIVATE

  echo $cat->getNom();

  $cat->setNom("Pâtes");
  /*
 Explication: Dans cette exemple, nous déclarons l'attribut nom en private. Pour pouvoir y accéder, 
 nous avons créé une méthode getNom pour la lecture et une méthode setNom pour l'écriture. 
 La seule façon d'utiliser la propriété nom est d'utiliser les accesseurs getNom et setNom.*/

 // 7. Exemple avec PDO
 /*Les méthodes fecth et fetchAll de PDO sont capables de créer des instances de vos classes à partir
  d'une requête d'extraction.*/
  $db = new PDO($SDN,$user,$pass);

$request = $db->query("select * from categorie");
$categories = $request->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Categorie");

foreach ($categories as $categorie) {
    $categorie->afficher();
}
/*
Explication: Avec le mode PDO::FETCH_CLASS, la méthode fetchAll va reconstituer des objets de la classe
 Categorie à partir du résultat de la requête. La vavriable $categories contient donc une liste d'objets
  de type Categorie. Notez que dans le constructeur de la classe Categorie, les propriétés sont
   initialisées avec des valeurs par défaut. PDO::FETCH_PROPS_LATE appelle le constructeur de la classe
    avant d'assigner aux propriétés de l'objet les valeurs retrouvées dans les colonnes de la table.
 */

 foreach ($categories as $categorie) {
  $categorie->afficher();
}

// 8. Lavisibilité
/*
Visibilité
La visibilité d'une propriété, d'une méthode ou (à partir de PHP 7.1.0) d'une constante peut être définie 
en préfixant sa déclaration avec un mot - clé: public, protected, ou private.Les éléments déclarés comme
 publics sont accessibles partout.

L'accès aux éléments protégés est limité à la classe elle-même, ainsi qu'aux classes qui en héritent
 et parente. L'accès aux éléments privés est uniquement réservé à la classe qui les a définis.

Visibilité des propriétés
Les propriétés des classes doivent être définies comme publiques, protégées ou privées.

Si une propriété est déclarée en utilisant var, elle sera alors définie comme publique.

public: ce mot-clé placé avant la déclaration d'une propriété ou d'une méthode, signifie que cette
         propriété (ou cette méthode) sera visible et utilisable partout.
protected: ce mot-clé signifie que la propriété ne sera visible que depuis la classe qui la défini ou 
          depuis l'une de ses classes filles (les classes qui héritent d'elle).
private: ce mot-clé signifie que cette propriété ne sera visible et utilisable que depuis la classe 
         elle-même.
*/
/**
* Définition de MyClass
*/

class MyClass
{
   public $public = 'Public';
   protected $protected = 'Protected';
   private $private = 'Private';

   function printHello()
   {
       echo $this->public;
       echo $this->protected;
       echo $this->private;
   }

 } // -- fin de la classe MyClass

 $obj = new MyClass();

 echo $obj->public; // Fonctionne
 //echo $obj->protected; // Erreur fatale
 //echo $obj->private; // Erreur fatale

 $obj->printHello(); // Affiche Public, Protected et Private

 /**
 * Définition de MyClass2
 */

 class MyClass2 extends MyClass
 {
     // On peut redéclarer les propriétés publics ou protégés, mais pas ceux privés
     public $public = 'Public2';
     protected $protected = 'Protected2';

     function printHello()
     {
        echo $this->public;
        echo $this->protected;
        //echo $this->private;
     }
 } // -- fin de la classe MyClass2()

 $obj2 = new MyClass2();
 echo $obj2->public; // Fonctionne
 //echo $obj2->protected; // Erreur fatale
 //echo $obj2->private; // Indéfini

 $obj2->printHello(); // Affiche Public2, Protected2 et Undefined (Indéfini)

 // 9. Mutateurs et accesseurs
 /*
L'encapsulation et les principes de visibilité édictent que les attributs d'uen classe ne devraient jamais
 être manipulés directement à l'extérieur de la classe (pour éviter des acciddents tels que suppression, 
 mauvaise valeur etc.).

¨Par conséquent, les attributs devraient toujours être déclarés comme privés, avec le mot-clé private. 
et être manipulés ensuite par des méthodes appelées accesseurs et mutateurs (getters et setters en anglais).

Mutateur
La méthode qui sert de mutateur permet de définir la valeur d'un attribut. Elle reçoit en argument 
la variable qui contient cette valeur.
Par convention, les mutateurs ont le préfixe set et il est pratique de leur donner le nom de l'attribut concerné :
 Il faut écrire une méthode mutateur pour chaque attribut.
*/
// vehicule.class.php  

// Mutateur : définit/modifie la valeur passée en argument à l'attribut 
//public function setMarque($sMarque) 
{
   return $this->_marque = $sMarque;
  
}

//Accesseur
 
// vehicule.class.php  

// Accesseur : renvoie la valeur d'un attribut  
//public function getMarque() 
{
    return $this->_marque;
}
  ?>

</body>

</html>