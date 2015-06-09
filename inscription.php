<?php
        session_start();
        define ("PAGE","inscription");
        header("Content-type: text/html; charset=UTF-8");
        
        
        // Generation de 2 chaines de caractères alleatoires (non utilisée dans le cadre de cette remise de juin, mais permettant par la suite d'avoir un mod de passe unique pour les destinataires de la capsules qui soit ne connaitront pas le mdp initial, soit l'auront oublie)
        $mot_de_passe = "";
        $capslink = "";
       
        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789";
        $longeur_chaine = strlen($chaine);
       
        for($i = 1; $i <= 12; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $mot_de_passe = $mot_de_passe . $chaine[$place_aleatoire];
        }
      
        for($i = 1; $i <= 7; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $capslink = $capslink . $chaine[$place_aleatoire];
        }

// test soumission formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Envoyer') {
	// test des veriables
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// verification mdp =? mdp confirmation
	if ($_POST['pass'] != $_POST['pass_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
		$base = mysql_connect ('localhost', 'root', 'root');
	    mysql_select_db ('timebridge', $base);

		// Le login est il deja utilise ?
		$sql = 'SELECT count(*) FROM capsules WHERE login="'.mysql_escape_string($_POST['login']).'"';
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$data = mysql_fetch_array($req);

		if ($data[0] == 0) {
		$sql = 'INSERT INTO capsules VALUES("", "'.mysql_real_escape_string().($_POST['login']).'", "'.mysql_escape_string(md5($_POST['pass'])).'", "'.$mot_de_passe.'","'.$_POST['mail'].'", "'.$capslink.'", "Exemple de capsule", "2029-03-24", "Description de la capsule", "Kevin, Madelaine, Soffian")';
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: capsules.php');
		exit();
		}
		else {
		$erreur = 'Un membre possède déjà ce login.';
		}
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>

<!doctype html>
<html>
    <head>
        <title>Inscription | TimeBridge</title>
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
                <form action="inscription.php" method="post" class="gradient">
                    <fieldset>
                        <legend>Inscription</legend>
                        <ol>
                            <li>
                                <label for='username'>Choisissez un login:</label>	
                                <input type="text" name="login" id='login' placeholder="Ex: DesGui" requiered="requiered" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>">
                            </li>
                            <li>
                                <label for='password'>Mot de passe:</label>
                                <input type="password" name="pass" id='pass' placeholder="Mot de Passe" requiered="requiered" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>">

                            </li>
                            <li>
                                <label for='password'>Confirmation mot de passe:</label>
                                <input type="password" name="pass_confirm" id='pass' placeholder="Mot de Passe" requiered="requiered" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>">

                            </li>
                            <li>
                                <label for='mail'>Adresse mail:</label>
                                <input type="text" name="mail" id='mail' placeholder="jackson5@mail.com" requiered="requiered" value="<?php if (isset($_POST['mail'])) echo htmlentities(trim($_POST['mail'])); ?>">

                            </li>
                            <li>
                                <p>En cliquant sur Envoyer, vous indiquez avoir lu le <a href="regelement.php">règlement</a> et acceptez celui-ci.</p>
                            </li>
                            <li>
                                <?php
                                if (isset($erreur)) echo '<p id="error"></br />',$erreur,'</p>';
                                ?>
                            </li>
                            <li>
                                <input id="envoyer" type="submit" name="inscription" value="Envoyer">
                            </li>
                        </ol>
                    </fieldset>
                </form>
            </div>
		</div>
		<?php include"footer.php"; ?>
	</body>
</html>