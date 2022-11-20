<?php
error_reporting( ~E_ALL);
ob_start();
if(isset($_COOKIE['fabiowork']))  {
session_start(); 
$_SESSION['logged']=$_COOKIE['fabiowork'];
if($_COOKIE['fabiowork']!="giliberti") die("<head><meta http-equiv=\"refresh\" content=\"2;url=index.php\" /></head>");
}
else session_start();

?>

<!doctype html>
<html lang="it">
	<head>
<link rel="shortcut icon" href="">	
		<title>anagrafica clienti</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
				<th scope="col" width=10%><center>DIVENTA</center></th>
				<th scope="col" width=10%><center>Cognome</center></th>
				<th scope="col" width=10%><center>Elimina</center></th>
			</tr>
			<tbody spry:repeatchildren="dsClientlist">
			<tr>
				<td>{@id}</td>
				 <td> <a href="requestnewlog.php?uid={@id}">
				<svg  class="bi bi-tools" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1l1-1 3.081 2.2a1 1 0 01.419.815v.07a1 1 0 00.293.708L10.5 9.5l.914-.305a1 1 0 011.023.242l3.356 3.356a1 1 0 010 1.414l-1.586 1.586a1 1 0 01-1.414 0l-3.356-3.356a1 1 0 01-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 00-.707-.293h-.071a1 1 0 01-.814-.419L0 1zm11.354 9.646a.5.5 0 00-.708.708l3 3a.5.5 0 00.708-.708l-3-3z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M15.898 2.223a3.003 3.003 0 01-3.679 3.674L5.878 12.15a3 3 0 11-2.027-2.027l6.252-6.341A3 3 0 0113.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z" clip-rule="evenodd"/>
</svg><a>
				</td>
				<td>{cliente}</td>
				<td><input type="checkbox" name="clientdel" value="{@id}"></td>
			</tr>
			</tbody>
		</table> </div>
		<input type=submit value="elimina cliente">
</form> 
		
<div id="docpane" dojoType="ContentPane">
</div>
</script>

</body>
</html>
