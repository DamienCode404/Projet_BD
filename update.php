<?php
	$host="localhost";
    $username="root";
    $pword="";
    $dbname="phplogin";
    
    $link = mysqli_connect($host, $username, $pword, $dbname) or die("Could not connect: " . mysqli_error($link));

    $ID_Movie = null;

	if ( !empty($_GET["ID_Movie"])){
		$ID_Movie = $_REQUEST["ID_Movie"];
	}

    if ( null==$ID_Movie ) {
		header("Location: sudo.php");
	}

    if ( !empty($_POST)) {
        $Name_Movie = htmlentities(trim($_POST['nom'], ENT_QUOTES, "UTF-8"));
        $Genre = htmlentities(trim($_POST['genre'], ENT_QUOTES, "UTF-8"));
        $Duree = htmlentities(trim($_POST['duree'], ENT_QUOTES, "UTF-8"));
        $Production = htmlentities(trim($_POST['production'], ENT_QUOTES, "UTF-8"));
        $Date = htmlentities(trim($_POST['date'], ENT_QUOTES, "UTF-8"));

        if ($Name_Movie&&$Genre&&$Duree&&$Production&&$Date){

            //Si l'utilisateur a rentré tout les champs faire la query suivante
            $link = mysqli_connect ($host, $username, $pword, $dbname); 					   
            $sql = "UPDATE film SET Name_Movie = '$Name_Movie', Genre = '$Genre', Duree = '$Duree', Production = '$Production', Date = '$Date' WHERE ID_Movie = $ID_Movie";
            $result = mysqli_query ($link,$sql);

			if(!$result){

                echo("Error description: " . mysqli_error($link));
            }

           mysqli_close($link);	
           header("Location: repertoire.php");

        } else echo "Veuillez saisir tout les champs";

    } else {

    $link = mysqli_connect ($host, $username, $pword, $dbname); 					   
    $sql = "SELECT * FROM film where ID_Movie = '$ID_Movie'";
    $result = mysqli_query ($link,$sql);

    if(!$result){
             echo("Error description: " . mysqli_error($link));
    }
    
    mysqli_close($link);

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
    <form action="update.php?ID_Movie=<?php echo $ID_Movie?>" method="POST">
      <fieldset>
      <br>
      <img class="titreUpdate" src="https://cutewallpaper.org/24/update-png/nyandas-voltas-updated-versions-of-the-default-profile-and-page-pictures-are-rolling.png">
        <div class="formulaire">
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

          <input type="submit" value="<?php echo "Modifie le ",$ID_Movie, "ème film";?>" name="submit"/>
          <br />
          <p>Si vous voulez retourner au répertoire, <a href="sudo.php">Cliquez-ici</a></p>
          </div>
      </fieldset>
    </form>
  </body>
</html>