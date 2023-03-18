<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" contents="Our Streaming Website" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>StreamingParadise</title>
  <body>
    <header>
      <nav>
      <h1 class="title"><a href="accueil.php">StreamingParadise</a></h1>
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
          <li><a href="inscription.php">Inscription</a></li>
          <li><a href="connexion.php">Connexion</a></li>
        </ul>
      </nav>
    </header>
    <br>
    <br>
    <?php

        $host='localhost';
        $username='root';
        $pword='';
        $dbname='phplogin';
    
        $link = mysqli_connect($host, $username, $pword, $dbname) or die('Could not connect: ' . mysqli_error($link));
    //Ici le formulaire sert à faire une sélection de connection entre une table user et une table admin (sudo)
    if(isset($_POST['submit']))
    {
        $pseudo = htmlentities(trim($_POST['pseudo']));
        $mdp = htmlentities(trim($_POST['mdp']));

        //On récupère les informations pour se connecter en sudo
        $exec_requete = $link -> query("SELECT * FROM sudo");
        $reponse = mysqli_fetch_array($exec_requete); 
        $sudomdp = $reponse['mdp'];
        $sudopseudo = $reponse['pseudo'];

        //On récupère les informations pour se connecter en users
        $exec_requete = $link -> query("SELECT * FROM users");
        $reponse = mysqli_fetch_array($exec_requete); 
        $usermdp = $reponse['mdp'];
        $userpseudo = $reponse['pseudo'];

        //Le if ici permet de selectionner uniquement les tuples présents dans la table
        //Si le tuple n'est pas présent, un message d'erreur s'affichera
        if($pseudo == $sudopseudo && $mdp == $sudomdp)
        {
            $result = mysqli_query($link, "SELECT * FROM sudo WHERE pseudo='$pseudo'&& mdp='$mdp'");
            $rows = mysqli_num_rows($result);
            if($rows!=0)
            {
                header("Location: sudo.php");
            }else echo"<br>Pseudo ou mot de passe incorrect";
        }else if($pseudo == $userpseudo && $mdp == $usermdp)
            {
              $result = mysqli_query($link, "SELECT * FROM users WHERE pseudo='$pseudo'&& mdp='$mdp'");
              $rows = mysqli_num_rows($result);
              if($rows!=0)
            {
                header("Location: repertoire.php");
            }else echo"<br>Pseudo ou mot de passe incorrect";
        }else echo"Veuillez saisir tout les champs";
    }
    ?>
    <form action="connexion.php" method="POST">
      <fieldset>
        <div class="formulaire">
          <legend>Connexion</legend>
          <label>Pseudo</label>
          <input 
            type="text" 
            placeholder="Entrez votre pseudo" 
            name="pseudo"
          /><br />

          <label>Password</label>
          <input 
            type="password"
            minlength="8"
            placeholder="Entrez votre mot de passe"
            name="mdp"
          /><br />
          <input type="submit" value="Valider" name="submit"/>
          <br />
        </div>
      </fieldset>
    </form>
    <footer>
      <small>
        &copy; Copyright 2022, Nantes Université, RAT Damien and LOUET Julien
      </small>
    </footer>
  </body>
</html>
