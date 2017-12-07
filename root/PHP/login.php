<?php
	session_start();
	require("linkDB.php");

	//RESET variables
	unset($_SESSION["active"]);
	unset($_SESSION["UserId"]);
	unset($_SESSION["message"]);
	
	if(isset($_POST["naam"]))
	{
		$naam = $_POST["naam"];
		$paswoord = hash("sha1", $_POST["paswoord"]);
		
		$sql = "SELECT * FROM user WHERE UserNaam='".$naam."'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) 
			{
				//echo "id: " . $row["UserId"]. " - Name: " . $row["UserNaam"]. " - " . $row["UserPaswoord"]. "<br>";
				if($naam == $row["UserNaam"])
				{
					if($paswoord == $row["UserPaswoord"])
					{
						$_SESSION["active"] = 696969;
						$_SESSION["UserId"] = $row["UserId"];
						//redirect to index page
						echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
					}
					else 
					{
						$_SESSION["message"] = "User bestaat niet, of Paswoord is fout";
						//redirect to login page
						echo '<meta http-equiv="refresh" content="0;url=../login.php" />';
					}					
				}
			}
		} 
		else 
		{
			$_SESSION["message"] = "User bestaat niet, of Paswoord is fout";
			//redirect to login page
			echo '<meta http-equiv="refresh" content="0;url=../login.php" />';
			echo "ja";
		}

		mysqli_close($conn);
	}
?>