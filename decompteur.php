<?php
              
session_start();
if (!isset($_SESSION['login'])) {
	header ('Location: connection.php');
	exit();
}

    $login = $_SESSION['login'];
              
              
    //Connexion a la BDD
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=timebridge', 'root', 'root');
		} catch (Exception $e) {
		    die('Erreur : ' . $e->getMessage());
		}
        $bdd->query("SET NAMES UTF8"); 
        $reponse = $bdd->query("SELECT * FROM `capsules` WHERE login = '".($_SESSION['login'])."' "); // Recherche des cpsules de l'utilisateur
        
        $date = date("Y-m-d"); //Detection de la date actuelle
        $compte = 0;
        
        $date_actu = $date;
       
        // affichage et creation d'un li html par capsule
        while ($donnees = $reponse->fetch()){
             
            if ( $date < $donnees['forwhen'] ) {
            //Si date pas encore passee...
                $compte++;
                
                $dateFrom = new DateTime( $donnees['forwhen'] . ' 00:00:00' );
                $dateNow = new DateTime('now');

                $difference = $dateNow->diff($dateFrom);
                
                $annees = $difference->format('%Y');
                $mois = $difference->format('%M');
                $jours = $difference->format('%D');
                $heures = $difference->format('%h');
                $minutes = $difference->format('%i');
                $secondes = $difference->format('%s');
                $titre = $donnees['title'];
                $destinataires = $donnees['forwho'];
                $link = "'nouvelle.php', '_self'";
                
                 echo '
                         <li class="gradient">
                         <div class="title">
                             <h4>' . $titre . '</h4>
                         </div>
                         <p class="forwho">Pour ' . $destinataires . '</p>
                         <div class="chrono">
                             <p>
                                    <span id="annees">' . $annees . '</span>ans
                                    <span id="mois">' . $mois . '</span>mois
                                    <span id="jours">' . $jours. '</span>jours<br>
                                    <span id="heures">' . $heures . '</span>heures
                                    <span id="minutes">' . $minutes . '</span>min.
                                    <span id="secondes">' . $secondes . '</span>sec.
                            </p>
                         </div>
                         <a href="ajout.php" class="buttonadd" id="MajLetter"><span> + <br> Ajouter des fichiers</span></a>
                     </li>';
            }
            else {//Si date  passee...
                echo '<li class="gradient">
                         <div class="title">
                             <h4>' . $titre . '</h4>
                         </div>
                         <p class="forwho">Pour ' . $destinataires . '</p>
                         <div class="chrono"> <p id="ouverte"> CAPSULE OUVERTE </p>
                         </div>
                         <a href="galerie.php" class="buttondecal"><span> Découvrir...<br> ...Se souvenir</span></a>
                     </li>';
            };
        };
        
        echo '<li id="onemore" class="gradient" onclick="window.open(' . $link . ');">
                      <a href="nouvelle.php" class="buttondecal">
                     <span> Nouvelle capsule Nouvelle capsule</span>
                      </a>
                 </li>'
    ?>