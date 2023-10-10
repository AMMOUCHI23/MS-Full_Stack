<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Héritage</title>
</head>

<body>
    <?php
    /*
       Une classe abstraite est une classe qu'on peut pas instanciée (elle ne peut pa avoir d'objets)
       c'est une manière de factoriser du code qui veut dire éviter de repéter plusieurs fois 
       le meme code à devert endroit d'un projet.


    */
    abstract class Mere
    {
        abstract protected function hello();
    }

    class Fille extends Mere
    {
        public function hello()
        {
            echo "Hello je suis la fille";
        }
    }

    $obj=new fille();
    $obj-> hello();

    ?>
</body>

</html>