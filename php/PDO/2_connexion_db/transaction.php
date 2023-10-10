<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les transaction</title>
</head>
<body>
   <?php
   /*
   Les transactions sont un moyen de grouper des opérations de base de données 
   en une seule unité logique. Une transaction peut être utilisée pour s'assurer 
   que plusieurs opérations sont exécutées de manière atomique, 
   c'est-à-dire que toutes les opérations sont exécutées ou aucune d'entre elles ne l'est.
    */
    try {
        //$conn nous permettra d'accéder au connecteur PDO

        $conn->beginTransaction();

        // Ajouter une nouvelle catégorie
        $stmt = $conn->prepare("INSERT INTO categorie (libelle, image, active) VALUES (:libelle, :image, :active)");
        $stmt->bindValue(':libelle', 'Cuisine française');
        $stmt->bindValue(':image', 'new_cat.jpg');
        $stmt->bindValue(':active', 'Yes');
        $stmt->execute();
        $id_categorie = $conn->lastInsertId();

        // Ajouter plusieurs nouveaux plats
        $stmt = $conn->prepare("INSERT INTO plat (libelle, description, prix, image, active, id_categorie) VALUES (:libelle, :description, :prix, :image, :active, :id_categorie)");
        $stmt->bindValue(':libelle', 'Gratin dauphinois');
        $stmt->bindValue(':description', 'Un plat hivernal traditionnellement composé de pommes de terre cuites en rondelles, crème fraîche, lait et noix de muscade');
        $stmt->bindValue(':prix', 13.50);
        $stmt->bindValue(':image', 'plat1.jpg');
        $stmt->bindValue(':active', 'Yes');
        $stmt->bindValue(':id_categorie', $id_categorie);
        $stmt->execute();
        $plat_id = $conn->lastInsertId();

        $stmt = $conn->prepare("INSERT INTO plat (libelle, description, prix, image, active, id_categorie) VALUES (:libelle, :description, :prix, :image, :active, :id_categorie)");
        $stmt->bindValue(':libelle', 'Ratatouille');
        $stmt->bindValue(':description', 'En véritable plat méditerranéen, la ratatouille est un ragoût mijoté de légumes du soleil et d’huile d’olive. Tomates, courgettes, aubergines, poivrons, oignons et ail composent la recette.');
        $stmt->bindValue(':prix', 10.00);
        $stmt->bindValue(':image', 'plat2.jpg');
        $stmt->bindValue(':active', 'Yes');
        $stmt->bindValue(':id_categorie', $id_categorie);
        $stmt->execute();
        $plat_id = $conn->lastInsertId();

        // Valider la transaction
        $conn->commit();
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        $conn->rollback();
        echo "Erreur : " . $e->getMessage();
    }
   ?> 
</body>
</html>