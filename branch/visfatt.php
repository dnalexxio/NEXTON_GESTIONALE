<? 
include('newconf.php');
session_start();
if(!$_SESSION['logged'] || $_SESSION['logged']!="giliberti") die();
?>
<html>
<head>
<TITLE>visualizza fatture</TITLE>
<link href="./newstyle.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>


<script language="JavaScript" type="text/javascript">
var dsInvoice = new Spry.Data.XMLDataSet("file_xml/invoice.php", "fatture/fattura",{   useCache:  false   });
var dsTotInvoice = new Spry.Data.XMLDataSet("file_xml/invoice.php", "fatture/totale", {   useCache:  false   });
 var aaa=document.getElementById('nascosto');
// aaa.style.visibility='visible';
function changecat(ditta,year)	{ 
	
 dsInvoice.setURL('file_xml/invoice.php?d='+ditta+'&y='+year);
 dsInvoice.loadData();
dsTotInvoice.setURL('file_xml/invoice.php?d='+ditta+'&y='+year);
dsTotInvoice.loadData();
	
}		
function sendpaym(num){

if(window.confirm("confermi il pagamento?")) get("sendp="+num)
else ;
changecat("");
}

function delfat(num){
if(window.confirm("confermi eliminazione?")) get("delfat="+num)
else ;
changecat("");

}

</script>
</head>
<BODY>
<a href="index.php">torna alla home</a>
<h3>visualizza fatture</h3>
<select name="year" id="year" onchange="changecat(document.getElementById('dicta').value,this.value);">
<? 
$d=date("Y");
while($d>2006) { echo "<option>$d</option>"; $d--; }
?>
</select>
<SELECT name="dicta" id="dicta" onchange="changecat(this.value,document.getElementById('year').value);">
<option>TUTTE</option>
 <?
$dbh = new PDO('mysql:host=localhost;dbname=fabio', "root", "oZdij5",array(
  PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE=> true
));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT DISTINCT(categoria) FROM prodotto ORDER BY categoria ";
$result=$dbh->query($sql);
$dataset=$result->fetchAll();
foreach ($dataset as $cat) echo "<option>$cat[0]</option>";
?>

</SELECT>
<a onclick="">inserisci fatture</a>
<div id="debug"></div>


<div id="Specials_DIV" spry:region="dsInvoice">
		<table>
			<tr>
				<th scope="col" width=10%>id</center></th>
				<th scope="col" width=10%>numero</center></th>
				<th scope="col" width=10%>data</center></th>
				<th scope="col" width=10%>totale</center></th>
				<th scope="col" width=10%>imponibile</center></th>
				<th scope="col" width=10%>ditta</center></th>
				<th scope="col" width=10%>trimestre</center></th>
				<th scope="col" width=10%>pagato</center></th>
				<th scope="col" width=10%>ELIMINA</center></th>
			</tr>
			<tbody spry:repeatchildren="dsInvoice">
			<tr ondblclick="sendpaym({id})">
<td>{id}</td>
<td><div name="numero" id="numero"  >{numero}</td>
<td><div name="data" id="data"  >{data}</td>
<td><div name="totale" id="totale"  >{totale}</td>
<td><div name="imponibile" id="imponibile"  >{imponibile}</td>
<td><div name="ditta" id="ditta"  >{ditta}</td>
<td><div name="trimestre" id="trimestre"  >{trimestre}</td>
<td><div name="pagato" id="pagato"  >{pagato}</td>

<td><div name="elimina" id="elim"  >elimina</td>

<td><div name="del" id="del"  ><a href="#" onclick="delfat({id})">ELIMINA</a></td>

			</tr>
			</tbody>
		</table> </div>
<br><br><br>
<div id="tot" spry:region="dsTotInvoice"><h2>totale imponibile:{totale}</h2></div>
<div id="nascosto" class="stampa" >
<FORM action="newrequest.php" method="POST">
FATT N.<INPUT type="text" name="numfatt">
DEL:(gg/mm/aa) <INPUT type="text" name="data">
TOTALE:<INPUT type="text" name="totale"><br>
IMPONIBILE<INPUT type="text" name="impo">
ditta :<INPUT type="text" name="ditta">
trimestre:<SELECT name="mese"> <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></SELECT>
          <select name=year><? 	$d=date("Y"); while($d>2006) { echo "<option>$d</option>"; $d--; } ?></select>
pagato <INPUT type="checkbox" name="pagato">
<INPUT type="submit">
</FORM>
</div>






</BODY></html>