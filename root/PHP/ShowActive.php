 <?php
session_start(); 
 
require("linkDB.php");

mysqli_select_db($conn,"urenregistratie");
$sql="SELECT * FROM record WHERE ActiviteitStatus = 1 AND UserId='".$_SESSION["UserId"]."'";

$result = mysqli_query($conn,$sql);

echo '<div class="list-group">';

$teller = 1;

while($row = mysqli_fetch_array($result)) 
{
    echo '<form action="PHP/ActiviteitEindigen.php"><a data-toggle="collapse" data-target="#ActivityActive'.$teller.'" href="#" class="list-group-item ActivityActive"><b>Active  </b>'.$row["RecordNaam"].' <span class="badge text-right">'.$row["Datum"].'</span></a><br>';
	echo '	<div id="ActivityActive'.$teller.'" class="collapse ActiveDropdown">';
		//------------JELLE HIER MOET LAYOUT KOMEN---------//

	echo '	<div id="Aanpassen">
				<table>
					<tr><td>Beginnen rijden</td><td><input type="time" value="'.$row["StartRijden"].'"></input></td><td></td></tr>
					<tr><td>Stoppen rijden</td><td><input type="time" value="'.$row["StopRijden"].'"></input></td><td></td></tr>
					<tr><td></td><td></td><td><button type="button" class="btn btn-primary" onclick="PasActiviteitAan('.$row["RecordId"].')">Opslaan</button></td></tr>
				</table>
			</div>';
		//-------------------------------------------------//
	echo '</div></form>';
	$teller += 1;
}
echo "</div><br>";
mysqli_close($conn);
?>