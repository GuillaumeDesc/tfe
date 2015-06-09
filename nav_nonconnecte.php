<nav>
    <ul>
         <li>
            <a href="inscription.php" <?php if(PAGE=='inscription'){ echo 'class="active"';}  ?> >Inscription</a>
        </li>
        <li>
            <a href="connexion.php" <?php if(PAGE=='connexion'){ echo 'class="active"';}  ?> >Connexion</a>
        </li>
          <li>
            <a href="informations.php" <?php if(PAGE=='information'){ echo 'class="active"';}  ?> >À propos</a>
        </li>
         <li>
            <a href="mailto:hello@timebridge.be" >Contact</a>
        </li>
    </ul>
</nav>