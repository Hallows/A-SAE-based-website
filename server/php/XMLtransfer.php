<html>
<head>
	<link rel="stylesheet" type="text/css" href="/server/php/trans.css" />
</head>
<body>
<h2>The XML result of unpack XML shows like below</h2>
<br>

<?PHP
$filename  = $_POST["filename"];
echo $filename;
echo "<br>";
$s = new SaeStorage();
$domainName = "assignment";  
$file=$s->read($domainName, $filename);

$type;
$name;
$describe;
$location;

$xml = simplexml_load_string($file);
foreach($xml->children() as $child)
  {
  echo $child->getName() . ": " . $child . "<br />";
  switch ($child->getName()){
  	case "type":
  		$type=$child;
  		break;
  	case "name":
  		$name=$child;
  		break;
  	case "describe":
  		$describe=$child;
  		break;
  	case "location":
  		$location=$child;
  		break;	
  	default:
  		break;
  }
  }
?>
</body>

<h2>Do you want to save it?</h2>
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

//post all info to save.php
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