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
    echo '<a data-toggle="collapse" data-target="#ActivityActive'.$teller.'" href="#" class="list-group-item ActivityActive"><b>Active  </b>'.$row["RecordNaam"].' <span class="badge text-right">'.$row["Datum"].'</span></a><br>';
	echo '<div id="ActivityActive'.$teller.'" class="collapse ActiveDropdown"> Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren 60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten. </div>';
	$teller += 1;
}
echo "</div><br>";
mysqli_close($conn);
?>