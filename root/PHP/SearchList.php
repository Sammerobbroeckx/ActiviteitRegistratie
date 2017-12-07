<?php
session_start();
$q = $_GET['q'];

require("linkDB.php");

mysqli_select_db($conn,"urenregistratie");
$sql="SELECT * FROM record WHERE RecordNaam LIKE '%".$q."%' AND UserId='".$_SESSION["UserId"]."'";

$result = mysqli_query($conn,$sql);

echo '<div class="list-group">';

while($row = mysqli_fetch_array($result)) 
{
    echo '<a href="#" class="list-group-item">'.$row["RecordNaam"].' <span class="badge text-right">'.$row["Datum"].'</span></a>';
}
echo "</div>";
mysqli_close($conn);
?>