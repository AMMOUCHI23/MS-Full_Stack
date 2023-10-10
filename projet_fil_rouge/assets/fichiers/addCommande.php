<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




require("../../connexion.php");

require_once 'vendor/autoload.php';

if(isset($_POST["commander"])){

    $nomClient=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $telephone=$_POST["telephone"];
    $adresse=$_POST["adresse"];
    $dateactuelle = date("Y-m-d h:i:s");
    $etat="en préparation";
  
    foreach ($_SESSION["panier"] as $produit) {
        //connexion à la table plat et récuperer l id_plat
        $nomPlat= $produit["nomPlat"];
        $quantite= $produit["quantite"];
        $prix= $produit["prix"];
        $total= $prix * $quantite;


        $connexion= new PDO($SDN, $user, $pass, $option);
        $requete=$connexion->prepare("SELECT id FROM plat WHERE libelle=:libelle");
        $requete->bindParam(":libelle",$nomPlat);
        $requete->execute();
        $data=$requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $plat) {
            $id_plat=$plat->id;
           
        }
    }
    
        try {
            $connexion= new PDO($SDN, $user, $pass, $option);
           
            $sql=("INSERT INTO  commande ( id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) 
            VALUES (:id_plat, :quantite, :total, :date_commande, :etat, :nom_client, :telephone_client, :email_client, :adresse_client)");
            $requete=$connexion->prepare($sql);
            // echo $id_plat." ".$quantite." ".$total." ".$dateactuelle." ".$etat." ".$nom." ".$telephone." ".$email." ".$adresse."<br>";
            $requete->bindParam(":id_plat",$id_plat);
            $requete->bindParam(":quantite",$quantite);
            $requete->bindParam(":total",$total);
            $requete->bindParam(":date_commande",$dateactuelle);
            $requete->bindParam(":etat",$etat);
            $requete->bindParam(":nom_client",$nomClient);
            $requete->bindParam(":telephone_client",$telephone);
            $requete->bindParam(":email_client",$email);
            $requete->bindParam(":adresse_client",$adresse);
            $requete->execute();
            //unset($_SESSION["panier"]);

// Envoyer un mail pour confirmer
$mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       =  'smtp.gmail.com';    

// On désactive l'authentification SMTP
$mail->SMTPAuth   = true;    

// On configure le port SMTP (MailHog)
$mail->Port       = 587; 

$mail->Username = 'htedistrict@gmail.com'; // adresse e-mail //district_resto@hotmail.com
$mail->Password = 'hfdt pyap wlxc flti'; //                               
$mail->SMTPSecure = 'tls';
$mail->CharSet = 'UTF-8';
// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('htedistrict@gmail.com', 'The District Company');

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress($email,$nomClient);


//Adresse de reply (facultatif)
//$mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

// On ajoute la/les pièce(s) jointe(s)
//$mail->addAttachment('vendor/bonjour.pdf');

// Sujet du mail
$mail->Subject = 'Confirmation de la commande';

// Corps du message

$message = "Bonjour ".$nomClient."  ".$prenom. ", votre commande est prise en compte. <br>";
$message .= "Voici le détail de votre commande :<br>  <br>";
$total=0;
foreach ($_SESSION["panier"] as $produit) {
    //connexion à la table plat et récuperer l id_plat
    $nomPlat= $produit["nomPlat"];
    $quantite= $produit["quantite"];
    $prix= $produit["prix"];
    $sousTotal= $prix * $quantite;
    $total+= $sousTotal;
    $message .= $nomPlat." : ".$quantite." ---> ".$sousTotal." €<br>";
}
$message .="Les frais de livraison est de : 0 €<br>";
$message .="Le total de votre commande est de : ".$total." €<br>";
$message .="adresse de livraison : ".$adresse.".<br> <br>";
$message .="L'équipe du restaurant The District vous remercie pour votre commande.";
$mail->Body = $message;
unset($_SESSION["panier"]);
// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
        $mail->send();
        echo 'Merci pour votre commande,<br> vous aller recevoir un mail de confirmation de votre comande dans un instant';
      echo '<a href="../../index.php"> Revenir sur mon compte</a>';
    } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }
