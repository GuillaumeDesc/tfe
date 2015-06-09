<?php 
    session_start();
?>
<!doctype html>
<html>
    <head>
        <title>Pas de javascript | TimeBridge</title>
        <?php include"head.php"; ?>
        <script type="text/javascript"> window.location = "http://timebridge.be" </script>
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
            <h3>Oupsss</h3>
            
            <section class="infos gradient">
                 <div class="title">
                    <h4>Javascript</h4>
                </div>
                <p> Il semblerait qu'il y ait un soucis... Réessayes plus tard.</p>             
            </section>
            </main>
        <?php include"footer.php"; ?>
    </body>
</html>