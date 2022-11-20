<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	
		<title>statistiche clienti</title>
		
	<!-Parte di Spry->
		<link href="./newstyle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
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
<script language="JavaScript" type="text/javascript">
var dsArt = new Spry.Data.XMLDataSet("file_xml/articoli.php", "articolo/name");
var dsTo = new Spry.Data.XMLDataSet("file_xml/articoli.php", "articolo/ripe");
function drill(code,cat,cli,year)	{ 
	
	document.body.style.cursor='wait';
 dsArt.setURL('file_xml/articoli.php?art='+code+'&cat='+cat+'&codcl='+cli+'&y='+year);
dsTo.setURL('file_xml/articoli.php?art='+code+'&cat='+cat+'&codcl='+cli+'&y='+year);
	dsArt.loadData();
	dsTo.loadData();
document.body.style.cursor='auto';
}
</script>

	

	</head>
<body><a href="index.php" class="stampa" >HOME PAGE</a>

<form onsubmit="return false;">
  INSERISCI CODICE ARTICOLO: <BR>
<input type="text" name="art">  AZIENDA:<input type="text" name="cat"> codice cliente:<input type="text" name="codcl">
<select  name="year" id="year">
<? 
$d=date("Y");
while($d>2006) { echo "<option>$d</option>"; $d--; }
?>
<option>totale</option>
</select>
<input type="button" value="ricerca" onclick="drill(art.value,cat.value,codcl.value,year.value)">

</form>
<br><br><br>
<div spry:region="dsArt">
<table border="1"><caption>prodotto: {nomeprod}</caption>
        <tr>
<th scope="col">ID utente</th>
	 <th scope="col">nome</th>        
        <th scope="col">pezzi venduti</th>
                <th scope="col">prezzo </th>
	   <th scope="col">prezzo mod?</th>
         <th scope="col">DATA</th>      

        </TR>
        <tr spry:repeat="dsArt">
		 <td>{@id}</td>
		  <td>{@nome}</td>
                <td>{qta}</td>
                <td>{price}</td>
			 <td>{modif}</td>
                <td>{data}</td>
        </tr>

</table>
</div>
<div spry:region="dsTo"><B>           TOTALE:{totaleqta}</B></div>
</body>