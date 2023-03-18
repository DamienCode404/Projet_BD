<?php 
	//Permet de se connecter a la base de données
	$host="localhost";
    $username="root";
    $pword="";
    $dbname="phplogin";

    $link = mysqli_connect($host, $username, $pword, $dbname) or die("Could not connect: " . mysqli_error($link));

	$ID_Movie = 0;

	if ( !empty($_GET["ID_Movie"])){
		$ID_Movie = $_REQUEST["ID_Movie"];
	}
	
	if ( !empty($_POST)) {
		$ID_Movie = $_POST['ID_Movie'];
		$link = mysqli_connect($host, $username, $pword, $dbname);
		$sql = "DELETE FROM film WHERE ID_Movie = $ID_Movie";
		$result = mysqli_query ($link, $sql);

	  if(!$result){
 		echo("Error description: " . mysqli_error($link));
	  }
		mysqli_close($link);
		header("Location: sudo.php");
	}   
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" contents="Our Streaming Website" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>		    		
	    <form action="delete.php" method="POST">
		<input type="hidden" name="ID_Movie" value="<?php echo $ID_Movie;?>"/>
			<img class="image-clignote" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/France_road_sign_A14.svg/1200px-France_road_sign_A14.svg.png"/>
			<br>
			<p class="center">Are you sure to delete ?</p>
			<button type="submit" class="GrosBoutonRouge">Yes</button>
			<a href="sudo.php" class="GrosBoutonVert">No</a>
		</form>	
  </body>
</html>