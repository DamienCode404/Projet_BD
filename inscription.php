<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" contents="Our Streaming Website" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>StreamingParadise</title>
  </head>
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

    //Requête 
    $query = 'SELECT * FROM users';
    $result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error());

    if(isset($_POST['submit'])){
      $pseudo = htmlentities(trim($_POST['pseudo']));
      $mdp = htmlentities(trim($_POST['mdp']));
      $repeatpassword = htmlentities(trim($_POST['repeatpassword']));
      $pays = htmlentities(trim($_POST['pays']));
      $nom = htmlentities(trim($_POST['nom']));
      $prenom = htmlentities(trim($_POST['prenom']));
      $age = htmlentities(trim($_POST['age']));

      if($pseudo&&$mdp&&$repeatpassword&&$pays&&$nom&&$prenom&&$age){
        if($mdp==$repeatpassword){
          //$mdp = md5($mdp);

          $result = mysqli_query($link, "SELECT * FROM users WHERE pseudo='$pseudo'");
          $rows = mysqli_num_rows($result);
          

          if($rows==0){
            $result = mysqli_query($link, "INSERT INTO users (pseudo, mdp, nom, prenom, age, pays) VALUES('$pseudo','$mdp','$nom','$prenom','$age','$pays')");
            die("Inscription terminée ! Maintenant, connectez-vous !");
          }else echo "Ce pseudo n'est pas disponible";
          
        }else echo "Les deux mots de passes doivent être identiques";
      }else echo "Veuillez saisir tous les champs";
    }

    ?>

    <form action="inscription.php" method="POST">
      <fieldset>
        <div class="formulaire">
          <legend>Inscription</legend>
          <label>Nom</label>
          <input 
            type="text"  
            placeholder="Entrez votre nom" 
            name="nom"
          /><br />

          <label>Prénom</label>
          <input 
            type="text" 
            placeholder="Entrez votre prénom" 
            name="prenom"
          /><br />

          <label>Age</label>
          <input
            type="number"
            min="0"
            max="122"
            placeholder="Entrez votre âge"
            name="age"
          /><br />

          <label>Pays</label>
          <input 
            type="text" 
            placeholder="Entrez votre pays" 
            name="pays"
          /><br />

          <label>Pseudo</label>
          <input 
            type="text" 
            placeholder="Entrez votre pseudo" 
            name="pseudo"
          /><br />

          <label class="fin-form">Password</label>
          <input
            type="password"
            minlength="8"
            placeholder="Entrez votre mot de passe"
            name="mdp"
          /><br />

          <label class="fin-form">Repeat Password</label>
          <input
            type="password"
            minlength="8"
            placeholder="Entrez votre mot de passe une deuxième fois"
            name="repeatpassword"
          /><br />

          <input type="submit" value="Valider" name="submit"/>
          <br />
          
          <p>Si vous avez déjà un compte, <a href="connexion.php">connectez-vous</a></p>
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
