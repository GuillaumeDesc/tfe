<?php
session_start();
define ("PAGE","connexion");

// Test de soumission
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass_clear']) && !empty($_POST['pass_clear']))) {
	
	
    //connexion à la base de donee
	$base = mysql_connect ('localhost', 'root', 'root');
	mysql_select_db ('timebridge', $base);


	// Verification si le mot de passe va bien avec le login
	$sql = 'SELECT count(*) FROM capsules WHERE login="'.mysql_real_escape_string().($_POST['login']).'" AND pass="'.mysql_escape_string(md5($_POST['pass_clear'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// Si oui, session start
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: capsules.php');
		exit();
	}
	// si  non, il y a une faute, et donc affichage d'un message d'erreur
	elseif ($data[0] == 0) {
		$erreur = 'Oups, une des infos est incorrecte.';
	}
        else {
            $erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
        }
	}
	else {
	$erreur = 'Veuillez tout remplir';
	}
}
?>


<html>
    <head>
        <title>Connexion | TimeBridge</title>
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
        <div id="contentconnect">
            <div class="centrage" id="connexion">
                <form action="connexion.php" method="post" class="gradient"><!-- Formulaire d'inscription  -->
                    <fieldset>
                        <legend>Connexion</legend>
                        <ol>
                            <li>
                                <label for='login'>Login:</label>	
                                <input type="text" id="login" requiered="requiered" name="login" placeholder="Ex: DesGui" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>">
                            </li>
                            <li>
                                <label for='pass'>Mot de passe:</label>
                                <input type="password" id="pass" name="pass_clear" placeholder="Mot de passe" value="<?php if (isset($_POST['pass_clear'])) echo htmlentities(trim($_POST['pass_clear'])); ?>">
                            </li>
                            <li>
                                <?php
                                if (isset($erreur)) echo '<p id="error"></br />',$erreur,'</p>';
                                ?>
                            </li>
                            <li>
                                <input type="submit" name="connexion" value="Connexion" id="envoyer">
                            </li>
                        </ol>
                    </fieldset>
                </form>
                <a href="inscription.php">Pas encore inscrit ?</a>
            </div>
		</div>
		<?php include"footer.php"; ?>
	</body>
</html>