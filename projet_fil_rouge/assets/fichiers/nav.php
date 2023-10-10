<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurant au cœur d'Amiens, commander en ligne parmi une large sélection de plats, manger sur place ou à emporter. Des Menus variés pour le plaisir des petis et de grands dans votre réstaurant The District">
    <title>Catégories des plats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style1.css">
</head>

<body>
<nav class="p_navbar navbar  navbar-expand-lg bg-danger-subtle">

<div class="container-fluid text-uppercase mx-4 py-3 ">
    <img  src="../img/logo.png" class="img-responsive" id="logo" alt="...">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto  mb-lg-0 nav-fill pe-5 ">

            <li class="nav-item px-2 ">
                <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link active" aria-current="page" href="#">Catégorie</a>
            </li>
            <li class="nav-item px-2 ">
                <div class="dropdown">
                    <a class="btn  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Plats
                    </a>
                  
                    <ul class="dropdown-menu bg-danger-subtle">
                      <li><a class="dropdown-item" href="#">Entrées</a></li>
                      <li><a class="dropdown-item" href="#">Plats principaux</a></li>
                      <li><a class="dropdown-item" href="#">sanduichs</a></li>
                      <li><a class="dropdown-item" href="#">Soupes</a></li>
                      <li><a class="dropdown-item" href="#">Desserts</a></li>
                      <li><a class="dropdown-item" href="#">Boissons</a></li>
                    </ul>
                  </div>
            </li>
            <li class="nav-item px-2">
                <a href="commande.php" class="nav-link active" aria-current="page" href="#">Contact</a>
            </li>
            <!--Ajouter une icone panier-->
            <a href="addPanier.php"><li class="nav-item px-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4 " viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                  </svg>
            </li></a>
               <!--Ajouter une icone mon compte-->
               <a href="login.php">
                    <li class="nav-item px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    </li>
                </a>
            

        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-5" type="text" placeholder="Rechercher..." aria-label="Search">
            <button class="btn btn-outline-danger" type="submit">Recherche</button>
        </form>
       
    </div>
</div>
</nav>
<div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <img class="img-responsive img-fluid rounded" id="fond" src="../img/fond2.png" alt="image nom de réstaurant" >
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>