<?php
	  $host="localhost";
    $username="root";
    $pword="";
    $dbname="phplogin";
    
    $link = mysqli_connect($host, $username, $pword, $dbname) or die("Could not connect: " . mysqli_error($link));

    $query = 'SELECT * FROM film';
    $result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error());

    if(isset($_POST['submit'])){
      $Name_Movie = htmlentities(trim($_POST['nom'], ENT_QUOTES, "UTF-8"));
      $Genre = htmlentities(trim($_POST['genre'], ENT_QUOTES, "UTF-8"));
      $Duree = htmlentities(trim($_POST['duree'], ENT_QUOTES, "UTF-8"));
      $Production = htmlentities(trim($_POST['production'], ENT_QUOTES, "UTF-8"));
      $Date = htmlentities(trim($_POST['date'], ENT_QUOTES, "UTF-8"));

      if($Name_Movie&&$Genre&&$Duree&&$Production&&$Date){
        $result = mysqli_query($link, "INSERT INTO film (Name_Movie, Genre, Duree, Production, Date) VALUES('$Name_Movie','$Genre','$Duree','$Production','$Date')"); 
        die (header("Location: sudo.php"));
      }else echo "Veuillez saisir tout les champs";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" contents="Our Streaming Website" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>StreamingParadise</title>
</head>

<body>
  <br>
    <form action="create.php" method="POST">
      <fieldset>
      <br>
        <div class="formulaire">
        <img class="titreCreate" src="https://images.squarespace-cdn.com/content/551330c4e4b00ee5b5c2bdce/1502818417885-YAHSHT3F3TS4FWN34NQW/bn-02.png?format=1500w&content-type=image%2Fpng">
        <br>
          <label>Nom Film</label>
          <input 
            type="text"  
            placeholder="Entrez le nom" 
            name="nom"
          /><br />

          <label>Genre</label>
          <input 
            type="text" 
            placeholder="Entrez le genre" 
            name="genre"
          /><br />

          <label>Duree</label>
          <input
            type="text"
            placeholder="Entrez la duree" 
            name="duree"
          /><br />

          <label>Production</label>
          <input 
            type="text" 
            placeholder="Entrez la production" 
            name="production"
          /><br />
          
          <label>Date</label>
          <input 
            type="number" 
            min="1980"
            max="2023"
            placeholder="Entrez la date" 
            name="date"
          /><br />

          <input type="submit" value="Valider" name="submit"/>
          <br />
          <p>Si vous voulez retourner au répertoire, <a href="sudo.php">Cliquez-ici</a></p>
          </div>
      </fieldset>
    </form>
  </body>
</html>