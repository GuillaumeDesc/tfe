<?php
        
    session_start();
    if (!isset($_SESSION['login'])) {
        header ('Location: connexion.php');
        exit();
    }
    include("upload.php");
?>

<!doctype html>
<html>
    <head>
        <title>Ajout de fichiers | TimeBridge</title>
        <?php include"head.php"; ?>
        <script src="assets/lib/jquery-1.11.3.min.js"></script>
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
                <form enctype="multipart/form-data" action="upload.php" method="post" class="gradient"> <!--Formulaire d'upload -->
                    <fieldset>
                        <legend>Ajout de fichiers</legend>
                        <ol>
                            <li>
                                <label for="myfile">Upload (.jpg, .png, .gif): </label><!--Faux input texte pour en avoir un plus beau, et donc une meilleure UX -->
                                <input type="text" id="myfile_btn" onclick="getfile()" placeholder="Choisissez un fichier" required="required">
				<input type="file" name="newfile" id="myfile" style="display:none" onchange="document.getElementById('myfile_btn').value = this.value">
                                </br>
                            </li>
                            
                            <input class="buttonadd" type="submit" id="envoyer" value="Ajouter">
                        </ol>
                    </fieldset>
                </form>
            </div>
		</div>
		<?php include"footer.php"; ?>
		<script type="text/javascript">
			function getfile(){
			    $('#myfile').click();
			    $('#myfile_btn').value = $('#myfile').value;
			}
		</script>
	</body>
</html>