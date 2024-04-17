<?php
// login.php
//les informations de connexion à la base de données
// sont codées ici "en dur"
$host="localhost";
$dbname="meteo-php";
$user_meteo="meteo";
$passwd_meteo="meteopwd";

// on teste si nos variables sont définies  
if (isset($_POST['identifiant']) && isset($_POST['motdepasse'])) 
{ 
		// on teste si le login et le mot de passe sont valides
		if ($_POST['identifiant'] == $user_meteo  && $_POST['motdepasse'] == $passwd_meteo ) 
		{ 
			// dans ce cas, tout est ok, on peut démarrer notre session 
         // on la démarre  
			session_start (); 
         // on enregistre les paramètres de notre utilisateur comme variables de session 
         // notez bien que l'on utilise pas le $ pour enregistrer ces variables
         $_SESSION['utilisateur_db'] = $_POST['identifiant']; 
         $_SESSION['motdepasse_db'] = $_POST['motdepasse']; 
         $_SESSION['host_db'] = $host; 
         $_SESSION['nom_db'] = $dbname; 
    
         // on redirige notre utilisateur vers l'accueil principal 
         header ('location: accueil_principal_meteo.php'); 
   	} 
      else 
      { 
            // Le login et/ou le mot de passe sont incorrects
            // On utilise alors un petit javascript lui signalant ce fait 
            echo '<body onLoad="alert(\'Identifiant inconnu...\')">'; 
            // puis on le redirige vers la page d'accueil 
            echo '<meta http-equiv="refresh" content="0;URL=index.html">'; 
	   }  
}  
else 
{ 
		echo 'Les variables ne sont pas d&eacute;clar&eacute;es.';  
}  
?> 
