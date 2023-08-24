-- Active: 1689890361410@@127.0.0.1@3306@exemple
/*1. Afficher toutes les informations concernant les employés.*/
SELECT * FROM employe;

/*2. Afficher toutes les informations concernant les départements.*/
SELECT * FROM dept;

/* 3. Afficher le nom, la date d'embauche, le numéro du supérieur, le
numéro de département et le salaire de tous les employés*/
SELECT nom,dateemb, nosup,nodep,salaire 
FROM employe;
