<? 
include ('newconf.php');
global $iva;
session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	
		<title>ORDINE CORRENTE</title>
<meta charset="utf-8" />				
<link href="css/newstyle_tablet.css" rel="stylesheet" type="text/css" media="(min-device-width: 0px) and (max-device-width: 320px)" >
<link href="css/newstyle_tablet.css" rel="stylesheet" type="text/css" media="(min-device-width: 321px) and (max-device-width: 768px)" >
<link href="newstyle.css" rel="stylesheet" type="text/css" media="(min-device-width: 769px)" >

		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
		<script language="JavaScript" type="text/javascript">
		
			var dsUser = new Spry.Data.XMLDataSet("file_xml/anagrafica.php?usern=<? echo $_SESSION['logged'];?>", "voce");
			var dsAcquisti = new Spry.Data.XMLDataSet("file_xml/newrighe.php?usern=<? echo $_SESSION['logged'];?>&conto=<? echo $_SESSION['conto'];?>", "ordini/prodotto", {   useCache:  false , sortOnLoad: "ds_RowID"  });
			
			var dsTotale = new Spry.Data.XMLDataSet("file_xml/newrighe.php?usern=<? echo $_SESSION['logged'];?>&conto=<? echo $_SESSION['conto'];?>", "ordini/riepilogo", {   useCache:  false   });

dsAcquisti.setColumnType("ds_RowID", "number");
function drillon(){

dsAcquisti.setURL('file_xml/newrighe.php?usern=<? echo $_SESSION['logged'];?>&conto=<? echo $_SESSION['conto'];?>',{ useCache:  false },{ sortOnLoad: "ds_RowID" });
  dsTotale.setURL('file_xml/newrighe.php?usern=<? echo $_SESSION['logged'];?>&conto=<? echo $_SESSION['conto'];?>',{ useCache:  false },{ sortOnLoad: "code" });
dsAcquisti.loadData();
 dsTotale.loadData();

}
function changetot(){

 total=parseFloat(document.getElementById('oldtot').value);
 tr=parseFloat(document.getElementById('traspor').value);

final=(tr+total);
document.getElementById('finaltot').value=final;
}



function changetot(){
<? global $iva;
echo "var iva=".$iva.";";
?>

var total=document.getElementById('oldtot').value;
var tr=document.getElementById('traspor').value;
 
 total = total.replace (/,/g,'\.');
  
 tr = tr.replace(/,/g,'\.'); 
 
 total=parseFloat(total);
 tr=parseFloat(tr);

final=parseFloat(tr+total);
imponibile=final*iva;
final=final+imponibile;
final+='';
final=final.replace(/\./g,',');
document.getElementById('finaltot').value=final;

}


</script>
		
	
		<script type="text/javascript" src="dojo/dojo.js"></script>
		<script language="JavaScript" type="text/javascript">
			
			dojo.require("dojo.io.*");
			dojo.require("dojo.widget.*");
			dojo.hostenv.writeIncludes();


		</script>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>
<script type="text/javascript">
function dojoForm3(form) {
				var kw = {
					mimetype: "text/plain",
					url: "newrequest.php",
					formNode: form,
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						allora.innerHTML="loading..";
						allora.innerHTML=txt;
						drillon()
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				return false;
			}
function dojodel3(ordine,codice,misura) {
				var kw = {
					mimetype: "text/plain",
					method: "POST",
					content: { "order" : ordine, "delproduct": codice, "misura": misura },
					url: "newrequest.php",
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						var xbox =dojo.byId('princ') ;
						allora.innerHTML=txt;
						xbox.innerHTML='';
						drillon()
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				return false;
			}
</script>
<style>
input {
width: 100px;
border: none;
background-color: #fff;
}

P.trasp{
border: none;
background-color: transparent;
margin-top:0;
margin-bottom:0;
padding:0;
margin-left:50px; 
font-family:Arial, sans-serif;
font-size:10pt;
}
#oldtot{
font-size:18px;
}
DIV#sec.traspi{
font-size: 8pt;

}
DIV.totf{

font-size: 10pt;
}

#menu_pi2{
margin: 0px;
position: absolute;
z-index: 2;
}
</style>

</head>
<BODY>
<div id="stile" >Fabio Giliberti    
Rappresentanze<br>Via 
A.Volta n.5<br> 70017 
Putignano(ba)<br>tel. 3396232638<br>fgiliberti@libero.it<br>fax: 
0804912083 <br>GLBFBA78E11H096U<br>p.iva: IT05524720728</div>

<div id="client" spry:region="dsUser" align="right">Ordine della DITTA:<br> {cognome} <br>{indirizzo}<br> {citta} {cap}<br>Tel {telefono} - FAX:{nazione}<br>{paga} ABI/CAB:{abicab}<br> {cfisc}<br>{mail}
</div>
		<div id="menu_pi2" class="stampa">
		<a onclick="self.print()" class="stampa"><img src="button-print.png" alt="stampa il documento" class="stampa"></a>
		<a href="index.php" class="stampa" >HOME PAGE</a>
		<a href="newSeek.php" target="new" class="stampa">Cerca prodotti</a>
		<br><a onclick="javascript:drillon();document.getElementById('princ').innerHTML='';" class="stampa"><STRONG> ricarica</STRONG></a>
		<br>
		<a onclick="dojo.widget.byId('docpane').setUrl('note.php?prova=<? echo $_SESSION['conto'];?>');" class="stampa">inserisci note</a>
		</div>

<div id="docpane" dojoType="ContentPane" class="stampa"></div><br><br><br>
<br><div  align="left" spry:region="dsTotale" id="date"><font color="blue" size="4" ><b>DATA ORDINE: {date}</b></font><br>    FORNITORE:{fornitore}</div>

<div id="Special_DIV" spry:region="dsAcquisti">
	<table id="products" class="minimal rigablu" >
		<caption> Riepilogo dell'acquisto NUMERO 
<? echo $_SESSION['conto']."   (".$_SESSION['contovisualizzabile'].")  "; ?> 
		</caption>
		<tr>
			<th scope="col" width="10%" onclick="dsAcquisti.sort('ds_RowID', 'toggle');"><center>riga</center></th>
			<th scope="col" width="10%"><center>Codice</center></th>
			<th scope="col" width="100%" ><center>Nome</center></th>
			<th scope="col" width="30%"><center>misura</center></th>
			<th scope="col" width="10%"><center>Quantita</center></th>
			<th scope="col" width="10%"><center>UM</center></th>
			<th scope="col" width="10%"><center>Prezzo</center></th>
			<th scope="col" width="10%"><center>PREZZO NETTO</center></th>			
			<th scope="col" width="10%"><center>sconto</center></th>
			<th scope="col" width="10%"><center>sconto2</center></th>
			<th scope="col" width="10%"><center>sconto3</center></th>
			<th scope="col" width="10%"><center>BestPrice</center></th>
			<th scope="col" width="10%"><center>IMPORTO</center></th>
			
		</tr>
		<tbody spry:repeatchildren="dsAcquisti" >
			<tr  

				onclick="dojo.widget.byId('princ').setUrl('updatebuy.php?getcode={id_prod}&misur={misura}');">
  	 			<td width="10%">{ds_RowID}</td>				
				<td width="10%"><center>{code}</center></td>
				<td width="100%" ><center>{name}</center></td>
				<td width="30%"><center>{misura}</center></td>
				<td width="10%"><center>{quantity}</center></td>
				<td width="10%"><center>{um}</center></td>
				<td width="10%"><center>{price}</center></td>			
				<td width="10%"><center>{newprice}</center></td>				
				<td width="10%"><center>{sconto}</center></td>
				<td width="10%"><center>{sconto2}</center></td>
				<td width="10%"><center>{sconto3}</center></td>
				<td width="10%"><center>{bestprice}</center></td>
				<td width="10%"><center>{netto}</center></td>
				<td width="10%"><center><button name="aa" class="stampa" onclick="dojodel3('<? echo $_SESSION['conto'];?>','{id_prod}', '{misura}')">cancella</button></center></td>
			</tr>
			
		</tbody>
	</table><!--onclick="dsAcquisti.setCurrentRow('{ds_RowID}');"-->
</div>
<div id="princ" dojoType="ContentPane" class="stampa"></div>


<div  align="right" spry:region="dsTotale" id="tott"><font 
color=red>Imponibile: 
<input type="text" id="oldtot" value="{tot}"  /> 
EURO</font><br>
<script language="Javascript">

df=document.getElementById('oldtot').value;

df=df.replace(/,/g,'\.');
df=parseFloat(df);
<?
echo "da=df*".$iva.";";

?>
da=da.toFixed(2);
invadiv=document.getElementById('iva');
<?
global $iva;
echo "invadiv.innerHTML='IVA 22%: '+da;";
?>

</script>
<p class="trasp" id="iva"></p>
<div class="traspi" id="sec">
<form method="POST">
Trasporto: <input type="text" name="traspo" id="traspor" value="{trasporto}" />EURO
<input type="button" class="stampa" onclick="changetot();return dojoForm3(this.form);" value="cambia"/>	
<input type="hidden" name="total_sped" value="<? echo $_SESSION['conto']; ?>"> 
<div id="finaltot" class="totf">Totale doc: {finalp} EURO </div>
</form></div>
<p align="left">Note: {note}</p>
</div>



</BODY></html>
