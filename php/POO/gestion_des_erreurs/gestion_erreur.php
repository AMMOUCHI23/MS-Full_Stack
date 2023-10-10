<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des erreurs</title>
</head>
<body>
    <?php
/* pour gérer une erreur on utilisant les exceptions, nous allons devoir prossider en trois temps 
qui correspondent à trois blocs de codes différents
Les lignes de codes qui sont aprés la premierre erreure ne sqeront pas exécutées (le srypte s'arrete)
*/
function division($x,$y){
    if($y==0){
// 1.bloc throw lancer l'exception
     throw new Exception("division par zéro est impossible");
    }
    return $x/$y;
}
// 2. bloc try dans lequel on teste si notre fonction va déclancher une exception ou pas
try{
   echo division(452,4)."<br>";
   echo division(2,0);"<br>";
   echo division(122,35);"<br>";
   echo division(122,0);"<br>";
}

// 3. bloc catch dans le quel on va rattrapper l'exception
catch (Exception $e){
echo "Message d'erreur: ".$e -> getMessage();
}
/*
// deuxieme exemple
echo "bonjour !";

if (!file_exists("fichier.txt")){
    throw new Exception("fichier non trouvé");
}
else{
    $fp=fopen("fichier.txt","r");
    $lire=fgets($fp);
}
try{
    $fp=fopen("fichier.txt","r");
    echo $lire;
}
catch(Exception $e){
    echo " Message d'erreur ".$e -> getMessage();

}
*/
 ?>
    
</body>
</html>