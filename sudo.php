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
		<a href="create.php" class="film">Cliquez ici pour insérer un nouveau film</a>
		<br>
		<a href="sudo.php" class="Refresher">Page Refresher</a>
		<br>
		<br>	
		<br>

		<form method="POST">
			<div class="recherche">
				<div> 
					<select name="genre[]" class="selecteur">
						<!--- php CreateOption pour afficher les tuples en fonctions des modifications dans la table.
						Lorsque la table va augmenter significativement de volume ça sera plus simple de choisir cette 
						option. 
						Dans notre cas ici nous affichons une liste prédéfinie et fixe qui ne répondra pas en fonction 
						de ce qui est présent dans la table --->
						<option value="" disabled selected>-- Please choose a genre --</option>
						<option value="Science fiction">Science fiction</option>
						<option value="Fantastique">Fantastique</option>
						<option value="Documentaire">Documentaire</option>
						<option value="gangsters">Gangsters</option>
						<option value="Guerre">Guerre</option>
						<option value="Action">Action</option>
						<option value="Comédie">Comédie</option>
						<option value="Romance">Romance</option>
						<option value="Drame">Drame</option>
						<option value="Thriller">Thriller</option>
						<option value="Policier">Policier</option>
						<option value="Western">Western</option>
					</select>
				</div>

				<div>
					<select name="duration[]" class="selecteur">
						<option value="" disabled selected>-- Please choose a duration --</option>
						<option value="1h30">>1h30</option>
						<option value="2h">>2h</option>
						<option value="2h30">>2h30</option>
						<option value="3h">>3h</option>
						<option value="3h30">>3h30</option>
					</select>
				</div>

				<div>
					<select name="production[]" class="selecteur">
						<option value="" disabled selected>-- Please choose a production --</option>
						<option value="Lucasfilm Ltd">Lucasfilm Ltd</option>
						<option value="20th Century Fox">20th Century Fox</option>
						<option value="Universal Pictures">Universal Pictures</option>
						<option value="Paramount Pictures">Paramount Pictures</option>
						<option value="Sony Pictures Entertainment">Sony Pictures Entertainment</option>
						<option value="Ardustry Entertainment">Ardustry Entertainment</option>
						<option value="Warner Bros">Warner Bros</option>
						<option value="Walt Disney">Walt Disney</option>
					</select>
				</div>

				<div>
					<select name="date[]" class="selecteur">
						<option value="" disabled selected>-- Please choose a date --</option>
						<option value="the 1980's">the 1980's</option>
						<option value="the 1990's">the 1990's</option>
						<option value="the 2000's">the 2000's</option>
						<option value="the 2010's">the 2010's</option>
						<option value="the 2020's">the 2020's</option>
					</select>
				</div>
			</div>
			<br>
			<div class="formulaire">
				<input type="submit" value="Recherche" name="submit"/>
			</div>
		</form>
			<!--- Formulaire qui permet d'afficher la table SQL après une sélection --->
			<?php 
			$host='localhost';
            $username='root';
            $pword='';
            $dbname='phplogin';

			$link = mysqli_connect($host, $username, $pword, $dbname) or die('Could not connect: ' . mysqli_error($link));
			
			
			
			// $result= mysqli_query ($link,$sql);
			// if(!$result){
			// 	echo("Error description: " . mysqli_error($link));
			// }else{
			// 	$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
			// 		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			// 		echo '<tr>';
			// 		echo '<td>'. $row['ID_Movie'] . '</td>';
			// 		echo '<td>'. $row['Name_Movie'] . '</td>';
			// 		echo '<td>'. $row['Genre'] . '</td>';
			// 		echo '<td>'. $row['Duree'] . '</td>';
			// 		echo '<td>'. $row['Production'] . '</td>';
			// 		echo '<td>'. $row['Date'] . '</td>';
			// 		echo '</tr>';
			// 	}
			// }
			 
	 		
			//Permet d'afficher une valeur en fonction du genre sélectionné
			if(isset($_POST['submit'])){
				if(!empty($_POST['genre'])) {
				  foreach(
					$_POST['genre'] as $Genre
					){
						$sql = "SELECT * FROM film WHERE Genre = '$Genre'";	
						$result = mysqli_query ($link,$sql);
						echo '  ' . $Genre . '<br>';
				  }          
				} else {
				  echo 'Please select the value. <br>';
				}
			  }

			//Permet d'afficher une valeur en fonction de la durée sélectionnée
			if(isset($_POST['submit'])){
			if(!empty($_POST['duration'])) {
				foreach(
				$_POST['duration'] as $Duree
				){
					$sql = "SELECT * FROM film WHERE Duree = '$Duree'";
					$result = mysqli_query ($link,$sql);
					echo '  ' . $Duree . '<br>';
				}          
			} else {
				echo 'Please select the value. <br>';
			}
			}

			//Permet d'afficher une valeur en fonction de la production sélectionnée
			if(isset($_POST['submit'])){
			if(!empty($_POST['production'])) {
				foreach(
				$_POST['production'] as $Production
				){
					// $sql = "SELECT * FROM film WHERE Production = '$Production'";
					// $result = mysqli_query ($link,$sql);
					echo '  ' . $Production . '<br>';
				}          
			} else {
				echo 'Please select the value. <br>';
			}
			}

			//Permet d'afficher une valeur en fonction de la date sélectionnée
			if(isset($_POST['submit'])){
			if(!empty($_POST['date'])) {
				foreach(
				$_POST['date'] as $Date
				){
					$sql = "SELECT * FROM film WHERE Date = '$Date'";
					$result = mysqli_query ($link,$sql);
					echo '  ' . $Date . '<br>';
				}          
			} else {
				echo 'Please select the value. <br>';
			}
			}
		?>
		<br>
		<br>


	<!--- Formulaire qui permet d'afficher la table SQL complête --->
	<form method="POST">			
	<table class="table-style">
	<thead>
	<tr>
		<th colspan="7">Répertoire de Films</th>
	</tr>
	<tr>
		<th>ID_Movie</th>
		<th>Name_Movie</th>
		<th>Genre</th>
		<th>Duree</th>
		<th>Production</th>
		<th>Date de sortie</th>
		<th></th>
	</tr>
	</thead>
	<tbody>

		<?php 
			$host='localhost';
            $username='root';
            $pword='';
            $dbname='phplogin';

			$link = mysqli_connect($host, $username, $pword, $dbname) or die('Could not connect: ' . mysqli_error($link));
			$sql = "SELECT * FROM film";	
			$result = mysqli_query ($link,$sql);
						
			if(!$result){
 				echo("Error description: " . mysqli_error($link));
			}else{ 
			$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>'. $row['ID_Movie'] . '</td>';
				echo '<td>'. $row['Name_Movie'] . '</td>';
				echo '<td>'. $row['Genre'] . '</td>';
                echo '<td>'. $row['Duree'] . '</td>';
                echo '<td>'. $row['Production'] . '</td>';
				echo '<td>'. $row['Date'] . '</td>';
				
								
				echo '<td>';
				//Récupère l'ID_Movie pour pouvoir le sélectionner lors de la lecture / mise a jour / suppression
				echo '<a href="info.php?ID_Movie='.$row['ID_Movie'].'" class="boutton">Info</a><br>';
				echo '<a href="update.php?ID_Movie='.$row['ID_Movie'].'" class="boutton">Update</a><br>';
				echo '<a href="delete.php?ID_Movie='.$row['ID_Movie'].'" class="boutton">Delete</a><br>';

				echo '</td>';
				echo '</tr>';
				} 
			}
			mysqli_close($link);
			?>
		</tbody>
	    </table>
	</form>
    <footer>
      <small>
        &copy; Copyright 2022, Nantes Université, RAT Damien and LOUET Julien
      </small>
    </footer>
  </body>
</html>
