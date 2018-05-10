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

$xml = simplexml_load_string($file);
foreach($xml->children() as $child)
  {
  echo $child->getName() . ": " . $child . "<br />";
  }
?>
</body>
<h2>Do you want to save it?</h2>
