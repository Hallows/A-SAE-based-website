<html>
<head>
	<link rel="stylesheet" type="text/css" href="/server/php/trans.css" />
</head>
<body>
<h2>The JSON file of posted data shows like below:</h2>
<br>
<?php
//target class
class TransData {
       public $Ttype = "";
       public $Tname  = "";
       public $Tdescribe = "";
       public $Tlocation = "";
   }
	$type = $_POST["type"];
	$name  = $_POST["name"];
	$describe = $_POST["describe"];
	$location = $_POST["location"];
//Instantiation
   $e = new TransData();
   $e->Ttype =  $_POST["type"];
   $e->Tname  =  $_POST["name"];
   $e->Tdescribe =  $_POST["describe"];
   $e->Tlocation =  $_POST["location"];
//Change to JSON
   echo json_encode($e);
?>
<br>
<h2>Do you want to save it to DataBase?</h2><br>
<input type="submit" onclick="gogogo(params)" class="btn" value="save">


<SCRIPT LANGUAGE="JavaScript">
	var type= '<?php echo $type;?>';
    var name= '<?php echo $name;?>';
    var describe= '<?php echo $describe;?>';
    var loc= '<?php echo $location;?>';
    var params = {
        "type": type,
        "name": name,
        "describe": describe,
        "location": loc,
    };

//post all info to sava.php
    function gogogo(PARAMS){
    	var temp = document.createElement("form");
    	temp.method = "post";
    	temp.style.display = "none";
		temp.action = "/server/php/save.php";
    	for (var x in params) {
        	var opt = document.createElement("textarea");
        	opt.name = x;
        	opt.value = PARAMS[x];
        	temp.appendChild(opt);
    	}
    	document.body.appendChild(temp);
    	temp.submit();
    	return temp;
    }
</SCRIPT> 

<a href="http://surrey.applinzi.com/">
 <button class="btn">Back</button>
</a>

</body>
</html>