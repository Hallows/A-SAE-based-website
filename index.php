<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   
  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  

<html>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--set title and link css stylesheet-->
<head>
	<TITLE>The EEEM042 Assignment</TITLE>
	<link rel="stylesheet" type="text/css" href="register.css" />
	<meta charset="UTF-8">
</head>

<?php
static $filename;
if(isset($_POST["upload"])){  
    // SAE Storage Class
    $storage= new SaeStorage();  
    $domain = 'assignment';//name of storage domain
      
    $fileType = $_FILES["file"]["type"]; //file type
  
      
    if($storage->fileExists($domain,$filename) == true) {// is already exist?
        echo "<p>File exist!</p>";  
        }  
    else{  
    $filename = $_FILES["file"]["name"];  
    $storage->upload( $domain,$filename,$_FILES[file][tmp_name]);   
	}   
	echo "<h1> Success Upload!</h1>";
} 
?>

<!--!!!!!!!!!Body Start HERE!!!!!!!!!!!!!-->
<body bgcolor="#003e7e">
    <h1>Registration Page</h1>
    <!--registration form-->
	<form action="/server/php/regist.php" method=post>
	<h2>What do you want to regist?</h2>
	<select name="type">
		<option value="sensor">Sensor</option>
		<option value="event">Event</option>
		<option value="device">Device</option>
	</select>
	<h2>Item name</h2>
	<input type="text" name="name"><br>
	<h2>Item describe</h2>
	<input type="text" name="describe"><br>
	<h2>Up Location</h2>
	<select name="location">
		<option value="UK">UK</option>
		<option value="China">China</option>
		<option value="USA">USA</option>
		<option value="Australia">Australia</option>
		<option value="Iran">Iran</option>
	</select><br>
	<input type="submit" class="btn" value="Submit"><br>
	</form>
	<br>
	<!--search form-->
	<form action="/server/php/search.php" method=post>  
        <select name="type">
			<option value="sensor">Sensor</option>
			<option value="event">Event</option>
			<option value="device">Device</option>
		</select>
        <input type="submit" class="btn" value="Search">
    </form>  
    <br>
    <!--upload file form-->
	<form method="POST" enctype="multipart/form-data">  
    	<input type="file" name="file" id="file" />  
    	<input type="submit" value="Upload" name="upload"/>     
	</form>
	<input type="submit" onclick="gogogo()" class="btn" value="Analysis">


</body>

  
<SCRIPT LANGUAGE="JavaScript">

    function gogogo(){
    	var filename= '<?php echo $filename;?>';
    	var params = {
        "filename": filename,
    	};
    	var temp = document.createElement("form");
    	temp.method = "post";
    	temp.style.display = "none";
		temp.action = "/server/php/XMLtransfer.php";
    	for (var x in params) {
        	var opt = document.createElement("textarea");
        	opt.name = x;
        	opt.value = params[x];
        	temp.appendChild(opt);
    	}
    	document.body.appendChild(temp);
    	temp.submit();
    	return temp;
    }
</SCRIPT>   
</html>