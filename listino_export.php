<?php
// Connection 
include('newconf.php');
if (!isset($_POST['tendaazi'])) {
	?>
<html>
<head>
<link href="newstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1>Estrazione Listino</h1>
<form id="" method="POST" action="listino_export.php">
<select name="tendaazi" id="tendaazi">
<?php

$dbh=connect();

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT DISTINCT(categoria) FROM prodotto  where categoria not like '' ORDER BY categoria";
$result=$dbh->query($sql);
$dataset=$result->fetchAll();
foreach ($dataset as $cat) echo "<option>$cat[0]</option>";
?>

</select>
<input type="submit" />
</form>
</body>
</html>
<?php 

}
else {
$ditta=$_POST['tendaazi'];

//$conn=mysql_connect('localhost','root','');
//$db=mysql_select_db('excel',$conn);

$filename = "LISTINO_". $ditta.".xls"; // File Name
// Download file
if ($debug==0) header("Content-Disposition: attachment; filename=\"$filename\"");
if ($debug==0) header("Content-Type: application/vnd.ms-excel");


$extract_query="SELECT 
codice_prodotto,
nome,
prezzo_unit,
IF(quantity ='', 0, quantity) quantity,
IF(misura ='', 0, misura) misura,
IF(color ='', 0, color) color,
categoria
 FROM prodotto where categoria like '%{$ditta}%';";

try{
$dbh=connect();
$array_extract = $dbh->query($extract_query,PDO::FETCH_ASSOC);
$flag = false;

foreach ($array_extract as $array_extract_row)
	{
		if (!$flag) {
		$row = str_replace("\t"," ",array_keys($array_extract_row));
		$row = str_replace(",",".",array_keys($array_extract_row));
		echo implode("\t", $row) . "\r\n";
		
		
        $flag = true;
  					  }
  	$row  = str_replace("\t"," ",array_values($array_extract_row));
	$row  = str_replace(",",".",array_values($array_extract_row));				  
    echo implode("\t", $row ) . "\r\n";
  	 
	}



}
catch (PDOException $e) { echo $e->getMessage(); die("errore!!"); }


/*
$user_query = mysql_query('select name,work from info');
// Write data to file
$flag = false;
while ($row = mysql_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
*/
}
?>
