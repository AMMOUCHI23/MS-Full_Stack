<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau</title>
</head>
<body>
<?php
// Tableau associatif
$tableau=[
    "janvier"=> 500,
    "février"=>250,
    "mars"=>350,
    "avril"=>120,
    "mail"=>320,
    "juin"=>220
];

//Manipulation des tableaux associatifs
$facture_sixmois=0;
foreach ($tableau as $mois => $value) {
    echo "Le montant de la facture du mois ".$mois. " est ".$value."<br>";
    $facture_sixmois+=$value;
    
}
echo"Le montant de la facture de six_mois est: ".$facture_sixmois;

//La fonction sort()
//Cette fonction vous permet de trier dans l'ordre alphabétique ou numérique les données d'un tableau.
$nom = array("franck","laurent","caroline","magali","veronique");   
sort($nom);
echo"<br>";
echo"<br>";
foreach ($nom as $key => $value) {
    echo$value."\t";
}

//La fonction rsort(array);
//Tri décroissant d'un tableau
echo"<br>";
echo"<br>";
$nom = array("franck","laurent","caroline","magali","veronique");
rsort($nom);

for ($nb1=0;$nb1<count($nom); $nb1++) 
{
   echo "$nom[$nb1]<br>";
}


 //La fonction asort()
//Tri décroissant sur un tableau associatif, l'indexation des clefs est conservée. 
//Le tri se fait sur les valeurs, pas sur les clés :
echo"<br>";
echo"<br>";
$tableau = array("a" => "Lundi",
                 "b" => "Mardi",
                 "c" => "Mercredi",
                 "d" => "Jeudi",
                 "e" => "Vendredi"
            ); 
            print_r(array_keys($tableau));
            echo "<br>";
asort($tableau);

foreach($tableau as $cle => $valeur) 
{ 
   echo $cle ." : ".$valeur."<br>"; 
}

//La fonction array_push();
//Cette instruction permet d'ajouter un élément à la fin du tableau.
$tableau = array("Lundi","Mardi","Mercredi","Jeudi"); 
array_push($tableau, "Vendredi"); 

//La fonction array_pop()
//Extrait un élément de la fin du tableau :
echo"<br>";
echo"<br>";
$tab = array("Lundi","Mardi","Mercredi"); 
$jour = array_pop($tab); 
echo$jour;
echo"<br>";

foreach ($tab as $key => $value) {
    echo$value."\t";
}
echo"<br>";
$arr = array("john", "paul", "georges", "ringo"); echo join(",",$arr);
?>
</body>
</html>