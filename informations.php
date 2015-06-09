<?php 
    session_start();
    define ("PAGE","information"); 
?>
<!doctype html>
<html>
    <head>
        <title>A propos | TimeBridge</title>
        <?php include"head.php"; ?>
    </head>
    <body>
        <header>
            <a href="index.php">
                <h1>TimeBridge</h1>
            </a>
                <?php 
            
                        if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])))
            {
                include"nav_connecte.php";
            }
            else
            {
               include"nav_nonconnecte.php";
            }
            ?>
        </header>
         <main id="credits">
            <h3>A propos</h3>
            
            <section class="infos gradient">
                 <div class="title">
                    <h4> Réalisation</h4>
                </div>
                <p> Réalisé par <a href="http://guillaumedeschryver.be" target="_blank">Guillaume Deschryver</a> ddans le but de proposer une nouvelle façon de se souvenir au travers d'une réinterprétation numérique du concept de capsule temporel.</p>             
            </section>
        
            <section class="infos gradient">
                 <div class="title">
                    <h4>Remerciements</h4>
                </div>
                <p> Projet réalisé dans le cadre d'un TFE à l'école Albert Jacquard de Namur.</p>
                
                <p>Un projet de TFE, c’est avant tout un projet pour les autres. Mais il est rare de parvenir à ses fins seul, dans son coin. C’est pourquoi j’aimerais remercier les personnes qui se sont, de près ou de loin,
impliquées dans mon projet. Avis, conseils, aide, réponse, idées...</p>

                <p>Parmis toutes ces personnes, je tenais plus particulièrement à remercier :</p>
                <ul>
                    <li>Mes amis, collègues, proche qui, qu’ils soient soient des métiers du web ou pas, n’ont pas hésité à me donner leurs avis et idées.</li>
                    <li>Le groupe des professeurs de la section DWM de l’école, pour les conseils, avis, liens, et temps consacré.</li>
                    <li>Aux personnes ayant répondu au sondage en ligne afin de mieux cibler le “Comment“ et “Pour quoi“.</li>
                </ul>          
            </section>
            
             <section class="infos gradient" id="credits">
                 <div class="title">
                    <h4> Crédits</h4>
                </div>
                <ul>
                    <li><a href="https://www.google.com/fonts" target="_blank">Google fonts</a></li>
                    <li><a href="http://realfavicongenerator.net/" target="_blank">Real favicon generator</a></li>
                    <li><a href="http://www.lephpfacile.com/howto/10-comment-faire-un-espace-membre-en-php" target="_blank">lephpfacile.com/</a></li>
                    <li><a href="http://prinzhorn.github.io/skrollr/" target="_blank">Skrollr</a></li>
                    <li><a href="http://mnater.github.io/Hyphenator/" target="_blank">Hyphenator.js</a></li>
                    <li><a href="https://chelladuraii.wordpress.com/2012/06/18/live-timer-using-jquery-ajax-and-php/" target="_blank">chelladuraii.wordpress.com (Tutoriel ajax)</a></li>
                    <li><a href="http://www.phpascal.com/programmation-web/PHP/creation-mot-de-passe.html" target="_blank">phpascal.com (Random Password)</a></li>
                    <li><a href="http://stackoverflow.com/questions/1968106/generate-download-file-link-in-php" target="_blank">Stackoverflow</a></li>
                    <li><a href="https://feimosi.github.io/baguetteBox.js/" target="_blank">BaguetteBox.js</a></li>
                    <li><a href="http://www.verot.net/php_class_upload_samples.htm" target="_blank">class.upload.php</a></li>
                </ul>          
            </section>
            </main>
        <?php include"footer.php"; ?>
    </body>
</html>