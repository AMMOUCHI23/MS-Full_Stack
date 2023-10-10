-- Active: 1692861955732@@127.0.0.1@3306@the_district_creation

   --1. Ecrivez une requête permettant de supprimer les plats non actif de la base de données
   DELETE FROM plat
   WHERE active != "yes";

--2. Ecrivez une requête permettant de supprimer les commandes avec le statut livré
DELETE FROM commande
WHERE etat = "livrée";

/*3. Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et 
un plat dans cette nouvelle catégorie.*/
--Ajouter une nouvelle categorie
INSERT INTO categorie (id, libelle, image, active)
VALUES (id ,"nouvelle catégorie","image","yes");
-- Récupérer l'id de la nouvelle catégorie
SELECT id FROM categorie 
WHERE libelle = "nouvelle catégorie";
-- Ajouter un plat avec l'id de la nouvelle catégorie
INSERT INTO plat (id, libelle, description, prix, image,id_categorie, active)
VALUES ("...");

--4. Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'
UPDATE plat
SET prix = prix * 1.1
WHERE id_categorie IN
( SELECT id FROM categorie
WHERE libelle = "pizza");

-- vérifier les nouveax prix des pezza
SELECT p.libelle, p.prix 
FROM plat p
JOIN categorie ca
ON p.id_categorie = ca.id
WHERE ca.libelle = "pizza";


SELECT * FROM plat;
SELECT * FROM categorie;

SELECT * FROM commande;