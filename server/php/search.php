<?php
$type = $_POST["type"];
$name  = $_POST["name"];
$describe = $_POST["describe"];
$location = $_POST["location"];
$time=time();
$id=0;

$mysql = new SaeMysql();


if($type=="sensor")
$sql = "INSERT  INTO `assignment` ( `type` , `name` , `describe`, `location` ) VALUES ( '"  .$type . "' , '" . $name . "' , '" . $describe . "' , '" . $location . "' ) ";
if($type=="event")

if($type=="device")



$temp=$mysql->getdata( $sql );
if( $mysql->errno() != 0 )
{
    die( "Error:" . $mysql->errmsg() );
}
else
{
	echo $temp; 
}

$mysql->closeDb();
?>