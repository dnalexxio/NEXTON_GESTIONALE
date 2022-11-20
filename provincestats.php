<?php
include ("newconf.php");
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	
		<title>Statistiche Province</title>
		
	<!-Parte di Spry->
		<link href="./newstyle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
				<!-Parte di Dojo->
		<script type="text/javascript" src="dojo/dojo.js"></script>
		<script language="JavaScript" type="text/javascript">
						dojo.require("dojo.widget.*");
			dojo.require("dojo.widget.InlineEditBox");
			dojo.require("dojo.event.*");
			dojo.require("dojo.io.*");
			dojo.hostenv.writeIncludes();
		</script>

		<script language="JavaScript" type="text/javascript" src="functions.js"></script>
<script language="JavaScript" type="text/javascript">
var dsArt = new Spry.Data.XMLDataSet("file_xml/provstat.php", "provincia/row");

function drill(code,cat,year)	{ 
	
	document.body.style.cursor='wait';
 dsArt.setURL('file_xml/provstat.php?prov='+code+'&cat='+cat+'&y='+year);

	dsArt.loadData();
	
document.body.style.cursor='auto';
}
</script>

	

	</head>
<body>



<a href="index.php" class="stampa" >HOME PAGE</a>

<form onsubmit="return false;">
  Ricerca Provincia: 
<select id="art" name="art" >
<?php
$provs = estrai_province();

foreach ($provs as $provid=>$prov){
echo "<option>".$prov['provincia']."</option>";

}
echo "<option>totale</option>";
?> 
</select>
 <BR>
AZIENDA:<input type="text" name="cat" /> <br>
<br>
<select  name="year" id="year">
<?php 
$d=date("Y");
while($d>2006) { echo "<option>$d</option>"; $d--; }
?>
<option>totale</option>
</select>
<input type="button" value="ricerca" onclick="drill(art.value,cat.value,year.value)" />

</form>
<br><br><br>
<div spry:region="dsArt">
<table border="1"><caption>Provincia: {provincia}</caption>
        <tr>
<th scope="col">Totale Ordine (€)</th>
	 <th scope="col">ditta</th>        
        <th scope="col">Cliente</th>
                <th scope="col">Anno </th>
	   
        </TR>
        <tr spry:repeat="dsArt">
		 <td>{totaleordine}</td>
		  <td>{ditta}</td>
          <td>{cognome}</td>
          <td>{year}</td>
			 
        </tr>

</table>
</div>

</body>