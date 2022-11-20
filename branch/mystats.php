<? session_start(); ?>
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
function drill(code,cat,cli)	{ 
	
	document.body.style.cursor='wait';
 dsArt.setURL('file_xml/articoli.php?art='+code+'&cat='+cat+'&codcl='+cli);
dsTo.setURL('file_xml/articoli.php?art='+code+'&cat='+cat+'&codcl='+cli);
	dsArt.loadData();
	dsTo.loadData();
document.body.style.cursor='auto';
}
</script>

	

	</head>
<body><a href="index.php" class="stampa" >HOME PAGE</a>

<form onsubmit="return false;">
  INSERISCI CODICE ARTICOLO: <BR>
<input type="text" name="art">  AZIENDA:<input type="text" name="cat"> codice cliente:<? echo $_SESSION['loggedid'];?>
<input type="button" value="ricerca" onclick="drill(art.value,cat.value,<? echo $_SESSION['loggedid'];?>)">

</form>
<br><br><br>
<div spry:region="dsArt">
<table border="1"><caption>prodotto: {nomeprod}</caption>
        <tr>
	 <th scope="col">nome</th>        
        <th scope="col">pezzi venduti</th>
                <th scope="col">prezzo </th>
	   <th scope="col">prezzo mod?</th>
		<th scope="col">data (ord.num)</th>
               

        </TR>
        <tr spry:repeat="dsArt">
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