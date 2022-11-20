<?php 
include 'newconf.php';
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
?>
<!DOCTYPE HTML>
<html>
<head><TITLE>Ultimi 10 ordini</TITLE>
<link href="newstyle.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
	<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
	
<script language="JavaScript" type="text/javascript" src="functions.js"></script>

	<script type="text/javascript" src="dojo/dojo.js"></script>
	<script type="text/javascript">
			dojo.require("dojo.widget.LinkPane");
			dojo.require("dojo.widget.ContentPane");
			dojo.require("dojo.widget.LayoutContainer");
		
</script>
</head><body bgcolor="lightsteelblue"><a href="index.php" class="stampa" >HOME PAGE</a>

<div id="stile" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>fgiliberti@libero.it</div>
<div id="client" align="right">Ordine della DITTA:<br><?php echo $_SESSION['logged'];?></div>
<br>Ultimi 10 ordini
<table border="1">
<?php

$dbh=connect();
$sql="select utente, ordine.codice_ordine, ditta, data_ordine, prezzo_tot, trackno, note from utente right join ordine on id=id_utente_fk order by codice_ordine DESC LIMIT 10";
$conta=$dbh->query($sql);
$conta=$conta->fetchAll(); 

foreach ($conta as $name=>$value){

echo "<tr><td>".$name."</td><td>".$value[0]."</td><td>".$value[1]."</td> <td> ".$value[2]." </td><td> ".$value[3]." </td> <td>  ".$value[4]."</td>  <td> ".$value[5]."</td><td> ".$value[6]."</td></TR>";
}
?>
</table>
</body>
</html>
