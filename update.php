<?php

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$dbc=mysqli_connect('localhost', 'root', '');
@mysqli_select_db($dbc, 'new_data');

$query = "SELECT * FROM handles_values ORDER BY ID DESC LIMIT 1;";
$result = mysqli_query($dbc, $query);

echo "<br>";

echo "<table border='1'>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr><td>ID</td><td>v1</td><td>v2</td><td>v3</td><td>v4</td><td>v5</td><td>v6</td></tr> 
    <tr><td> $row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";  

}
echo "</table>";

echo "<br>";

$query = "SELECT * FROM on_values ORDER BY ID DESC LIMIT 1;";
$result = mysqli_query($dbc, $query);


echo "<br>";

echo "<table border='1'>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr><td>ID</td><td>handle on</td></tr>
    <tr><td>$row[0]</td><td>$row[1]</td></tr>";  

}
echo "</table>";

?>