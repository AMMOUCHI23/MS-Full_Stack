-- Active: 1692861955732@@127.0.0.1@3306@exemple

-- Les jointures
/*Les jointures en SQL permettent de lier des données provenant de différentes tables 
en utilisant une clé commune entre elles. Cette opération permet d'obtenir 
des résultats plus précis et complets en combinant les données de plusieurs tables.*/
-- 1. INNER JOINT
/*L'INNER JOIN renvoie uniquement les enregistrements qui ont une correspondance dans 
les deux tables.Il est donc important que les clés de jointure soient définies correctement.*/
SELECT e.nom, d.nom
FROM employe e
INNER JOIN dept d ON e.nodep = d.nodept;

-- 2. LEFT JOIN
/*Le LEFT JOIN renvoie tous les enregistrements de la table de gauche,et les enregistrements 
correspondants de la table de droite, Si aucun enregistrement ne correspond dans
 la table de droite, les valeurs NULL sont renvoyées.*/

 --3. RIGHT JOIN: fait le contraire de LEFT JOINT
 SELECT e.nom, d.nom
FROM employe e
RIGHT JOIN dept d ON e.nodep = d.nodept;

-- 4. FULL OUTER JOIN
/*Le FULL OUTER JOIN ou FULL JOIN renvoie tous les enregistrements des deux tables, avec les enregistrements 
correspondants des deux tables. Si aucun enregistrement ne correspond, les valeurs NULL sont renvoyées.
 Note: Ce type de jointure n'est pas compatible avec MySQL, mais elle peut être reproduite en utilisant UNION 
 entre une jointure LEFT JOIN et une jointure RIGHT JOIN.*/
 SELECT colonnes
FROM table1
FULL OUTER JOIN table2 ON table1.colonne = table2.colonne; 

-- Exemple avec UNION
SELECT e.nom, d.nom
FROM employe e
LEFT OUTER JOIN dept d ON e.nodep = d.nodept
UNION
SELECT e.nom, d.nom
FROM employe e
RIGHT OUTER JOIN dept d ON e.nodep = d.nodept;

-- Autres types de jointures

-- 5. CROSS JSON
/*La jointure CROSS JOIN est un type de jointure qui retourne toutes les combinaisons possibles de lignes entre deux tables,
 créant ainsi un produit cartésien entre les deux tables. Cette jointure n'a pas besoin de conditions de jointure spécifiques
  pour fonctionner.*/
SELECT e.nom, d.nom
FROM employe e
CROSS JOIN dept d;

-- 6. SELF JSON
/*
Un SELF JOIN (ou auto-jointure) est une jointure qui est effectuée sur une SEULE TABLE, en utilisant 
une référence de colonne différente dans la même table.
Cela peut être utile pour associer des enregistrements avec eux-mêmes afin d'effectuer des comparaisons.*/
SELECT employe.nom, patron.nom AS superviseur
FROM employe 
LEFT JOIN employe patron ON employe.nosup = patron.noemp;

-- 7.NATURAL JOINT
/*La jointure NATURAL JOIN est effectuée sur les colonnes de deux tables qui ont le même nom.
 Si une colonne a le même nom dans les deux tables, elle est utilisée comme condition de jointure implicite.*/

SELECT e.nom, d.nom
FROM employe e
--NATURAL JOIN dept d;

--SQL ALL
/*Dans le langage SQL, la commande ALL permet de comparer une valeur dans l’ensemble 
de valeurs d’une sous-requête. En d’autres mots, cette commande permet de s’assurer 
qu’une condition est “égale”, “différente”, “supérieure”, “inférieure”, “supérieure ou égale”
 ou “inférieure ou égale” pour tous les résultats retourné par une sous-requête.*/
-- Syntaxe
/* 
SELECT *
FROM table1
WHERE condition > ALL (
    SELECT *
    FROM table2
    WHERE condition2
)
*/

-- SQL ANY ou SOME
/*Dans le langage SQL, la commande ANY (ou SOME) permet de comparer une valeur 
avec le résultat d’une sous-requête. Il est ainsi possible de vérifier si une valeur 
est “égale”, “différente”, “supérieur”, “supérieur ou égale”, “inférieur” ou “inférieur 
ou égale” pour au moins une des valeurs de la sous-requête.
A noter: le mot-clé SOME est un alias de ANY, l’un et l’autre des termes peut être utilisé.*/

-- Syntaxe
/*
SELECT *
FROM table1
WHERE condition > ANY (
    SELECT *
    FROM table2
    WHERE condition2
)
*/