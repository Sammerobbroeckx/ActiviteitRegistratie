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
//,StartRijden'.$teller.',StopRijden'.$teller.'
	echo '	<div id="Aanpassen">
				<table>
					<tr><td>Beginnen rijden</td><td><input id="StartRijden'.$teller.'" type="time" value="'.$row["StartRijden"].'"></input></td></tr>
					<tr><td>Stoppen rijden</td><td><input id="StopRijden'.$teller.'" type="time" value="'.$row["StopRijden"].'"></input></td><td></td></tr>
				</table>
				<button type="button" id="button" class="btn btn-primary" onclick="PasActiviteitRijdenAan(test)">Opslaan</button>
			</div>
			<div id="Aanpassen">
				<table>
					<tr><td>Pauze</td><td><select><option value="0h00">0h00</option><option value="0h15">0h15</option><option value="0h30">0h30</option><option value="0h45">0h45</option><option value="1h00">1h00</option></select></td></tr>
				</table>
				<button type="button" class="btn btn-primary" id="button" onclick="">Opslaan</button>
			</div>
			<div id="Aanpassen">
				<table>
					<tr><td>Status OK?</td><td><select><option value="OK">OK</option><option value="NOK">NOK</option></select></td></tr>
				</table>
				<button type="button" id="button" class="btn btn-primary" onclick="">Opslaan</button>
			</div>
			<div id="AanpassenStop">
				<table>
					<tr><td><button type="button" id="stopButton" class="btn btn-danger">STOP</button></td></tr>
				</table>
			</div>';
		//-------------------------------------------------//
	echo '</div></form>';
	$teller += 1;
}
echo "</div><br>";
mysqli_close($conn);
?>