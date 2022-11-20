<?php
include('newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}

$dd=date("Y");
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	<meta charset="UTF-8">
		<title>Ordini Clienti</title>
		
		<link href="newstyle.css" rel="stylesheet" type="text/css" />

		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
		
		<script language="JavaScript" type="text/javascript">
		
			var dsSpend = new Spry.Data.XMLDataSet("file_xml/newbill.php?y=<?=$dd ?>", "clienti/cliente");
			dsSpend.setColumnType("tot", "number");
			dsSpend.setColumnType("ismaj", "number");
			

			function changeyear(yvalue){
			dsSpend.setURL("file_xml/newbill.php?y="+yvalue, "clienti/cliente");
			dsSpend.setColumnType("tot", "number");
			dsSpend.setColumnType("ismaj", "number");
			dsSpend.loadData();
			}
			
</script>
		
	
		<script type="text/javascript" src="dojo/dojo.js"></script>
		<script language="JavaScript" type="text/javascript">
			
			dojo.require("dojo.io.*");
			dojo.require("dojo.widget.*");
		


		</script>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>

</head>
<BODY>
	<div><div id="stile" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>Via A.Volta n.5<br> 70017 Putignano(ba)<br>fgiliberti@libero.it<br>Iscrizione ruolo agenti:14315</div>


<a onclick="self.print()" class="stampa"><img src="button-print.png" alt="stampa il documento" class="stampa"></a>
<a href="index.php" class="stampa" >HOME PAGE</a>

<h1>STATISTICHE</h1>   

ANNO: <SELECT name="tendinaanno" onchange="changeyear(this.value)">
<?php 

while($dd>2006) { echo "<option value=\"{$dd}\">{$dd}</option>"; $dd--; }
?>
</SELECT>
<div id="Special_DIV" spry:region="dsSpend">
	<table id="products" class="minimal rigablu" >
		<caption> Riepilogo dell'acquisto dei clienti</caption>
		<tr>
			<th scope="col" width="10%" onclick="dsSpend.sort('ds_RowID', 'toggle');"><center>riga</center></th>
			<th scope="col" width="10%" onclick="dsSpend.sort('nome', 'toggle');"><center>NOME</center></th>
			<th scope="col" width="30%" onclick="dsSpend.sort('tot', 'descending');"><center>SPESA TOT</center></th>
<th scope="col" width="10%" onclick="dsSpend.sort('ismaj', 'descending');"><center>ismaj</center></th>
			
		</tr>
		<tbody spry:repeatchildren="dsSpend" >
			<tr   spry:hover="rowHover" spry:select="rowSelected">
  	 			<td>{ds_RowID}</td>				
				<td width="10%"><center>{nome}</center></td>
				<td width="30%"><center>{tot}</center></td>
				<td>{ismaj}</td>
			
		</tbody>
	</table><!--onclick="dsAcquisti.setCurrentRow('{ds_RowID}');"-->
</div>



</BODY></html>
