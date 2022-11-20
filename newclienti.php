<?php if(isset($_COOKIE['fabiowork']))  {
session_start(); 
$_SESSION['logged']=$_COOKIE['fabiowork'];
if($_COOKIE['fabiowork']!="giliberti") die("<head><meta http-equiv=\"refresh\" content=\"2;url=index.php\" /></head>");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	
		<title>AJAX</title>
	<!-Parte di Spry->
		<link href="newstyle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
		<script language="JavaScript" type="text/javascript">
		var zib=0;
	
		
var dsClienti = new Spry.Data.XMLDataSet("file_xml/clienti.php", "clienti/cliente");


function drill(tipo,parola,contiene)	{ 
	document.body.style.cursor='wait';
 dsClienti.setURL('file_xml/clienti.php');

	dsClienti.loadData();
	
}
		</script>
		<script type="text/javascript" src="dojo/dojo.js"></script>
	</head>

	<body>
	

		<div id="sopra">
			<h3>clienti</h3>
<a href="index.php">TORNA ALLA HOME</a>

		</div>

		<br>
		
<div dojoType="ContentPane" layoutAlign="client" 
				id="clipane" ><script language="JavaScript" type="text/javascript">
function drillon(){
document.body.style.cursor='wait'; 
 dsClienti.setURL('file_xml/clienti.php?index='+zib++);
dsClienti.loadData();
}
function drillback(){
document.body.style.cursor='wait'; 
zib--;
if (zib<0) zib=0;
 dsClienti.setURL('file_xml/clienti.php?index='+zib);
dsClienti.loadData();
}
function drill3(){
document.body.style.cursor='wait'; 
dsClienti.setURL('file_xml/clienti.php?index=0');
zib=0;
dsClienti.loadData();
}
</script>

<p class="stampa">Cliccando sulla riga grigia della tabella e' possibile ordinare i prodotti in base alla colonna</p>

<br>

	<div id="Special_DIV" spry:region="dsClienti">
<center class="stampa"><font size=3>
<a onclick="drillback()">indietro</a>-------------------<a onclick="drill3()">PRIMA PAGINA</a>-----------------
<a onclick="drillon()">avanti</a></font></center>
		<table id="products" class="marginale">

			<caption> Risultato della ricerca</caption>

			<tr>

				

				<th scope="col" width="25%" onclick="dsClienti.sort('cognome', 'toggle');"><font color="white"><center>Cognome e Nome / Denominazione Sociale</center></font></th>

				<th scope="col" width="15%" onclick="dsClienti.sort('stato', 'toggle');"><font color="white"><center>indirizzo</center></font></th>

				<th scope="col" width="15%" onclick="dsClienti.sort('citta', 'toggle');"><font color="white"><center>citta</center></font></th>
				<th scope="col" width="10%" onclick="dsClienti.sort('telefono', 'toggle');"><font color="white"><center>telefono</center></font></th>
	<th scope="col" width="15%" onclick="dsClienti.sort('citta', 'toggle');"><font color="white"><center>fax</center></font></th>
				<th scope="col" width="10%" onclick="dsClienti.sort('cellulare', 'toggle');"><font color="white"><center>cellulare</center></font></th>
				<th scope="col" width="10%" onclick="dsClienti.sort('email', 'toggle');"><font color="white"><center>email</center></font></th>
				<th scope="col" width="10%" onclick="dsClienti.sort('settore', 'toggle');"><font color="white"><center>settore</center></font></th>

			</tr>

			<tbody spry:repeatchildren="dsClienti">

				<tr ondblclick="javascript:location.href='anagraficacli.php?usern={usern}';" spry:hover="rowHover" spry:select="rowSelected">
		

					<td width="25%"><center>{cognome}</center></td>
					<td width="15%"><center>{indirizzo}</center></td>
					<td width="15%"><center>{citta}</center></td>
					<td width="10%"><center>{telefono}</center></td>
					<td width="10%"><center>{nazione}</center></td>
					<td width="10%"><center>{cellulare}</center></td>
					<td width="10%"><center>{email}</center></td>
					<td width="10%"><center>{settore}</center></td>
				</tr>



			</tbody>

		</table>

	</div>

	

			</div>
</TD></TR></table>

</html>



