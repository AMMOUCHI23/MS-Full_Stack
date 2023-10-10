<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>introduction MVC</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3 class="my-3"> Introduction à l'architecture MVC</h3>
                <p>Dans le contexte du développement logiciel, MCV signifie <b>Modèle-Vue-Contrôleur</b> (MVC en anglais). 
                 C'est un modèle d'architecture logicielle qui divise une application en trois composants interconnectés :</p>
                 <ol>
                    <li class="my-2"><b>Modèle (Model) :</b> Le modèle représente les données et la logique métier de l'application. 
                        Il gère les données, les règles de validation, et répond aux demandes de la vue pour afficher des informations.</li>
                     <li><b>Vue (View) :</b> La vue est responsable de l'interface utilisateur. Elle affiche les données au(x) utilisateur(s) et transmet leurs actions (clics de souris, saisie de texte, etc.) au contrôleur. La vue ne contient généralement pas de logique métier, mais se contente d'afficher les informations au format approprié.</li>
                    <li class="my-2"><b>Contrôleur (Controller) :</b> Le contrôleur agit comme un intermédiaire entre le modèle et la vue. Il gère les entrées de l'utilisateur, interprète ces entrées (comme des clics de bouton ou des saisies de clavier), effectue les actions appropriées sur le modèle et met à jour la vue en conséquence. Le contrôleur contient également la logique de gestion des événements et de la communication entre le modèle et la vue.</li>
                    </ol>
                    <p>L'architecture MVC permet une séparation claire des responsabilités au sein d'une application, ce qui facilite la maintenance, l'extension et la réutilisation du code. De plus, elle permet à différents développeurs de travailler sur différentes parties de l'application simultanément, ce qui améliore l'efficacité du développement logiciel.</p>
                    <h3>Symfony</h3>
                    <p>Symfony est un framework PHP open source largement utilisé pour le développement d'applications Web et d'applications d'entreprise. Il suit le modèle architectural MVC (Modèle-Vue-Contrôleur) et offre un ensemble robuste de composants et d'outils pour accélérer le processus de développement.</p>
                </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>