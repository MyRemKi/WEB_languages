<?php
//affichage_temperature_interieure.php
session_start ();  
// On récupère nos variables de session  
if (isset($_SESSION['utilisateur_db']) && isset($_SESSION['motdepasse_db'])
		&& isset($_SESSION['host_db'])&& isset($_SESSION['nom_db'])) 
{ 
      echo '<html>'; 
      echo '<head>'; 
			echo '<TITLE> MTHR </TITLE>'; 
			echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8" >'; 
			echo '<meta name="author" content="Remi kalkan" >'; 
			echo '<meta name="generator" content="Bluefish 2.2.3" >'; 
  			echo '<LINK rel="stylesheet" type="text/css" href="style/cours_html_css.css">'; 
  			echo '<LINK rel="stylesheet" type="text/css" href="style/sommaire_vertical.css">'; 
  		echo '</head>'; 
      echo '<body>';
   		echo '<div id="conteneur">';
			echo '<div id="entete">';
					echo "<h1>Affichage de la Température et de l'Humidité Relative en F11</h1>";
			echo '</div>';
			echo '<div class="frame">';
				echo '<div class="gauche">';
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

				// on se connecte à la base de données
				$db=pg_connect('host='.$_SESSION['host_db'].' user='.$_SESSION['utilisateur_db'].
 				 					    ' dbname='.$_SESSION['nom_db'].' password='.$_SESSION['motdepasse_db'].' ');
				if (!$db) {
					echo ("erreur de konnexion <br>\n");
				}

				// on recherche les températures intérieures
 				$sql="SELECT date_echantillon, temperature,humidite_relative from \"donnees\"ORDER BY id_donnees DESC";
				$resultat=pg_exec($db,$sql);
								if (!$resultat) {
					echo ("erreur de resultat <br>\n");
				}
				$lignes=pg_numrows($resultat);
				echo ("<center>$lignes valeurs de températures et d'Humidités Relatives en F11 </center><br><br>");

 				if ($lignes!= 0) 
				{
					// on affiche l'entête du tableau
					echo("<center><TABLE BORDER=2 CELLPADDING=2>");
					echo("<TR>");
						echo("<TD>Date</TD>");
						echo("<TD>Températures</TD>");
						echo("<TD>Humidité Relative</TD>");
					echo("</TR>");
					// on affiche chaque température intérieure
					for ($i=0; $i < $lignes; $i++) 
					{ 
						$resultat_requete=pg_fetch_object($resultat,$i);
						echo("<TR>");
							echo("<TD>{$resultat_requete->date_echantillon}</TD>");
							echo("<TD>{$resultat_requete->temperature} °C</TD>");
							echo("<TD>{$resultat_requete->humidite_relative} %</TD>");
						echo("</TR>");
					} 
					echo("</TABLE></center>");
				}	
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
