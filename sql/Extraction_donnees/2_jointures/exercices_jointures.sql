-- Active: 1697035567019@@127.0.0.1@3306@the_district_creation

-- 1. Rechercher le prénom des employés et le numéro de la région de leur département.
SELECT e.prenom, d.noregion
FROM employe e 
INNER JOIN dept d 
ON e.nodep = d.nodept;

/* 2. Rechercher le numéro du département, le nom du département, le
nom des employés classés par numéro de département (renommer les
tables utilisées).*/
SELECT e.nodep, d.nom "nom de département", e.nom "nom de l'employé"
FROM employe e 
INNER JOIN dept d 
ON e.nodep = d.nodept 
ORDER BY nodep;

-- 3. Rechercher le nom des employés du département Distribution
SELECT  e.nom "nom de l'employé"
FROM employe e 
INNER JOIN dept d 
ON e.nodep = d.nodept 
WHERE d.nom= "distribution" ;

-- Auto-jointure

/* 4. Rechercher le nom et le salaire des employés qui gagnent plus que
leur patron, et le nom et le salaire de leur patron.*/
SELECT e.nom, e.salaire, chef.nom chef, chef.salaire 
FROM employe e 
LEFT JOIN employe chef
ON e.nosup = chef.noemp 
WHERE  e.salaire > chef.salaire; 

-- Sous requetes (requetes imbriquées)

-- 5. Rechercher le nom et le titre des employés qui ont le même titre que Amartakaldire

-- Premiere méthode
SELECT nom, titre
FROM employe 
WHERE titre IN
(SELECT titre
FROM employe 
WHERE nom = "Amartakaldire" );

-- Deuxieme méthode 
SELECT nom, titre
FROM employe 
WHERE nom IN
(SELECT nom 
FROM employe 
WHERE titre= "représentant" );

/* 6. Rechercher le nom, le salaire et le numéro de département des
employés qui gagnent plus qu'un seul employé du département 31,
classés par numéro de département et salaire*/
 SELECT nom, salaire, nodep  
 FROM employe
 WHERE salaire > ANY
 (SELECT salaire
 FROM employe
 WHERE nodep = 31)
ORDER BY nodep, salaire;

/* 7. Rechercher le nom, le salaire et le numéro de département des
employés qui gagnent plus que tous les employés du département 31,
classés par numéro de département et salaire.*/
 SELECT nom, salaire, nodep  
 FROM employe
 WHERE salaire > ALL
 (SELECT salaire
 FROM employe
 WHERE nodep = 31)
 ORDER BY nodep, salaire;

/* 8. Rechercher le nom et le titre des employés du service 31 qui ont un
titre que l'on trouve dans le département 32*/
SELECT nom, titre 
 FROM employe
 WHERE nodep = 31 AND( titre IN
 (SELECT titre
 FROM employe
 WHERE nodep = 32))


/* 9. Rechercher le nom et le titre des employés du service 31 qui ont un
titre l'on ne trouve pas dans le département 32.*/
SELECT nom, titre 
 FROM employe
 WHERE nodep = 31 AND( titre NOT IN
 (SELECT titre
 FROM employe
 WHERE nodep = 32))

/* 10. Rechercher le nom, le titre et le salaire des employés qui ont le même
titre et le même salaire que Fairant.*/
SELECT nom, titre, salaire 
FROM employe
WHERE (titre = 
(SELECT titre
FROM employe
WHERE nom= "fairent"))
AND
(salaire = 
(SELECT salaire
FROM employe
WHERE nom= "fairent"));


/* 11. Rechercher le numéro de département, le nom du département, le
nom des employés, en affichant aussi les départements dans lesquels
il n'y a personne, classés par numéro de département*/
SELECT d.nodept, d.nom, e.nom 
FROM dept d 
LEFT JOIN employe e
ON d.nodept = e.nodep 
ORDER BY nodept;

-- Utilisation de fonctions de groupe

/*1. Calculer le nombre d'employés de chaque titre*/
SELECT titre, COUNT(nom) "nombre d'employés"
FROM employe
GROUP BY titre;

/*2. Calculer la moyenne des salaires et leur somme, par région.*/
SELECT d.noregion, AVG(e.salaire) "salaire moyen", SUM(e.salaire) "somme des salaire"
FROM employe e 
INNER JOIN dept d 
ON e.nodep = d.nodept
GROUP BY d.noregion;


/*3. Afficher les numéros des départements ayant au moins 3 employés.*/
SELECT nodep 
FROM employe
GROUP BY nodep
HAVING COUNT(nom) >= 3;

/*4. Afficher les lettres qui sont l'initiale d'au moins trois employés*/
SELECT SUBSTR(nom,1,1)
FROM employe
GROUP BY SUBSTR(nom,1,1)
HAVING COUNT (SUBSTR(nom,1,1)) >=3;


/*5. Rechercher le salaire maximum et le salaire minimum parmi tous les
salariés et l'écart entre les deux.*/
SELECT MAX(salaire), Min(salaire), (MAX(salaire)-Min(salaire)) "l'ecart"
FROM employe;

/*6. Rechercher le nombre de titres différents*/
SELECT  DISTINCT  COUNT( DISTINCT titre) "nombre de titre différents"
FROM employe


/*7. Pour chaque titre, compter le nombre d'employés possédant ce titre.*/
SELECT DISTINCT titre, COUNT(titre) "nombre de poste"
FROM employe
GROUP BY titre;

/*8. Pour chaque nom de département, afficher le nom du département et
le nombre d'employés.*/
SELECT d.nodept, d.nom, count(e.nom) "nombre d'employés"
FROM employe e 
INNER JOIN dept d     
on d.nodept = e.nodep
GROUP BY nodept;

/*9. Rechercher les titres et la moyenne des salaires par titre dont la
moyenne est supérieure à la moyenne des salaires des Représentants*/
SELECT titre, AVG(salaire)
FROM employe
GROUP BY titre
HAVING AVG(salaire) > 
(select AVG(salaire)
FROM employe
where titre = "representant");

/*10.Rechercher le nombre de salaires renseignés et le nombre de taux de
commission renseignés*/
select COUNT(salaire), COUNT(tauxcom)
FROM employe;


select *, MAX(prix)  from plat 
