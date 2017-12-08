<?php
	session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Urenregistratie</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
	<div class="container">
        <!-- Individueel Activiteit Formulier -->
		
		<?php
			$q = $_GET['q'];

			require("linkDB.php");

			mysqli_select_db($conn,"urenregistratie");
			$sql="SELECT * FROM record WHERE RecordId LIKE '%".$q."%' AND UserId='".$_SESSION["UserId"]."'";

			$result = mysqli_query($conn,$sql);

			echo '<div class="list-group">';

			while($row = mysqli_fetch_array($result)) 
			{
				echo '<a class="list-group-item"><span class="badge text-right">'.$row["Datum"].'</span>'.$row["RecordNaam"].' </a>';
				echo '<a class="list-group-item">Activiteituren: <span class="badge text-right">Start: </span>'.$row["StartActiviteit"].'<span class="badge text-right">Stop: </span>'.$row["StopActiviteit"].'</a>';
				echo '<a class="list-group-item">Reistijden: <span class="badge text-right">Vertrek: </span>'.$row["StartRijden"].'<span class="badge text-right">Aankomst: </span>'.$row["StopRijden"].' <span class="badge text-right">Pauze: </span>'.$row["PauzeTijd"].'</a>';
				echo '<a class="list-group-item"><span class="badge text-right">Omschrijving: </span>'.$row["Comment"].'</a>';
				echo '<a class="list-group-item"><span class="badge text-right">OK Status: </span>'.$row["OK"].'</a>';
			}
			echo "</div><br>";
			echo "<a href='../index.php'>TERUG</a>";
			mysqli_close($conn);
			?>
		
    </div><!-- /container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!--<script src="JavaScript/localstorage.js"></script>-->
  </body>
</html>