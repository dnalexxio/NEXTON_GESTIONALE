<?php
include('newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}

if(isset($_REQUEST['yeargr'])) $y=$_REQUEST['yeargr'];
else $y="2017";

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	
		<title>statistiche ordine clienti</title>
		
		

		<link href="newstyle.css" rel="stylesheet" type="text/css" />

		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
		
		<script language="JavaScript" type="text/javascript">
		
			var dsSpend = new Spry.Data.XMLDataSet("file_xml/newbill.php?y=<?=$y?>", "clienti/cliente");
			dsSpend.setColumnType("tot", "number");
			
</script>
		
	
		<script type="text/javascript" src="dojo/dojo.js"></script>
		<script language="JavaScript" type="text/javascript">
			
			dojo.require("dojo.io.*");
			dojo.require("dojo.widget.*");
		


		</script>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>

</head>
<BODY>
<a href="index.php" class="stampa" >HOME PAGE</a>
<h3>Statistiche <?php echo $y ?> </h3>

 <SELECT name="tendinaanno" onchange="window.open('newbill_year.php?yeargr'+this.value)">
<?php 
$d=date("Y");
while($d>2006) { echo "<option>$d</option>"; $d--; }
?>
</SELECT>

<div id="Special_DIV" spry:region="dsSpend">
	<table id="products" class="minimal rigablu" >
		<caption> Riepilogo dell'acquisto dei clienti</caption>
		<tr>
			<th scope="col" width="10%" onclick="dsSpend.sort('ds_RowID', 'toggle');"><center>riga</center></th>
			<th scope="col" width="10%" onclick="dsSpend.sort('nome', 'toggle');"><center>NOME</center></th>
			<th scope="col" width="30%" onclick="dsSpend.sort('tot', 'descending');"><center>SPESA TOT</center></th>
			
		</tr>
		<tbody spry:repeatchildren="dsSpend" >
			<tr   spry:hover="rowHover" spry:select="rowSelected">
  	 			<td>{ds_RowID}</td>				
				<td width="10%"><center>{nome}</center></td>
				<td width="30%"><center>{tot}</center></td>
			
		</tbody>
	</table><!--onclick="dsAcquisti.setCurrentRow('{ds_RowID}');"-->
</div>



</BODY></html>
