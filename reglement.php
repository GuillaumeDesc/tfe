<?php 
    session_start();
?>
<!doctype html>
<html>
    <head>
        <title>Règlement | TimeBridge</title>
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
            <h3>Règlement</h3>
            
            <section class="infos gradient">
                 <div class="title">
                    <h4>Pour vous</h4>
                </div>
                <p> En vous inscrivant à TimeBridge, vous acceptez être responsable du contenu que vous stockez. Veillez donc à respecter droit à l'image et droits d'auteurs afin de vous éviter toute mauvaise surprise. TimeBridge n'est en rien responsable du contenu ajouté par les utilisateurs.</p>             
            </section>
            <section class="infos gradient">
                 <div class="title">
                    <h4>Pour TimeBridge</h4>
                </div>
                <p> TimeBridge garantit dans le cadre de ses compétences la confidentialité de vos données. Elles ne seront en rien utilisées à de mauvaises fins.</p>             
            </section>
            </main>
        <?php include"footer.php"; ?>
    </body>
</html>