<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trait</title>
</head>
<body>
    <?php 
    /*
      Le trait permet la réutilisation de code dans des classes indépendentes
      Un trait est semblable à une classe, mais il ne sert qu'à grouper des fonctionnalités 
      d'une manière intéressante. Il n'est pas possible d'instancier un Trait en lui-même.
      C'est un ajout à l'héritage traditionnel, qui autorise la composition horizontale 
      de comportements, c'est à dire l'utilisation de méthodes de classe sans besoin d'héritage.
    */

    // définir un trait

    trait tRouting
    {
        function parse()
        {
            echo "parsing...";
        }
        function get($req)
        {
            echo $req;
    
        }
    }
    class ModuleManager
    { 
        use tRouting;
    }

    class Template
     {
        use tRouting;
     }
    $test = new  ModuleManager();
    $test -> parse();
    echo "<br>";
    $html= new Template();
    $html->get("Mon premier article");
    ?>
</body>
</html>