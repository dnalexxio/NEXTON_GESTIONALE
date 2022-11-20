<? session_start(); 
include 'newconf.php';

if(!isset($_SESSION['logged'])) { 
			header('Location: /gestionALE/index.php');
			die("Esegui login"); }

?>
<head><TITLE>Visualizzazione ordini</TITLE>
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
	
<script type="text/javascript">
var dsSeek = new Spry.Data.XMLDataSet("file_xml/newrighe.php?conto=0", "ordini/prodotto");
var dsTotale = new Spry.Data.XMLDataSet("file_xml/newrighe.php?conto=0", "ordini/riepilogo");
var contonumero=0;
function drillon(){

 dsSeek.setURL('file_xml/newrighe.php?usern=<? echo $_SESSION['logged'];?>&conto='+contonumero);
 dsTotale.setURL('file_xml/newrighe.php?usern=<? echo $_SESSION['logged'];?>&conto='+contonumero);
dsSeek.loadData();
dsTotale.loadData();

}
var dsAcquisti=dsSeek;

function strippa(num) {
var thediv=dojo.widget.byId("docpane");
thediv.setUrl("newrigenera.php?trip="+num);

}

function changeyear(thevalue){
var thediv=dojo.widget.byId("tuttiord");
thediv.setUrl("riepann.php?y="+thevalue);
}
</script>
</head><body bgcolor="lightsteelblue"><a href="index.php" class="stampa" >HOME PAGE</a>

<div id="stile" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>fgiliberti@libero.it</div>
<div id="client" align="right">Ordine della DITTA:<br><? echo $_SESSION['logged'];?></div>
<h3 align="center">VISUALIZZA ALTRI ORDINI<SELECT name="tendinaanno" onchange="changeyear(this.value)">
<? 
$d=date("Y");
while($d>2006) { echo "<option>$d</option>"; $d--; }
?>
</SELECT></h1></h3>
<div dojoType="ContentPane" id="tuttiord">
<? include("riepann.php"); ?>
</div>
<div align="center"><a href="genera.php"> GENERA UN NUOVO ORDINE</a></div> <br>
<br>
<div dojoType="ContentPane" id="docpane"></div>

<div id="Special_DIV" spry:region="dsAcquisti">
	<table id="products">
		<caption> Riepilogo dell'acquisto della ditta <? echo $_SESSION['logged'];?> <font color="#FF2B0A">ORDINE NUMERO {trackno}({codiceord})</font></caption>
		<tr>
			<th scope="col" width="10%"><center>Codice</center></th>
			<th scope="col" width="30%"><center>Nome</center></th>
			<th scope="col" width="10%"><center>sconto</center></th>
			<th scope="col" width="10%"><center>sconto2</center></th>
			<th scope="col" width="10%"><center>sconto3</center></th>
			<th scope="col" width="10%"><center>Quantita'</center></th>
			<th scope="col" width="10%"><center>Prezzo</center></th>
			<th scope="col" width="10%"><center>PREZZO MODIF</center></th>
			<th scope="col" width="10%"><center>NETTO</center></th>
		</tr>
		<tbody spry:repeatchildren="dsAcquisti" >
			<tr  spry:hover="rowHover" spry:select="rowSelected">
			
  	 			<td width="10%"><center>{code}</center></td>
				<td width="30%"><center>{name}</center></td>
				<td width="10%"><center>{sconto}</center></td>
				<td width="10%"><center>{sconto2}</center></td>
				<td width="10%"><center>{sconto3}</center></td>
				<td width="10%"><center>{quantity}</center></td>
				<td width="10%"><center>{price}</center></td>
				<td width="10%"><center>{newprice}</center></td>
				<td width="10%"><center>{netto}</center></td>
			
			</tr>
		</tbody> 
	</table>
</div><div align="right" spry:region="dsTotale" id="tot">TOTALE: {tot} EURO<br>Imponibile: {imponibile}</div>
</body>