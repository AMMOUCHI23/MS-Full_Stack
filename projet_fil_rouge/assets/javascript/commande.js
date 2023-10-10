console.log("Je suis connecté...!  :)");
document.getElementById("commande").addEventListener("submit", function (e) {
    
	const nom_v=/^[a-zA-Z\s]+$/;
	const email_v=/^[a-zA-Z0-9.\-_]+@{1}[a-zA-Z_-]+[.]{1}[a-zA-Z]{2,3}$/;
	const telephone_v=/^0{1}[0-9]{9}$/;
	const adresse_v=/^[a-zA-Z0-9\s]{1,300}$/;
	
	if (!nom_v.test(this["nom"].value)) {
		e.preventDefault();
		document.getElementById("nom_inv").innerHTML = "Nom invalide"
	}if (nom_v.test(this["nom"].value ) )
	{
			document.getElementById("nom_inv").innerHTML = "";
		
	}
	if (!nom_v.test(this["prenom"].value))
	 {
		e.preventDefault();
		document.getElementById("prenom_inv").innerHTML = "Prénom invalide";
	}
	if (nom_v.test(this["prenom"].value))
	 {
		document.getElementById("prenom_inv").innerHTML = "";
	}
	if (!email_v.test(this["email"].value)) {
		e.preventDefault();
			document.getElementById("email_inv").innerHTML = "Email invalide";
		}
	if(email_v.test(this["email"].value))
		{
			document.getElementById("email_inv").innerHTML = "";
		}
		if (!telephone_v.test(this["telephone"].value)) {
			e.preventDefault();
			document.getElementById("telephone_inv").innerHTML = "Numéro de téléphone invalide";
			
		}
		if (telephone_v.test(this["telephone"].value )){
			
			document.getElementById("telephone_inv").innerHTML = "";
			
		}

		if (!adresse_v.test(this["adresse"].value)) {
			e.preventDefault();
			document.getElementById("text_inv").innerHTML = "Le champs est requis ";
		}
		if (adresse_v.test(this["adresse"].value )) {
			document.getElementById("text_inv").innerHTML = "";
			alert("Le formulaire est rempli avec succé!.\nCliquer sur ok pour confirmer votre commande.")
		}
		
});

	