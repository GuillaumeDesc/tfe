<?php
        
    session_start();
    if (!isset($_SESSION['login'])) {
        header ('Location: connexion.php');
        exit();
    }
        
        //creation mdp aleatioire pour futurs destinataires
        
        header("Content-type: text/html; charset=UTF-8");
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
        
if (isset($_POST['ajout']) && $_POST['ajout'] == 'Créer') {
        
        if ((isset($_POST['title']) && !empty($_POST['title'])) && (isset($_POST['description']) && !empty($_POST['description'])) && (isset($_POST['date']) && !empty($_POST['date'])) && (isset($_POST['pourqui']) && !empty($_POST['pourqui']))) {
            
            $base = mysql_connect ('localhost', 'root', 'root');
            mysql_query("SET NAMES UTF8"); 
            mysql_select_db ('timebridge', $base);

            $sql = 'INSERT INTO capsules VALUES("", "'.mysql_real_escape_string().($_SESSION['login']).'", "", "'.$mot_de_passe.'","", "'.$capslink.'", "'.($_POST['title']).'", "'.($_POST['date']).'", "'.mysql_real_escape_string().($_POST['description']).'", "'.mysql_real_escape_string().($_POST['pourqui']).'")';
            mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
            header('Location: capsules.php');
		    exit();
    }
    else {
	    $erreur = 'Au moins un des champs est vide.';
	}
}
?>

<!doctype html>
<html>
    <head>
        <title>Nouvelle capsule | TimeBridge</title>
        <?php include"head.php"; ?>
    </head>
    <body>
         <header>
            <a href="index.php">
                <h1>TimeBridge</h1>
            </a>
            <?php include"nav_connecte.php"; ?>
        </header>
        <div id="contentconnect">
            <div class="centrage" id="connexion">
                <form action="nouvelle.php" method="post" class="gradient">
                    <fieldset>
                        <legend>Nouvelle capsule</legend>
                        <ol>
                            <li>
                                <label for='titme'>Choisissez un titre:</label>	
                                <input type="text" name="title" id='title' placeholder="Ex: Vacances à Namur" maxlength="30" requiered="requiered" value="<?php if (isset($_POST['tilte'])) echo htmlentities(trim($_POST['title'])); ?>">
                            </li>
                            <li>
                                <label for='description'>Infos sur la capsule:</label>
                                <textarea type="text" name="description" id='description' placeholder="Présentation de la capsule" requiered="requiered" value="<?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>"></textarea>

                            </li>
                            <li>
                                <label for='date'>Date d'ouverture:</label>
                                <input type="date" name="date"  min="2020-01-01" max="2115-01-01" id='date' placeholder="Quand la caspule s'ouvrira t'elle ?" requiered="requiered" value="<?php if (isset($_POST['date'])) echo htmlentities(trim($_POST['date'])); ?>">

                            </li>
                            <li>
                                <label for='pourqui'>Destinataires:</label>
                                <input type="text" name="pourqui" id='pourqui' placeholder="jackson5@mail.com" requiered="requiered" value="<?php if (isset($_POST['pourqui'])) echo htmlentities(trim($_POST['pourqui'])); ?>">

                            </li>
                            <li>
                                <?php
                                if (isset($erreur)) echo '<p id="error"></br />',$erreur,'</p>';
                                ?>
                            </li>
                            <li>
                                <input id="envoyer" type="submit" name="ajout" value="Créer">
                            </li>
                        </ol>
                    </fieldset>
                </form>
            </div>
		</div>
		<?php include"footer.php"; ?>
	</body>
</html>