<?php
//accueil_principal_meteo.php 
// On démarre la session 
session_start ();  
// On récupère nos variables de session  
if (isset($_SESSION['utilisateur_db']) && isset($_SESSION['motdepasse_db'])
		&& isset($_SESSION['host_db'])&& isset($_SESSION['nom_db'])) 
{ 
      echo '<html>'; 
      echo '<head>'; 
			echo '<TITLE> MTHR </TITLE>'; 
			echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >'; 
			echo '<meta name="author" content="Remi Kalkan" >'; 
			echo '<meta name="generator" content="Bluefish 2.2.3" >'; 
  			echo '<LINK rel="stylesheet" type="text/css" href="style/cours_html_css.css">'; 
  			echo '<LINK rel="stylesheet" type="text/css" href="style/sommaire_vertical.css">'; 
  		echo '</head>'; 
    
      echo '<body>';
		echo '<div id="conteneur">';
			echo '<div id="entete">';
				echo "<h1>Affichage de la Température et de l'Humidité Relative des Salles de SN </h1>";
			echo '</div>';
			echo '<div class="frame">';
				echo '<div class="gauche">';
					// on affiche le sommaire
					echo '<UL class="sommaire_vertical">';
						echo '<LI><A href="affichage_temperature_interieure.php">T° et  HR%  en F11 </A></LI>';
						echo '<LI><A href="logout.php">Déconnexion</A></LI>';
					echo '</UL>';
				echo '</div>';

          
				// on affiche la date en français
				echo ("<CENTER>");
				setlocale(LC_TIME,'fr_FR.utf-8');
				print (strftime("%A %e %B %Y &agrave; %Hh%M"));
				echo ("</CENTER>");
         	echo '<br>'; 
			echo'</div>';
		echo'</div>	';
      echo '</body>'; 
     	echo '</html>'; 
}  
else
{ 
		echo 'Les variables ne sont pas d&eacute;clar&eacute;es.';  
}  
?> 
