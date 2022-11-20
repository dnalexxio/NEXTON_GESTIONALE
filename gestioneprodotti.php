<?php 
include('newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
} 
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>GESTIONE PRODOTTI</title>
	<link href="./newstyle.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>

<script language="JavaScript" type="text/javascript" src="functions.js"></script>

	<script type="text/javascript" src="dojo/dojo.js"></script>
	<script type="text/javascript">
		dojo.require("dojo.widget.LinkPane");
			dojo.require("dojo.widget.ContentPane");
			dojo.require("dojo.widget.LayoutContainer");
		


		
	</script>
	
<script language="JavaScript" type="text/javascript">
		var metodo='name';
			var zib=0;
		
		
		
var dsSeek = new Spry.Data.XMLDataSet("file_xml/seek.php", "products/product");
var myObserver = new Object;
myObserver.onDataChanged = function(dataSet, notificationType)
{
	document.body.style.cursor='auto';
};

dsSeek.addDataChangedObserver("myObserverName", myObserver);

function drill(tipo,parola,contiene)	{ 
	zib=0;
	document.body.style.cursor='wait';
 dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&contiene='+contiene+'&index=0');
	dsSeek.loadData();
	
}
function drillon(tipo,parola,contiene){
document.body.style.cursor='wait'; 
 dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&contiene='+contiene+'&index='+zib++);
dsSeek.loadData();
}
function drillback(tipo,parola,contiene){
document.body.style.cursor='wait'; 
zib--;
if (zib<0) zib=0;
 dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&contiene='+contiene+'&index='+zib);
dsSeek.loadData();
}
function drill3(tipo,parola,contiene){
document.body.style.cursor='wait'; 
dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&contiene='+contiene+'&index=0');
zib=0;
dsSeek.loadData();
}
</script>
</head>
<body bgcolor="magenta"><a href="index.php">HOME PAGE</a><br>
	<div id="stile" align="right" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>fgiliberti@libero.it</div>
<h1>Ricerca Prodotto</h1><hr /><p><a href="neworders.php" target="new">Visualizza ordine corrente in una nuova finestra</a></p>
	<h3>Criteri di ricerca</h3><br>
	<?php if(isset($_SESSION['conto'])) echo" Hai un ordine aperto, il numero ".$_SESSION['conto'] ?>
	<br><div layoutAlign="left"  id="partemenu">
	<table width="100%" name="no" >
		<tr>
			<td>
				
					<tr>
						<td><input type="radio" name="scelta" onclick="metodo='name'">Nome prodotto</td>
					</tr>
					<tr>
						<td><input type="radio" name="scelta" onclick="metodo='code'">Codice prodotto</td>
					</tr>
					<tr>
						<td><input type="radio" name="scelta" onclick="metodo='category'">DITTA</td>
					</tr>

				
			</td>
			<td width="10px">Ricerca: <input type="text" id="filterTF" name="word" />
<td>Contiene: <input type="checkbox" id="containsCB" /><input type="submit" onclick="drill(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked);" value="CERCA"/></td>
</td>
			
		</tr>
	</table>
	<hr />
	<br>

<br>
	<div  id="Special_DIV" spry:region="dsSeek" >
		
	
	
	<font size=3>
<a onclick="drillback(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked)">indietro   </a><a onclick="drill3(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked)">PRIMA PAGINA    </a>
<a onclick="drillon(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked)">avanti    </a></font>
		<table id="products" name="lista">
			<caption> Risultati della ricerca ({affected} in totale): </caption>
			<tr>
				<th scope="col" width="10%"><font ><center>Codice</center></font></th>
				<th scope="col" width="20%"><font ><center>Nome Prodotto</center></font></th>
				<th scope="col" width="15%"><font ><center>DITTA</center></font></th>
				<th scope="col" width="35%"><font ><center>Breve descrizione</center></font></th>
				<th scope="col" width="35%"><font ><center>Prezzo</center></font></th>
			</tr>
			<tbody spry:repeatchildren="dsSeek">
				<tr  onclick="javascript:location.href='gestioneprodotto.php?code={id}'" spry:hover="rowHover" spry:select="rowSelected">
					<td width="10%"><center>{code}</center></td>
					<td width="20%"><center>{name}</center></td>
					<td width="15%"><center>{category}</center></td>
					<td width="35%" class="prodDesc"><center>{desc}</center></td>
					<td width="10%"><center>{price}</center></td>
				
				</tr>
			</tbody>
		</table>
	</div>		

			</div>
</TD><TD>
<div dojoType="ContentPane" layoutAlign="right"
				id="princ" ></div>
<div dojoType="ContentPane" id="docpane"></div>
</body>
</html>
