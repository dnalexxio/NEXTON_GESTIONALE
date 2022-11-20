<?php 
include('newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
if(!isset($_SESSION['conto'])) die("<font color=\"red\"><br>ERRORE: non puoi effettuare un ordine, se prima non hai fatto la generazione!</font><br><a href=\"genera.php\">Clicca qui per la generazione</a>"); ?>
<html>
<head>
	<title>COMPONI ORDINE</title>
	<link href="newstyle.css" rel="stylesheet" type="text/css" />
	<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
	<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
	
	<script language="JavaScript" type="text/javascript" src="functions.js"></script>
	<script type="text/javascript" src="dojo/dojo.js"></script>
	<script type="text/javascript">
		dojo.require("dojo.widget.LinkPane");
			dojo.require("dojo.widget.ContentPane");
			dojo.require("dojo.widget.LayoutContainer");
		

var dsSeek = new Spry.Data.XMLDataSet("file_xml/seek.php", "products/product",{ sortOnLoad: "code" , useCache: "false"});

		
	</script>
	
<script language="JavaScript" type="text/javascript">
		var metodo='name';
			var zib=1;
var dsSeek = new Spry.Data.XMLDataSet("file_xml/seek.php", "products/product");		
	/*	
			function myRegionCallback(rgnName, rgnState)
			{
				if (rgnState ==  Spry.Data.Region.RS_PostUpdate)
					var acc = new Spry.Widget.Accordion("Acc1");
			}
		
		Spry.Data.Region.addObserver("Acc1", "myCallback", myRegionCallback);

var myObserver = new Object;
myObserver.onDataChanged = function(dataSet, notificationType)
{
	document.body.style.cursor='auto';
};

dsSeek.addDataChangedObserver("myObserverName", myObserver);*/

function drill(tipo,parola,contiene,tendina)	{ 
	zib=0;
	document.body.style.cursor='wait';
 dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&ditta='+tendina+'&contiene='+contiene+'&index=0');
	dsSeek.loadData();
	document.body.style.cursor='default'; 
	
}
function drillon(tipo,parola,contiene,tendina){
document.body.style.cursor='wait'; 
 dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&ditta='+tendina+'&contiene='+contiene+'&index='+zib++);
dsSeek.loadData();
document.body.style.cursor='default'; 

}
function drillback(tipo,parola,contiene,tendina){
document.body.style.cursor='wait'; 
zib--;
if (zib<0) zib=0;
 dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&ditta='+tendina+'&contiene='+contiene+'&index='+zib);
dsSeek.loadData();
document.body.style.cursor='default'; 
}
function drill3(tipo,parola,contiene,tendina){
document.body.style.cursor='wait'; 
dsSeek.setURL('file_xml/seek.php?seek='+tipo+'&word='+parola+'&ditta='+tendina+'&contiene='+contiene+'&index=0');
zib=0;
dsSeek.loadData();
document.body.style.cursor='default'; 
}

</script>
</head>


<body>

<div class="stampa">
[<a href="index.php" >HOME PAGE</a>] [ <a href="zuggest.php">ricerca veloce</a>] </div>
<br>
	<div id="stile" align="right" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>fgiliberti@libero.it</div>
	<div id="client" align="right" style="left: 319px; top: 50px; width: 281px; height: 65px">Ordine della DITTA:<?php echo $_SESSION['logged'];?></div>
        <div align="right"><font size="6px">Ricerca Prodotto</font></div><hr /><p><a href="neworders.php" target="new">Visualizza ordine corrente in una nuova finestra</a><?php if(isset($_SESSION['conto'])) echo"   &nbsp;&nbsp;&nbsp;&nbsp;   Hai un ordine aperto, il numero ".$_SESSION['conto']."(".$_SESSION['contovisualizzabile'].")"; ?></p>
<table width="100%" name="no"><CAPTION>Criteri di ricerca</CAPTION><tr><td>

	<br><div layoutAlign="left"  id="partemenu">
	
		
			<td>
				
					
						<td><input type="radio" name="scelta" onclick="metodo='name'">Nome prodotto</td>
					
						<td><input type="radio" name="scelta" onclick="metodo='code'">Codice prodotto</td>
					
<!-- 					<td><input type="radio" name="scelta" onclick="metodo='category'">DITTA</td> -->
<td>Ditta:<select name="tendaazi" id="tendaazi">

<!--<option>TUTTE</option>
<option>mass</option>
<option>nes</option>
<option>biand</option>
<option>villa</option>
<option>sapio</option>
<option>volpi</option>
<option>iur</option>
<option>tecnolam</option>
<option>cebo</option>
<option>colortap</option>
<option>bonezzi</option>-->
<?php 
$dbh = new PDO('mysql:host=localhost;dbname=fabio', "root", "oZdij5",array(
  PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE=> true
));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT DISTINCT(categoria) FROM prodotto ORDER BY categoria ";
$result=$dbh->query($sql);
$dataset=$result->fetchAll();
foreach ($dataset as $cat) echo "<option>$cat[0]</option>";
?>
<option>TUTTE</option>
</select></td>
									
			</td>
			<td width="10px">
<td>Inizio parola?: <input type="checkbox" id="containsCB" /><td>
<form onsubmit="return false;">Ricerca: <input type="text" id="filterTF" name="word" >
<input type="submit" onclick="drill(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked,document.getElementById('tendaazi').value);" value="CERCA">

</form></td>
</td><TD>

			
		</tr>
	</table>
	<hr />
	<br>

<br>
	<div  id="Special_DIV" spry:region="dsSeek" >
		
	
	
	<font size=3>
<a onclick="drillback(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked,document.getElementById('tendaazi').value)"><img src="images/indietro.gif"></img>   </a><a onclick="drill3(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked,document.getElementById('tendaazi').value)">PRIMA PAGINA    </a>
<a onclick="drillon(metodo,document.getElementById('filterTF').value,document.getElementById('containsCB').checked,document.getElementById('tendaazi').value)"><img src="images/avanti.gif"></img>   </a></font>
		<table id="products" name="lista" class="rigablu">
			<caption> Risultati della ricerca ({affected} in totale): </caption>
			<tr>
				<th scope="col" width="10%"><font ><center>Codice</center></font></th>
				<th scope="col" width="20%"><font ><center>Nome Prodotto</center></font></th>
				<th scope="col" width="35%"><font ><center>misura</center></font></th>
				<th scope="col" width="15%"><font ><center>DITTA</center></font></th>
				<th scope="col" width="35%"><font ><center>CONFEZIONE DA:</center></font></th>
				<th scope="col" width="35%"><font ><center>Prezzo</center></font></th>
			</tr>
			<tbody spry:repeatchildren="dsSeek">
				<tr  class="even" onclick="dojo.widget.byId('princ22').setUrl('newbuy.php?getcode={id}&nomep={name}&cat={category}&p={price}&codpr={code}');dojo.byId('docpane2').innerHTML='attesa';" spry:hover="rowHover" spry:select="rowSelected">
					<td width="10%"><center>{code}</center></td>
					<td width="20%"><center>{name}</center></td>
					<td width="15%"><center>{misura}</center></td>
					<td width="15%"><center>{category}</center></td>
					<td width="35%" class="prodDesc"><center>{quantity}</center></td>
					<td width="10%"><center>{price}</center></td>
			
			</tbody>
		</table>
	</div>		

			</div>
<table><TR><TD>
<div dojoType="ContentPane" layoutAlign="right"	id="princ22" ></div></TD><td>
<div dojoType="ContentPane" id="docpane"></div></TD></TR></table>
</body>
</html>
