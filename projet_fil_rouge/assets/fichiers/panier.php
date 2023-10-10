<?
session_start();
include("addPanier.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <title>Panier</title>
</head>
<body>
    
<table class="table">
  <thead>
    <tr>
        <img src="" alt="" width="" class="img-fluid">
      
      <th scope="col">Image</th>
      <th scope="col">Plat</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Qantité</th>
      <th scope="col">Sous total</th>
      <th scope="col">Supprimer </th>
    </tr>
  </thead>
  <tbody>
<?php

foreach ($_SESSION["panier"] as $produit) {
    echo'<tr>';
     
     echo' <td><img src="../img/category/'.$produit["nomImage"].'" alt="" width="200" class="img-fluid" > </td>';
     echo '<td>'.$produit["nomPlat"].'</td>';
     echo '<td>'.$produit["prix"].'</td>';
     echo '<td>'.$produit["quantite"].'</td>';
     echo '<td>'.$produit["quantite"]*$produit["prix"].'</td>';
  
     echo'</tr>';
}
?>
    
   
  </tbody>
</table>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>