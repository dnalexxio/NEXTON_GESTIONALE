﻿<?error_reporting (E_ALL);ob_start(); session_start(); $_SESSION['code']=$_GET['code'];$code=$_GET['code'];?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html>	<head>			<title>MODIFICA PRODOTTO</title>				<link href="newstyle.css" rel="stylesheet" type="text/css" />	<!-Parte di Spry->			<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>		<script language="JavaScript" type="text/javascript" src="./includes/SpryEffects.js"></script>				<script language="JavaScript" type="text/javascript">			var dsEmployees = new Spry.Data.XMLDataSet("file_xml/menuadmin.xml", "/employees/employee"); 			var dsProdotto = new Spry.Data.XMLDataSet("file_xml/visprod.php?code=<? echo $code;?>", "products/product");			var metodo='name';				</script>			<!-Parte di Dojo->		<script type="text/javascript" src="dojo/dojo.js"></script>		<script language="JavaScript" type="text/javascript">						dojo.require("dojo.widget.ContentPane");			dojo.require("dojo.widget.LayoutContainer");			dojo.require("dojo.widget.Checkbox");			dojo.require("dojo.widget.Button");			dojo.require("dojo.widget.*");			dojo.require("dojo.widget.InlineEditBox");			dojo.require("dojo.widget.Wizard");			dojo.require("dojo.event.*");			dojo.require("dojo.io.*");			dojo.hostenv.writeIncludes();									function saveHandler(newValue, oldValue) {		//alert("La variabile è passata da "+oldValue+" a "+newValue+"!");		//alert(this+"   "+newValue); //su ie bisogna prendere il nome		dojoeditForm(<? echo $_GET['code'];?>,this,newValue); //NON FUNZIONA SU IE 	}	function init() {		var d1 = dojo.widget.byId("d1");	d1.onSave = saveHandler;		var d2 = dojo.widget.byId("d2");	d2.onSave = saveHandler;		var d3 = dojo.widget.byId("d3");	d3.onSave = saveHandler;		var d6 = dojo.widget.byId("d6");        d6.onSave = saveHandler;		var d9 = dojo.widget.byId("d9"); 	d9.onSave = saveHandler;		var d10 = dojo.widget.byId("d10");	d10 .onSave = saveHandler;			}dojo.addOnLoad(init)					</script>			<script language="JavaScript" type="text/javascript" src="functions.js"></script>						</head>		<body>				<a href="index.php">HOME PAGE</a>		<br><br><div id="stile" align="right" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>fgiliberti@libero.it</div><h1>Modifica o cancellazione del prodotto</h1><table>	<tr>		<td class="evidenza" width="30%">Codice prodotto</td>		<td width="70%"><div id="d1" name="codiceprodotto" spry:region="dsProdotto" dojoType="inlineEditBox">{code}</div></td>	</tr>	<tr>		<td class="evidenza" width="30%">Nome del prodotto</td>		<td width="70%"><div id="d2" name="nomeprodotto" spry:region="dsProdotto" dojoType="inlineEditBox">{name}</div></td>	</tr>	<tr>		<td class="evidenza" width="30%">MARCA</td>		<td width="70%"><div id="d3" name="categoriaprodotto" spry:region="dsProdotto" dojoType="inlineEditBox">{category}</div></td>	</tr>	<tr>		<td class="evidenza" width="30%">Quantita'</td>		<td width="70%"><div id="d6" name="quantitaprodotto" spry:region="dsProdotto" dojoType="inlineEditBox">{quantity}</div></td>	</tr>		<tr>		<td class="evidenza" width="30%">Prezzo</td>		<td width="70%"><div id="d9" name="prezzoprodotto" spry:region="dsProdotto" dojoType="inlineEditBox">{price}</div></td>	</tr>	<tr>		<td class="evidenza" width="30%">Descrizione</td>		<td width="70%"><div id="d10" name="descrizioneprodotto" spry:region="dsProdotto" dojoType="inlineEditBox">{desc}</div></td>	</tr><input type="hidden" name="modificaprod" value="<? echo $code;?>"></table><br><!---->	<button  onclick="try{dojodel('<? echo $code;?>')}catch(E){};return false;">			<img src="dojo/tests/widget/images/recyclebin.gif">			Cancella prodotto	</button><div id="debug"></div></html>