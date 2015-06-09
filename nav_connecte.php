<nav>
    <ul>
         <li id="profil">
                <p><?php echo htmlentities(trim($_SESSION['login'])); ?> ></p>
         </li>
         <li>
            <a href="capsules.php" <?php if(PAGE=='capsule'){ echo 'class="active"';}  ?> >Mes capsules</a>
        </li>
        <li>
            <a href="deconnection.php" >Déconnexion</a>
        </li>
         <li>
            <a href="informations.php" <?php if(PAGE=='information'){ echo 'class="active"';}  ?> >À propos</a>
        </li>
    </ul>
</nav>