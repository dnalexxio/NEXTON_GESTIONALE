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
	
		<title>Ricerca Opzioni Cliente</title>
		
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
var dsArt = new Spry.Data.XMLDataSet("file_xml/clienti_seek_xml.php", "clienti/cliente");

function drill(sett,zona)	{ 
	
	document.body.style.cursor='wait';
 dsArt.setURL('file_xml/clienti_seek_xml.php?settore='+sett+'&zona='+zona);

	dsArt.loadData();
	
document.body.style.cursor='auto';
}
</script>

	

	</head>
<body>
<h1>Ricerca Opzioni Cliente</h1>
<hr>


<a href="index.php" class="stampa" >HOME PAGE</a>
 <BR> <BR>
<form onsubmit="return false;">
  Ricerca Settore: 
<select id="sett" name="sett" >
<?php
$provs = estrai_settore();

foreach ($provs as $provid=>$prov){
echo "<option>".$prov['settore']."</option>";

}
echo "<option selected>tutti</option>";
?> 
</select>
 <BR>
 Ricerca ZONA: 
<select id="zona" name="zona" >
<?php
$provs = estrai_zona();

foreach ($provs as $provid=>$prov){
echo "<option>".$prov['zona']."</option>";

}
echo "<option selected>tutti</option>";
?> 
</select>
<BR>
<input type="button" value="ricerca" onclick="drill(sett.value,zona.value)" />

</form>
<br><br><br>
<div spry:region="dsArt">
<table border="1"><caption>Clienti</caption>
        <tr>
<th scope="col">Cliente</th>
	 <th scope="col">Provincia</th>        
        <th scope="col">Settore</th>
                <th scope="col">Zona</th>
	   
        </TR>
        <tr spry:repeat="dsArt">
		 <td>{cognome}</td>
		  <td>{provincia}</td>
          <td>{settore}</td>
          <td>{zona}</td>
			 
        </tr>

</table>
</div>

</body>