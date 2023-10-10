<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
</head>
<body>
    <?php
    /* 
    L'interface est une API  (application programming interface ) OU (Interface de Programmation d'Applicatio)
      Les interfaces vont avoir un but similaire aux classes abstraites puisque l’un des intérêts
     principaux liés à la définition d’une interface va être de fournir un plan général 
     pour les développeurs qui vont implémenter l’interface et de les forcer à suivre 
     le plan donné par l’interface.

      De la même manière que pour les classes abstraites, nous n’allons pas directement pouvoir
    instancier une interface mais devoir l’implémenter, c’est-à-dire créer des classes dérivées
    à partir de celle-ci pour pouvoir utiliser ses éléments.

Les deux différences majeures entre les interfaces et les classes abstraites sont les suivantes :

   1- Une interface ne peut contenir que les signatures des méthodes ainsi qu’éventuellement 
   des constantes mais pas de propriétés. Cela est dû au fait qu’aucune implémentation n’est faite
   dans une interface : une interface n’est véritablement qu’un plan ;
   2- Une classe ne peut pas étendre plusieurs autres classes à cause des problèmes d’héritage.
   En revanche, une classe peut tout à fait implémenter plusieurs interfaces.  et une classe ne peut
   qu'étendre une seule autre classe
    */

    //le nom de l'interface commence avec I
    interface IArticle
    {
        public function getNbComments();
        public function create();
        public function save($auther, $content);
        public function delete();
    }

    class BlogArticle implements IArticle
    {
        public function getNbComments()
        {
            return 15;
        }

        public function create(){
            echo "create()";
        }
        public function save($auther, $content)
        {
            echo $content;
        }
      
        public function delete(){
            echo "supression...";
        }
     
    }
    $test = new BlogArticle();
    $test-> delete();
    ?>
</body>
</html>