<?php
$type = $_POST["type"];
$name  = $_POST["name"];
$describe = $_POST["describe"];
$location = $_POST["location"];
$time=time();
$id=0;

// connect to database
$db = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

if ($db) {
    mysql_select_db(SAE_MYSQL_DB, $db);
}
else
	echo "Can not connect to database!";


if($type=="sensor")
$result = mysql_query("SELECT * FROM assignment WHERE type='sensor'");
if($type=="event")
$result = mysql_query("SELECT * FROM assignment WHERE type='event'");
if($type=="device")
$result = mysql_query("SELECT * FROM assignment WHERE type='device'");

echo "<table border='1'>
<tr>
<th>time</th>
<th>type</th>
<th>name</th>
<th>location</th>
<th>describe</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['time'] . "</td>";
  echo "<td>" . $row['type'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['describe'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);


?>


