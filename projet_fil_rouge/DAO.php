<?php
// Fonction pour afficher six catégories actives les plus populaires
function get_categoriePopulaire(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
    
        //requete pour afficher les catégorie les plus populaires
        $sql="SELECT  distinct ca.*, c.quantite FROM categorie ca
        join plat p ON ca.id = p.id_categorie
        join commande c ON p.id = c.id_plat
        GROUP BY ca.id
        ORDER BY c.quantite DESC
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
         
           foreach ($data as $categorie ) {
           echo  '<div class="col-justify-content  col-sm-6 col-md-4 my-4 survol">';
            
            echo'<a href="assets/fichiers/'.$categorie->libelle.'.php"><img  class="img-thumbnail rounded " 
            src="assets/img/category/'.$categorie->image .'" width="300" height="300" ></a>';
            echo'<h3 class="nomCategorie my-2">'. $categorie->libelle .'</h3>';
            echo" </div>";
           
        }
      

    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }
    
}

// Fonction pour afficher six catégories actives
function get_categorieActive(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        
        $sql="SELECT DISTINCT * FROM categorie 
        WHERE active = 'yes'
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        foreach ($data as $categorie ) {
            
           echo '<div class="col-12  col-sm-6  col-md-4 my-5 survol">';
            echo '<a href="'.$categorie->libelle.'.php"><img class="img-thumbnail rounded " 
                 src="../img/category/'.$categorie->image.'" width="300" height="200"
                alt="image catégorie des plats principaux" title="image catégorie des plats principaux"></a>';
              echo  '<h2 class="categorie1 my-2">'.$categorie->libelle.'</h2>';
           echo '</div>';
        }
     

    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher les trois plat les plus vendues
function get_platSuper(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT p.* FROM plat p
        JOIN commande c ON p.id = c.id_plat
        ORDER BY c.quantite DESC
        LIMIT 3";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        
            foreach ($data as $plat ) {
                
                echo'<div class="carousel-item active">';
                   echo' <img src="assets/img/category/'.$plat->image.'" class="img-fluid rounded d-block w-100" alt="...">';
                echo'</div>'; 
            }

    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher six plats
function get_plat(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT * FROM plat 
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat ) {
            echo'<div class="card col-justify-content  col-sm-6 col-md-4 my-4">';
            echo'<img src="../img/food/'.$plat->image.'" class="card-img-top" alt="...">';
            echo'<div class="card-body">';
            echo  '<h5 class="card-title">'.$plat->libelle.'</h5>';
            echo  '<a href="descriptif_cafe_glace.php"><small class="card-text " >Cliquer pour plus de détails</small> </a>';
            echo   '<p class="#">'.$plat->prix.'</p> ';
            echo   '<label  class="card-text h5 " >Quantité</label>';
            echo '<input type="number" class="quantite text-center" placeholder="0" name="quantite" >';
            echo '<a href="#" class="btn btn-primary mx-3">Ajouter au panier</a>';
            echo '</div>';
            echo '</div>';
        }


    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher les plats de la catégorie Entrées
function get_platEntrees(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT * FROM plat 
        WHERE id_categorie = 5
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat ) {
            
            echo'<div class="card col-justify-content  col-sm-6 col-md-3 my-4 mx-4 "  >';
            echo'<form action="addPanier.php" method="post">';
            echo'<img src="../img/category/'.$plat->image.'"  class="card-img-top"  alt="...">';
            echo'<div class="card-body">';
            echo  '<h5 class="card-title">'.$plat->libelle.'</h5>';
            echo '<input type="hidden" value="'.$plat->libelle.'" name="nomPlat">';
            echo '<input type="hidden" value="'.$plat->image.'" name="nomImage">';
            echo '<input type="hidden" value="'.$plat->prix.'" name="prix">';
            echo  '<a href="#"><small class="card-text " >Cliquer pour plus de détails</small> </a>';
            echo   '<p class="card-text my-2" id="prix_cafe_glace">'.$plat->prix.' €</p> ';
            echo   '<label  class="card-text h5 mx-2 " >Quantité</label>';
            echo '<input type="number" class="quantite text-center" placeholder="0" name="quantite" >';
            echo '<input type="submit" class="btn btn-primary mx-3 my-2" value="Ajouter au panier" name="addpanier">';
            echo '</div>';
           
            echo' </form>';
            echo '</div>';
           
           
        }
      
       

    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher les plats de la catégorie des plats principaux
function get_platPrincipaux(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT * FROM plat 
        WHERE id_categorie = 10
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat ) {
            echo'<div class="card col-justify-content  col-sm-6 col-md-3 my-4 mx-4 ">';
            echo'<form action="addPanier.php" method="post">';
            echo'<img src="../img/category/'.$plat->image.'" class="card-img-top" alt="...">';
            echo'<div class="card-body">';
            echo  '<h5 class="card-title">'.$plat->libelle.'</h5>';
            echo '<input type="hidden" value="'.$plat->libelle.'" name="nomPlat">';
            echo '<input type="hidden" value="'.$plat->image.'" name="nomImage">';
            echo '<input type="hidden" value="'.$plat->prix.'" name="prix">';
            echo  '<a href="#"><small class="card-text " >Cliquer pour plus de détails</small> </a>';
            echo   '<p class="card-text my-2" id="prix_cafe_glace">'.$plat->prix.' €</p> ';
            echo   '<label  class="card-text h5 mx-2" >Quantité</label>';
            echo '<input type="number" class="quantite text-center" placeholder="0" name="quantite" >';
            echo '<input type="submit" class="btn btn-primary mx-3 my-2" value="Ajouter au panier" name="addpanier">';
            echo '</div>';
           
            echo' </form>';
            echo '</div>';
           
        }


    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher les plats de la catégorie des Sandwichs
function get_platSandwichs(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT * FROM plat 
        WHERE id_categorie = 4
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat ) {
            echo'<div class="card col-justify-content  col-sm-6 col-md-3 my-4 mx-4 ">';
            echo'<form action="addPanier.php" method="post">';
            echo'<img src="../img/category/'.$plat->image.'" class="card-img-top" alt="...">';
            echo'<div class="card-body">';
            echo  '<h5 class="card-title">'.$plat->libelle.'</h5>';
            echo '<input type="hidden" value="'.$plat->libelle.'" name="nomPlat">';
            echo '<input type="hidden" value="'.$plat->image.'" name="nomImage">';
            echo '<input type="hidden" value="'.$plat->prix.'" name="prix">';
            echo  '<a href="#"><small class="card-text " >Cliquer pour plus de détails</small> </a>';
            echo   '<p class="card-text my-2" id="prix_cafe_glace">'.$plat->prix.' €</p> ';
            echo   '<label  class="card-text h5 mx-2 " >Quantité</label>';
            echo '<input type="number" class="quantite text-center" placeholder="0" name="quantite" >';
            echo '<input type="submit" class="btn btn-primary mx-3 my-2" value="Ajouter au panier" name="addpanier">';
            echo '</div>';
           
            echo' </form>';
            echo '</div>';
           
        }


    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher les plats de la catégorie des Soupes
function get_platSoupes(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT * FROM plat 
        WHERE id_categorie = 9
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat ) {
            echo'<div class="card col-justify-content  col-sm-6 col-md-3 my-4 mx-4 ">';
            echo'<form action="addPanier.php" method="post">';
            echo'<img src="../img/category/'.$plat->image.'" class="card-img-top" alt="...">';
            echo'<div class="card-body">';
            echo  '<h5 class="card-title">'.$plat->libelle.'</h5>';
            echo '<input type="hidden" value="'.$plat->libelle.'" name="nomPlat">';
            echo '<input type="hidden" value="'.$plat->image.'" name="nomImage">';
            echo '<input type="hidden" value="'.$plat->prix.'" name="prix">';
            echo  '<a href="#"><small class="card-text " >Cliquer pour plus de détails</small> </a>';
            echo   '<p class="card-text my-2" id="prix_cafe_glace">'.$plat->prix.' €</p> ';
            echo   '<label  class="card-text h5 mx-2" >Quantité</label>';
            echo '<input type="number" class="quantite text-center" placeholder="0" name="quantite" >';
            echo '<input type="submit" class="btn btn-primary mx-3 my-2" value="Ajouter au panier" name="addpanier">';
            echo '</div>';
           
            echo' </form>';
            echo '</div>';
           
        }


    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher les plats de la catégorie des Desserts
function get_platDesserts(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT * FROM plat 
        WHERE id_categorie = 14
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat ) {
            echo'<div class="card col-justify-content  col-sm-6 col-md-3 my-4 mx-4 ">';
            echo'<form action="addPanier.php" method="post">';
            echo'<img src="../img/category/'.$plat->image.'" class="card-img-top" alt="...">';
            echo'<div class="card-body">';
            echo  '<h5 class="card-title">'.$plat->libelle.'</h5>';
            echo '<input type="hidden" value="'.$plat->libelle.'" name="nomPlat">';
            echo '<input type="hidden" value="'.$plat->image.'" name="nomImage">';
            echo '<input type="hidden" value="'.$plat->prix.'" name="prix">';
            echo  '<a href="#"><small class="card-text " >Cliquer pour plus de détails</small> </a>';
            echo   '<p class="card-text my-2" id="prix_cafe_glace">'.$plat->prix.' €</p> ';
            echo   '<label  class="card-text h5 mx-2" >Quantité</label>';
            echo '<input type="number" class="quantite text-center" placeholder="0" name="quantite" >';
            echo '<input type="submit" class="btn btn-primary mx-3 my-2" value="Ajouter au panier" name="addpanier">';
            echo '</div>';
           
            echo' </form>';
            echo '</div>';
           
        }


    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

// Fonction pour afficher les plats de la catégorie des Boissons
function get_platBoissons(){
    try {
        require("connexion.php");
        $connexion=  new PDO($SDN,$user,$pass,$option);
        $sql="SELECT DISTINCT * FROM plat 
        WHERE id_categorie = 13
        LIMIT 6";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat ) {
            echo'<div class="card col-justify-content  col-sm-6 col-md-3 my-4 mx-4 ">';
            echo'<form action="addPanier.php" method="post">';
            echo'<img src="../img/category/'.$plat->image.'" class="card-img-top" alt="...">';
            echo'<div class="card-body">';
            echo  '<h5 class="card-title">'.$plat->libelle.'</h5>';
            echo '<input type="hidden" value="'.$plat->libelle.'" name="nomPlat">';
            echo '<input type="hidden" value="'.$plat->image.'" name="nomImage">';
            echo '<input type="hidden" value="'.$plat->prix.'" name="prix">';
            echo  '<a href="#"><small class="card-text  " >Cliquer pour plus de détails</small> </a>';
            echo   '<p class="card-text my-2" id="prix_cafe_glace">'.$plat->prix.' €</p> ';
            echo   '<label  class="card-text h5 mx-2" >Quantité</label>';
            echo '<input type="number" class="quantite text-center" placeholder="0" name="quantite" >';
            echo '<input type="submit" class="btn btn-primary mx-3 my-2" value="Ajouter au panier" name="addpanier">';
            echo '</div>';
           
            echo' </form>';
            echo '</div>';
           
        }


    } catch (PDOException $e) {
        echo "Connexion à la base de donnée echouée".$e->getMessage();
    }

}

?>
