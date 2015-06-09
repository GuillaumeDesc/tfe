<?php

session_start();
if (!isset($_SESSION['login'])) {
	header ('Location: connexion.php');
	exit();
}
    $login = $_SESSION['login'];
    
?>
<!doctype html>
<html>
    <head>
        <title>Vacances à la mer 2015 | TimeBridge</title>
        <?php include"head.php"; ?>
        <script type="text/javascript" src="assets/lib/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="assets/lib/main.js"></script>
        <script src="assets/lib/hyphens.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/lib/skrollr.min.js"></script>
        <script type="text/javascript" src="assets/lib/baguetteBox.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/style/baguetteBox.css">
    </head>
    <body>
        <header>
            <a href="index.php">
                <h1>TimeBridge</h1>
            </a> 
            
            <?php include"nav_connecte.php"; ?></nav>
        </header>
         <main id="afficaps">
            <h3>Votre capsule</h3>
            
            <section class="infos gradient">
                         <div class="title">
                    <h4> Vacances à la mer 2015</h4>
                </div>
                         <p class="forwho">Pour Antoine, créee le 11 juin 2015.</p>
                         <p> Hello Antoine, il y a 15ans de celà, je tombais sur ce site par hasard. J'ai voulu tester pour voir et j'y mettrai donc des petits souvenirs de ton enfance, et plus particulièrement de tes premières vacances à la mer, c'était en 2015 à Benidorm.</p>
                         <p>J'èsprère être toujours là le jour où tu liras ce message, si tu le lis.</p>
                         <p>Ta maman qui t'aime, bisou.</p>
                         <a href="download.php" class="buttonadd"><span> Télécharger <br> C'est cadeau</span></a>
                         
            </section>
            
            <ul id="galerie">
            
           <?php
                //detection et affichage de tous les elements du dossier image
                $img = 'caps/img';
                $files =  scandir($img);
                foreach($files as $f) {
                        if (($f != ".") && ($f != "..")) {
                        echo  '<li ><a href="caps/img/' . $f . '" target="_blank" style="background: url(caps/thumb/' . $f . '); background-size:cover;">' . $f . '</a></li>';
                    }
                }
			?>
            
            </ul>
            
            </main>
         <?php include"footer.php"; ?>
        <script>
             baguetteBox.run('#galerie', {
              // Custom options
            });
        </script>
    </body>
</html>