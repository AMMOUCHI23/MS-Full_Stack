<?php
@session_start();
if (($_SESSION["auth"]) && ($_SESSION["auth"] == "ok")) {
    //header("Location: ../../index.php") ;
    
} else {
    header("Location: login.php");
}
?>
<nav class="p_navbar navbar  navbar-expand-lg bg-danger-subtle">

    <div class="container-fluid text-uppercase mx-4 py-3 ">
        <img src="../img/logo.png" class="img-responsive" id="logo" alt="...">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  mb-lg-0 nav-fill pe-5 ">

                <li class="nav-item px-2 ">
                    <a class="nav-link active" aria-current="page" href="../../index.php">Accueil</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link active" aria-current="page" href="categorie.php">Catégorie</a>
                </li>
                <li class="nav-item px-2 ">
                    <div class="dropdown">
                        <a class="btn  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Plats
                        </a>

                        <ul class="dropdown-menu bg-danger-subtle">
                            <li><a class="dropdown-item" href="Nos_Entrees.php">Entrées</a></li>
                            <li><a class="dropdown-item" href="Nos_Plats_Principaux.php">Plats principaux</a></li>
                            <li><a class="dropdown-item" href="Nos_Sandwichs.php">sanduichs</a></li>
                            <li><a class="dropdown-item" href="Nos_Soupes.php">Soupes</a></li>
                            <li><a class="dropdown-item" href="Nos_Desserts.php">Desserts</a></li>
                            <li><a class="dropdown-item" href="Nos_Boissons.php">Boissons</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item px-2">
                    <a href="contact.php" class="nav-link active" aria-current="page">Contact</a>
                </li>
                <!--Ajouter une icone panier-->
                <a href="addPanier.php">
                    <li class="nav-item px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4 " viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                        </svg>
                    </li>
                </a>
                <!--Ajouter une icone mon compte-->
                <a href="connexionCompte.php">
                    <li class="nav-item px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    </li>
                </a>
                <!--Ajouter une icone de déconnexion-->
                <a href="deconnexion.php">
                    <li class="nav-item px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                        </svg>
                </a>

            </ul>
            <form action="recherche.php" method="post" class="d-flex" role="search" >
            <input class="form-control me-5" type="text" name="terme_rechercher" placeholder="Rechercher..." aria-label="Search">
            <input class="btn btn-outline-danger" type="submit" name="recherche" value="Recherche">
        </form>

        </div>
    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <img class="img-responsive img-fluid rounded" id="fond" src="../img/fond2.png" alt="image nom de réstaurant">
        </div>
    </div>
</div>