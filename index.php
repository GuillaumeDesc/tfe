<?php
  session_start();
?>
<!doctype html>
<html xmlns:og="http://ogp.me/ns#">
    <head>
        <title>TimeBridge | Stockez, Oubliez..., redécouvrez.</title>
        <?php include"head.php"; ?>
        <script type="text/javascript" src="assets/lib/main.js"></script>
        <script type="text/javascript" src="assets/lib/skrollr.min.js"></script>
    </head>
     <body id="index">
        <header>
                <?php 
            
                        if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])))
            {
                //affichage nav speciale pour les personnes connectees
                include"nav_connecte.php";
            }
            else
            {
               //affichage nav speciale pour les personnes non connectees
               include"nav_nonconnecte.php";
            }
            ?>
        </header>
         <main>
             <section id="intro">
                <div class="centrage">
                    <h1>TimeBridge</h1>
                    <h2>Stockez. Oubliez... <span>...Redécouvrez</span></h2>
                </div>
             </section>
             
             
             <div class="quand">
                 <p>Aujourd'hui</p>
             </div>
             <!-- Section du stockage -->
             <section class="develop gradient" id="stock" data-bottom-top=" margin-top: -160px ; margin-bottom : 250px ; box-shadow: 0 -17px 25px 0 rgba(0,0,0,.16); " data-center-center="margin-top: 90px ; margin-bottom : 90px ; box-shadow: 0 17px 45px 0 rgba(0,0,0,.26);" >
                 <h3>Stockez</h3>
                 <p> Depuis bien longtemps, l'homme stocke ses souvenirs : Manuscrits, dessins, photos. À l'air du numérique, le stockage devient facile et pourtant...    
                 </p>
                 <p>Est venu ensuite le concept de capsule temporelle, boite à souvenir. TimeBridge vous propose une réinterprétation de ce concept au travers d'une version numérique.</p>
                 <p>Créez une capsule, indiquez pour qui, pour quand, pour quoi et entrez dans l'aventure.
                 </p>
             </section>
             <img src="assets/img/stockez.jpg" alt="Stockez voss souvenir, TimeBridge, un nouveau moyen">
                 
             <div class="quand">
                 <p>Demain</p>
             </div>
             
              <!-- Section de l'oubli -->
             <section class="develop gradient" id="oublie" >
                 <h3>Oubliez</h3>
                 <p>Le temps va agir et suivre son cours. Les souvenirs s'effaceront d'eux même.</p>
             </section>
             <img id="right" class="group" src="assets/img/oubliez.jpg" alt="Stockez voss souvenir, TimeBridge, un nouveau moyen" data--10-bottom-bottom="opacity:1.0;" data--100-top-top=" opacity:0.0;">
             
             <div class="quand">
                 <p>Un jour</p>
             </div>
             
             <section class="develop gradient" id="redecouvre">
                 <h3>(Re)découvrez</h3>
                 <p>Les années passent. Un beau jour, à un moment précis, de nombreuses notifications viennent et vous surprennent: une capsule est arrivée à terme, il est temps de la découvrir.</p>
                 <p>Les souvenirs vous reviennent alors...</p>
                 <a href="inscription.php" class="button">S'inscrire</a>
             </section>
             <div id="oubliebg" data-end=" display:block; opacity: .7; " data-200-end=" display:block; opacity: 0; "></div>
         </main>
         <?php include"footer.php"; ?>
    </body>
</html>
