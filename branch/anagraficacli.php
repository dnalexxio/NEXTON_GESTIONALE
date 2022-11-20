<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>anagrafica clienti</title>
		
	<!-Parte di Spry->
		<link href="./newstyle.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
			<script language="JavaScript" type="text/javascript">
		
<? if (!isset($_SESSION['logged'])) die("</script>couldn't load page"); ?>			

var dsAnagrafica = new Spry.Data.XMLDataSet("file_xml/anagrafica.php?usern=<? echo $_GET['usern'];?>", "voce");
		
		
		</script>
		
	<!-Parte di Dojo->
		<script type="text/javascript" src="dojo/dojo.js"></script>
		<script language="JavaScript" type="text/javascript">
						dojo.require("dojo.widget.*");
			dojo.require("dojo.widget.InlineEditBox");
			dojo.require("dojo.event.*");
			dojo.require("dojo.io.*");
			dojo.hostenv.writeIncludes();
			
function saveHandler(newValue, oldValue) {
		
		//alert("La variabile è passata da "+oldValue+" a "+newValue+"!");
		//alert(<? //$_SESSION['logged'];?>+"         "+this+"   "+newValue); //su ie bisogna prendere il nome
		dojoeditForm('<? echo $_GET['usern'];?>',this,newValue); //NON FUNZIONA SU IE 
	}

			function init() {
				var nome1 = dojo.widget.byId("telcl");
				nome1.onSave = saveHandler;
				nome2 = dojo.widget.byId("fax");
				nome2.onSave = saveHandler;
				nome3 = dojo.widget.byId("paga");
				nome3.onSave = saveHandler;
				nome4 = dojo.widget.byId("mailc");
				nome4.onSave = saveHandler;
				nome5 = dojo.widget.byId("contoc");
				nome5.onSave = saveHandler;
				nome6 = dojo.widget.byId("verofax");
				nome6.onSave = saveHandler;
				nome7 = dojo.widget.byId("abicab");
				nome7.onSave = saveHandler;
				nome8 = dojo.widget.byId("editable3");
				nome8.onSave = saveHandler;
				nome11 = dojo.widget.byId("editable2");
				nome11.onSave = saveHandler;
				nome9 = dojo.widget.byId("editable8");
				nome9.onSave = saveHandler;
				nome12 = dojo.widget.byId("editable9");
				nome12.onSave = saveHandler;
				nome10 = dojo.widget.byId("editable10");
				nome10.onSave = saveHandler;
				nome13 = dojo.widget.byId("editable7");
				nome13.onSave = saveHandler;	
				nome14 = dojo.widget.byId("editable14");
				nome14.onSave = saveHandler;
				nome15 = dojo.widget.byId("editable15");
				nome15.onSave = saveHandler;
				nome16 = dojo.widget.byId("cap");
				nome16.onSave = saveHandler;
}

			dojo.addOnLoad(init)
		</script>

		
		<script language="JavaScript" type="text/javascript" src="functions.js"></script>



	

	</head>
	
	<body>
		<a href="index.php" class="stampa">HOME PAGE</a>
		
<h1>Anagrafica</h1>


        <font face="Tahoma" color="black" size="3"><b>I tuoi dati</b></font>
		<br><div id="debug" class="stampa"></div>
		<p>Riepilogo dei dati personali</p><br>
		
		<table>
			
		<tr>
				<td class="evidenza" width="200px">Cognome</td>
				<td><div name="editable2" id="editable2" dojoType="inlineEditBox" spry:region="dsAnagrafica">{cognome}</td>
			</tr>
<tr>
				<td class="evidenza" width="200px">Indirizzo</td>
				<td><div name="editable8" id="editable8" dojoType="inlineEditBox" spry:region="dsAnagrafica">{indirizzo}</td>
			</tr>
<tr>
				<td class="evidenza" width="200px">Citta</td>
				<td><div name="editable9" id="editable9" dojoType="inlineEditBox" spry:region="dsAnagrafica">{citta}</td>
			</tr>
<tr>
				<td class="evidenza" width="200px">Provincia</td>
				<td><div name="prov" id="editable10" dojoType="inlineEditBox" spry:region="dsAnagrafica">{provincia}</td>
			</tr>
<tr>
				<td class="evidenza" width="200px">CAP</td>
				<td><div name="cap" id="cap" dojoType="inlineEditBox" spry:region="dsAnagrafica">{cap}</div></td>
			</tr>
			
			
		
<tr>
				<td class="evidenza" width="200px">C.fisc/Piva</td>
				<td><div name="editable7" id="editable7" dojoType="inlineEditBox" spry:region="dsAnagrafica">{cfisc}</td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">ABI/CAB</td>
				<td width="70%"><div name="abicab" spry:region="dsAnagrafica" dojoType="inlineEditBox" id="abicab">{abicab}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">Telefono*</td>
				<td width="70%"><div name="telefonocliente" spry:region="dsAnagrafica" dojoType="inlineEditBox" id="telcl">{telefono}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">fax</td>
				<td width="70%"><div name="fax" spry:region="dsAnagrafica" dojoType="inlineEditBox" 			    id="verofax">{nazione}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">cellulare</td>
				<td width="70%"><div name="fax" spry:region="dsAnagrafica" dojoType="inlineEditBox" id="fax">{fax}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">Indirizzo e-mail*</td>
				<td width="70%"><div name="emailcliente" spry:region="dsAnagrafica" dojoType="inlineEditBox" id="mailc">{mail}</div></td>
			</tr>
		
			<tr>
				<td class="evidenza" width="200px">pagamento</td>
				<td width="70%"><div name="paga" spry:region="dsAnagrafica" dojoType="inlineEditBox" id="paga">{paga}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">conto</td>
				<td width="70%"><div name="conto" spry:region="dsAnagrafica" dojoType="inlineEditBox" id="contoc">{conto}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">Note</td>
				<td><div name="editable3" id="editable3" spry:region="dsAnagrafica" dojoType="inlineEditBox">{nome}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">ATTIVO</td>
				<td><div name="editable14" id="editable14" spry:region="dsAnagrafica" dojoType="inlineEditBox">{attivo}</div></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">password</td>
				<td><div name="editable15" id="editable15" spry:region="dsAnagrafica" dojoType="inlineEditBox">{password}</div></td>
			</tr>

</table>
        </div>		
</div>			

    

</body>
</html>

