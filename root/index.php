<?php
	session_start();
	if(isset($_SESSION["active"]))
	{
		if($_SESSION["active"] == 696969)
		{
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
	
	<!-- AJAX -->
	<script>
		function showSearch(str) 
		{
			if (str == "") 
			{
				document.getElementById("ShowSearchList").innerHTML = "";
				return;
			} 
			else 
			{ 
				if (window.XMLHttpRequest) 
				{
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} 
				else 
				{
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() 
				{
					if (this.readyState == 4 && this.status == 200) 
					{
						document.getElementById("ShowSearchList").innerHTML = this.responseText;
					}
				};
				
				xmlhttp.open("GET","PHP/SearchList.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
  </head>
  <body>
    <h1 class="text-center">Activiteiten</h1>
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div id="imaginary_container"> 
					<div class="input-group stylish-input-group">
						<input id="ActiviteitSearch" type="text" class="form-control"  placeholder="Search" onkeyup="showSearch(this.value)">
						<span class="input-group-addon">
							<button type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>  
						</span>
					</div>
					<br>
					
					<div id="ShowSearchList">
					
					</div>
					
					<!--<ul class="list-group">
					  <li class="list-group-item">New <span class="badge">12</span></li>
					  <li class="list-group-item">Deleted <span class="badge">5</span></li> 
					  <li class="list-group-item">Warnings <span class="badge">3</span></li> 
					</ul>-->
					
				</div>
			</div>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
<?php
		}
	}
	else
	{
		unset($_SESSION["active"]);
		require("login.php");
		//echo '<meta http-equiv="refresh" content="0;url=login.php" />';
	}
?>