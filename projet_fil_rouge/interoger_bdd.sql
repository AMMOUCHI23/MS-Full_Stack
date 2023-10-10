-- Active: 1694501931623@@127.0.0.1@3306@the_district_creation
/* 1. Afficher la liste des commandes ( la liste doit faire apparaitre la date, 
les informations du client, le plat et le prix )*/
SELECT c.date_commande, c.nom_client, c.telephone_client, c.email_client, c.adresse_client, p.libelle, p.prix 
FROM commande c
JOIN plat p
ON c.id_plat = p.id;

-- 2. Afficher la liste des plats en spécifiant la catégorie
SELECT p.libelle plats , ca.libelle catégorie
FROM plat p
JOIN categorie ca
ON p.id_categorie = ca.id;

-- 3. Afficher les catégories et le nombre de plats actifs dans chaque catégorie
SELECT ca.libelle "catégorie", count(p.id) "nombre de plats actifs"
FROM plat p
JOIN categorie ca 
ON p.id_categorie = ca.id
GROUP BY ca.libelle;
--HAVING p.active = "yes";


--4. Liste des plats les plus vendus par ordre décroissant
SELECT p.libelle, c.quantite
FROM plat p
JOIN commande c
ON p.id = c.id_plat
ORDER BY c.quantite DESC;

--5. Le plat le plus rémunérateur
SELECT p.*, MAX(c.quantite * p.prix) "plat le plus remunérateur"
FROM plat p
JOIN commande c
ON p.id = c.id_plat;

--6. Liste des clients et le chiffre d'affaire généré par client (par ordre décroissant)
SELECT distinct nom_client, total "chiffre d'affaire"
FROM commande
WHERE etat != "annulée"
ORDER BY total DESC;



SELECT * FROM plat;

SELECT * FROM categorie;

SELECT * FROM commande;