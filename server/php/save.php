<?php
$type = $_POST["type"];
$name  = $_POST["name"];
$describe = $_POST["describe"];
$location = $_POST["location"];
$time=time();
$id=0;

$mysql = new SaeMysql();

$sql = "INSERT  INTO `assignment` ( `type` , `name` , `describe`, `location` ) VALUES ( '"  .$type . "' , '" . $name . "' , '" . $describe . "' , '" . $location . "' ) ";
$mysql->runSql( $sql );
if( $mysql->errno() != 0 )
{
    die( "Error:" . $mysql->errmsg() );
}

$mysql->closeDb();
echo "<h1>Success!</h1>"
?>