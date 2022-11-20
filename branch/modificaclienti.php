<?
error_reporting( ~E_ALL);
ob_start();
if(isset($_COOKIE['fabiowork']))  {
session_start(); 
$_SESSION['logged']=$_COOKIE['fabiowork'];
if($_COOKIE['fabiowork']!="giliberti") die("<head><meta http-equiv=\"refresh\" content=\"2;url=index.php\" /></head>");
}
else session_start();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	
		<title>anagrafica clienti</title>
		
	<!-Parte di Spry->
		<link href="./newstyle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
			<script language="JavaScript" type="text/javascript">
		
		

var dsClientlist = new Spry.Data.XMLDataSet("file_xml/users.php", "clienti/cliente");
		
		
		</script>
		
	<!-Parte di Dojo->
		<script type="text/javascript" src="dojo/dojo.js"></script>
		<script language="JavaScript" type="text/javascript">
			dojo.require("dojo.widget.*");
			dojo.require("dojo.event.*");
			dojo.require("dojo.io.*");
			dojo.hostenv.writeIncludes();
			
		</script>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>

</head>
	
	<body>
		<a href="index.php" class="stampa">HOME PAGE</a>
		
<h1>Anagrafica</h1>


        <font face="Tahoma" color="black" size="3"><b>dati</b></font>
		<br><div id="debug" class="stampa"></div>
		<p>Riepilogo dei clienti</p><br>
		

<form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
<div id="Specials_DIV" spry:region="dsClientlist">
		<table>
			<tr>
				<th scope="col" width=10%><center>id</center></th>
				<th scope="col" width=10%><center>Cognome</center></th>
				<th scope="col" width=10%><center>Elimina</center></th>
			</tr>
			<tbody spry:repeatchildren="dsClientlist">
			<tr>
				<td>{@id}</td>
				<td>{cliente}</td>
				<td><input type="checkbox" name="clientdel" value="{@id}"></td>
			</tr>
			</tbody>
		</table> </div>
		<input type=submit value="elimina cliente">
</form> 
		
<div id="docpane" dojoType="ContentPane">
    

</body>
</html>