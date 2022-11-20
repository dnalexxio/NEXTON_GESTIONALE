<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?
session_start();
if ($_SESSION['logged']!="giliberti") die("unable to complete request");
?>
<html>
	<head>
	
		<title>statistiche clienti</title>
		
	<!-Parte di Spry->
		<link href="./newstyle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
			<script language="JavaScript" type="text/javascript">
	
var dsArnetoli = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/arnetoli/SA");	
var dsMass = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/mass/SA");
var dsCebo = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/cebo/SA");
var dsVolpi = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/volpi/SA");
var dsIur = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/iur/SA");	
var dsSapio = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/sapio/SA");
var dsunigum = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/unigum/SA");
var dsBon = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/bonezzi/SA");
var dsTecno = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/tecnolam/SA");
var dsColor = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/colortap/SA");	
var dsspanset = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/spanset/SA");	
var dsVilla = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/villa/SA");
var dsGis = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/gis/SA");
var dsBiandiz = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/biandiz/SA");	
var dsJdm = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/jdm/SA");	
var dsMicanti = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/micanti/SA");	
var dsTomes = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/tomes/SA");		
var dsTecfi = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/tecfi/SA");		
var dsTron = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/tron/SA");
var dsGtline = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/gtline/SA");	
var dsMolle = new Spry.Data.XMLDataSet("file_xml/newstats.php", "gente/molle/SA");			
	
var dsUsers= new Spry.Data.XMLDataSet("file_xml/users.php", "clienti/cliente");		
dsMass.setColumnType("SA", "number");
dsCebo.setColumnType("SA", "number");	
dsVolpi.setColumnType("SA", "number");		
dsIur.setColumnType("SA", "number");
dsSapio.setColumnType("SA", "number");
dsunigum.setColumnType("SA", "number");
dsBon.setColumnType("SA", "number");
dsTecno.setColumnType("SA", "number");
dsColor.setColumnType("SA", "number");
dsspanset.setColumnType("SA", "number");
dsVilla.setColumnType("SA", "number");
dsGis.setColumnType("SA", "number");
dsBiandiz.setColumnType("SA", "number");
dsArnetoli.setColumnType("SA", "number");
dsJdm.setColumnType("SA", "number");
dsMicanti.setColumnType("SA", "number");
dsTomes.setColumnType("SA", "number");
dsTecfi.setColumnType("SA", "number");
dsTron.setColumnType("SA", "number");
dsGtline.setColumnType("SA", "number");
dsMolle.setColumnType("SA", "number");

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

 dsMass.setURL('file_xml/newstats.php?y='+thevalue, "gente/mass/SA");
 dsArnetoli.setURL('file_xml/newstats.php?y='+thevalue, "gente/arnetoli/SA");
 dsCebo.setURL('file_xml/newstats.php?y='+thevalue, "gente/cebo/SA");
 dsVolpi.setURL('file_xml/newstats.php?y='+thevalue, "gente/volpi/SA");
 dsIur.setURL('file_xml/newstats.php?y='+thevalue, "gente/iur/SA");	
 dsSapio.setURL('file_xml/newstats.php?y='+thevalue, "gente/sapio/SA");
 dsunigum.setURL('file_xml/newstats.php?y='+thevalue, "gente/unigum/SA");
 dsBon.setURL('file_xml/newstats.php?y='+thevalue, "gente/bonezzi/SA");
 dsTecno.setURL('file_xml/newstats.php?y='+thevalue, "gente/tecnolam/SA");
 dsColor.setURL('file_xml/newstats.php?y='+thevalue, "gente/colortap/SA");	
 dsspanset.setURL('file_xml/newstats.php?y='+thevalue, "gente/spanset/SA");	
 dsVilla.setURL('file_xml/newstats.php?y='+thevalue, "gente/villa/SA");
 dsGis.setURL('file_xml/newstats.php?y='+thevalue, "gente/gis/SA");
 dsBiandiz.setURL('file_xml/newstats.php?y='+thevalue, "gente/biandiz/SA");		
 dsJdm.setURL('file_xml/newstats.php?y='+thevalue, "gente/jdm/SA");
 dsMicanti.setURL('file_xml/newstats.php?y='+thevalue, "gente/micanti/SA");
 dsTomes.setURL('file_xml/newstats.php?y='+thevalue, "gente/tomes/SA");
 dsTecfi.setURL('file_xml/newstats.php?y='+thevalue, "gente/tecfi/SA");
 dsTron.setURL('file_xml/newstats.php?y='+thevalue, "gente/tron/SA");
 dsGtline.setURL('file_xml/newstats.php?y='+thevalue, "gente/gtline/SA");
 dsMolle.setURL('file_xml/newstats.php?y='+thevalue, "gente/molle/SA");
 
 dsSpend.setURL('file_xml/newbill.php?y='+thevalue, "clienti/cliente");


dsArnetoli.loadData();
dsMass.loadData();
dsCebo.loadData();
dsVolpi.loadData();
dsIur.loadData();
dsSapio.loadData();
dsunigum.loadData();
dsBon.loadData();
dsTecno.loadData();
dsColor.loadData();
dsspanset.loadData();
dsVilla.loadData();
dsGis.loadData();
dsBiandiz.loadData();
dsSpend.loadData();
dsJdm.loadData();
dsMicanti.loadData();
dsTomes.loadData();
dsTecfi.loadData();
dsTron.loadData();
dsGtline.loadData();
dsMolle.loadData();
}
</script>
	

	</head>
	
	<div><div id="stile" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>Via A.Volta n.5<br> 70017 Putignano(ba)<br>fgiliberti@libero.it<br>Iscrizione ruolo agenti:14315</div>


<a onclick="self.print()" class="stampa"><img src="button-print.png" alt="stampa il documento" class="stampa"></a>
<a href="index.php" class="stampa" >HOME PAGE</a>

		
<h1>STATS   <SELECT name="tendinaanno" onchange="changeyear(this.value)">
<? 
$d=date("Y");
while($d>2006) { echo "<option>$d</option>"; $d--; }
?>
</SELECT></h1>


		


<hr>
<table><TR valign="top">
<TD>
<div spry:region="dsMass">
<table border="1">
<caption>MASS</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsMass.sort('SA', 'toggle');">Spesa </th>
               

        </TR>
        <tr spry:repeat="dsMass">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsBon">
<table border="1"><caption>Bon</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsBon.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsBon">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsIur">
<table border="1"><caption>Iur</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsIur.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsIur">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsVolpi">
<table border="1"><caption>Volpi</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsVolpi.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsVolpi">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsCebo">
<table border="1"><caption>Cebo</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsCebo.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsCebo">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>

</TD><TD>
<div spry:region="dsColor">
<table border="1"><caption>Color</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsColor.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsColor">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsspanset">
<table border="1"><caption>spanset</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsspanset.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsspanset">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsVilla">
<table border="1"><caption>Villa</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsVilla.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsVilla">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsunigum">
<table border="1"><caption>unigum</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsunigum.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsunigum">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsTecno">
<table border="1"><caption>Tecno</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsTecno.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsTecno">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD><TD>
<div spry:region="dsSapio">
<table border="1"><caption>Sapio</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsSapio.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsSapio">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>

<TD>
<div spry:region="dsGis">
<table border="1"><caption>Gis</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsGis.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsGis">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>

<TD>
<div spry:region="dsBiandiz">
<table border="1"><caption>Biandiz</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsBiandiz.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsBiandiz">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>


<TD>
<div spry:region="dsArnetoli">
<table border="1"><caption>Arnetoli</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsArnetoli.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsArnetoli">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>
<TD>
<div spry:region="dsJdm">
<table border="1"><caption>Jdm</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsJdm.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsJdm">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>


<TD>
<div spry:region="dsMicanti">
<table border="1"><caption>Micanti</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsMicanti.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsMicanti">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>
<TD>
<div spry:region="dsTomes">
<table border="1"><caption>Tomes</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsTomes.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsTomes">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>
<TD>
<div spry:region="dsTecfi">
<table border="1"><caption>Tecfi</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsTecfi.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsTecfi">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>

<TD>
<div spry:region="dsTron">
<table border="1"><caption>Tron</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsTron.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsTron">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>


<TD>
<div spry:region="dsGtline">
<table border="1"><caption>GTLINE</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsGtline.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsGtline">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>


<TD>
<div spry:region="dsMolle">
<table border="1"><caption>MOLLE</caption>
        <tr>
                <th scope="col">Cliente </th>

                <th scope="col" onclick="dsMolle.sort('SA', 'toggle');">Spesa </th>
               

        </tr>
        <tr spry:repeat="dsMolle">
                <td>{@name}</td>
                <td>{SA}</td>

                
        </tr>

</table>
</div>
</TD>

</TR></table>
<hr>
<!--Calcola i totaliq
<SELECT name="users" spry:region="dsUsers" >
  <OPTION spry:repeat="dsUsers"  onclick="dojoTOT({@id});">{cliente}</OPTION>
</SELECT><div id="docpane"></div>-->
<? include("newbill.php");?>
</body>
</html>