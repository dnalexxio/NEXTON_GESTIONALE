<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
include('newconf.php');

if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}

$y=($_REQUEST['y']=="" || !isset($_REQUEST['y']) )? date("Y"):$_REQUEST['y'];


function getAziende($y){
$dbh=connect();
$qq="SELECT distinct(REPLACE(ditta,\".\",\"\")) ditta FROM Sql869774_1.ordine where data_ordine like '%".$y."%' and ditta not like '' order by ditta;";
$result = $dbh->query($qq);
$result = $result->fetchAll(PDO::FETCH_COLUMN, 0);
  return $result;
}
?>
<html>
	<head>
	
		<title>statistiche clienti</title>
		
	<!-Parte di Spry->
		<link href="./newstyle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
			<script language="JavaScript" type="text/javascript">
			
			
			
<?php	
$ditte=getAziende($y);
foreach ($ditte as $nome){

echo "var ds".ucfirst($nome)." = new Spry.Data.XMLDataSet("."\"file_xml/newstats.php?y=".$y."\", \"gente/".strtolower($nome)."/SA\"); \r\n";

echo "ds".ucfirst($nome).".setColumnType(\"SA\", \"number\"); \r\n";

}
?>

var dsUsers= new Spry.Data.XMLDataSet("file_xml/users.php", "clienti/cliente");
var dsSpend = new Spry.Data.XMLDataSet("file_xml/newbill.php", "clienti/cliente");
			dsSpend.setColumnType("tot", "number");
</script>
	<!-Parte di Dojo->
		<script type="text/javascript" src="dojo/dojo.js"></script>
		<script language="JavaScript" type="text/javascript">
						dojo.require("dojo.widget.*");
			dojo.require("dojo.widget.InlineEditBox");
			dojo.require("dojo.event.*");
			dojo.require("dojo.io.*");
			dojo.hostenv.writeIncludes();

		</script>

		<script language="JavaScript" type="text/javascript" src="functions.js"></script>

<script type="text/javascript">
function changeyear(thevalue){
//forse al posto di cambiare javascript, registra una variabile di sessione anno e ricarica la pagina che fai prima
// location.reload();

<?php
foreach ($ditte as $nome){

echo "ds".ucfirst($nome).".setURL('file_xml/newstats.php?y='+thevalue, \"gente/".strtolower($nome)."/SA\");  \r\n";


}
?>


dsSpend.setURL('file_xml/newbill.php?y='+thevalue, "clienti/cliente");

<?php
foreach ($ditte as $nome){
echo "ds".ucfirst($nome).".loadData();  \r\n";

}
?>

document.location.href = "https://www.gilibertifabio.com/gestionALE/graph.php?y="+thevalue;
}
</script>
	

	</head>
	
	<div><div id="stile" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>Via A.Volta n.5<br> 70017 Putignano(ba)<br>fgiliberti@libero.it<br>Iscrizione ruolo agenti:14315</div>


<a onclick="self.print()" class="stampa"><img src="button-print.png" alt="stampa il documento" class="stampa"></a>
<a href="index.php" class="stampa" >HOME PAGE</a>

		
<h1>STATISTICHE   <SELECT id="idselectyear" name="tendinaanno" onchange="changeyear(this.value)">
<?php 
$d=date("Y");
$y=($_REQUEST['y']=="" || !isset($_REQUEST['y']) )? date("Y"):$_REQUEST['y'];
while($d>2006) { echo "<option";
if($d==$y) echo " selected";
echo ">$d</option>"; 
$d--; }
?>
</SELECT></h1>


		


<hr>
<table>
<TR valign="top">
<?php
foreach ($ditte as $nome){
echo"
<TD>
<div spry:region=\"ds".ucfirst($nome)."\">
<table border=\"1\">
<caption>".strtoupper($nome)."</caption>
        <tr>
			    <th scope=\"col\">Id </th>
                <th scope=\"col\">Cliente </th>

                <th scope=\"col\" onclick=\"ds".ucfirst($nome).".sort('SA', 'toggle');\">Spesa </th>
               

        </TR>
        <tr spry:repeat=\"ds".ucfirst($nome)."\">
				<td>{ds_RowID}</td>
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>";
}

?>






</TR></table>
<hr>
<!--Calcola i totaliq
<SELECT name="users" spry:region="dsUsers" >
  <OPTION spry:repeat="dsUsers"  onclick="dojoTOT({@id});">{cliente}</OPTION>
</SELECT><div id="docpane"></div>-->

</body>
</html>