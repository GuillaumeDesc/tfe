<?php
define ("PAGE","capsule");
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
        <title>Vos capsules⎪TimeBridge</title>
        <?php include"head.php"; ?>
        <script type="text/javascript" src="assets/lib/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="assets/lib/main.js"></script>
        <script type="text/javascript" src="assets/lib/decompte.js"></script>
        <script src="assets/lib/hyphens.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/lib/skrollr.min.js"></script>
    </head>
    <body>
        <header>
            <a href="index.php">
                <h1>TimeBridge</h1>
            </a>
                <?php include"nav_connecte.php"; ?>
        </header>
         <main id="afficaps">
            <h3>Vos capsules</h3>
            <ul class="capsule"> <!--C'est ici que se placent les capsules sous forme de liste  -->
            
            </ul>
            
            </main>
        <?php include"footer.php"; ?>
    </body>
</html>