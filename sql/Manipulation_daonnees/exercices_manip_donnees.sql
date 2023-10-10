-- Active: 1692861955732@@127.0.0.1@3306@exemple
--1. L'instruction INSERT
--a. Ajouter trois employés dans la base de données.
INSERT INTO employe (noemp,nom, prenom, dateemb, nosup, titre, nodep, salaire,tauxcom)
VALUES (26,"dubois","jean","2001-04-05 00:00:00",8, "secrétaire",43,15000,NULL),
(27,"bernard","olivier","2001-04-06 00:00:00",9, "secrétaire",44,20000, NULL),
(28,"richard","anais","2001-04-10 00:00:00",10, "secrétaire",45,12000, NULL);

--verifier l'insertion
SELECT * FROM employe
WHERE noemp>25;

-- b. Ajouter un département
INSERT INTO dept (nodept, nom, noregion)
VALUES (60,"vente",6);

--vérifier l'insertion
SELECT * FROM dept;

-- 2. l'instruction UPDATE
-- a. Augmenter de 10% le salaire de l'employe 17

UPDATE employe
SET salaire = salaire * 1.1
WHERE noemp = 17;

--Vérification
SELECT salaire FROM employe
WHERE noemp = 17;

-- b. Changer le nom du département 45 en 'Logistique'
UPDATE dept
SET nom = "logistique"
WHERE nodept = 45;

-- Vérifaction
SELECT * FROM dept
WHERE nodept = 45;

-- 3. Linstruction DELETE
-- Supprimer le dernier des employés que vous avez insérés précédemment.
DELETE FROM employe
WHERE noemp = 28;

--Vérification
SELECT * FROM employe;

