<? session_start(); 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:spry="http://ns.adobe.com/spry">
<head>
<title>COMPONI ORDINE</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Spry Zuggest Sample</title>
<link href="css/newstyle_tablet.css" rel="stylesheet" type="text/css" media="(min-device-width: 0px) and (max-device-width: 320px)" >
<link href="css/newstyle_tablet.css" rel="stylesheet" type="text/css" media="(min-device-width: 321px) and (max-device-width: 768px)" >
<link href="newstyle.css" rel="stylesheet" type="text/css" media="(min-device-width: 769px)" >
<style>
.prodDesc {
	width: 250px;
	height: 150px;
	float: left;
	border: solid 1px #999999;
	margin: 0px 4px 4px 0px;
	padding: 4px;
	font-color: black;
	
}
 div .selected{ background-color: #E6E6E6; }
 div {	color: black; }

.prodDesc img {
	width: 60px;
	height: 32px; 
	float: left;
}

.boxshot {
	padding: 0px;
	height: 64px;
	width: 64px;
	float: left;
	float: left;
}
.boxshot img {
	width: 117px;
	height: 64px;
	position: relative;
	left: -25px;
}

#blanket {
	background-color:#111;
	opacity: 0.65;
	*background:none;
	position:absolute;
	z-index: 9001;
	top:0px;
	left:0px;
	width:100%;
	}
	 
	#popUpDiv {
	position:absolute;
	background:url(pop-back.jpg) no-repeat;
	width:400px;
	height:400px;
	border:5px solid #000;
	z-index: 9002;
	}

</style>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>
<script type="text/javascript" src="dojo/dojo.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/zug/xpath.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/zug/SpryData.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/zug/SpryAutoSuggest.js"></script>
<script language="JavaScript" type="text/javascript">
var dsProducts = new Spry.Data.XMLDataSet("file_xml/superseek.php", "products/product",{ sortOnLoad: "code" });
//var dsProducts = new Spry.Data.XMLDataSet("../../demos/products/products.xml", "/products/product", { sortOnLoad: "name" })

function MyQueryFunc(autoCompleteWidget, str, contains, dataSet, columnName, amethod,useful)
{
	
//alert(autoCompleteWidget+str+contains+dataSet+columnName+amethod+useful);
// Auto suggest query functions typically fire off a request to
	// a server. Since all of our data is housed in a single file, all
	// we need to do is make sure that we filter it properly.

	if (!str)
	{
		// The auto suggest widget contains no value in its
		// text field. Install a null filter on the data set
		// so the menu empties out, and then hide it so it can't
		// be seen.
		dataSet.filter(function(ds, row, rowNumber) { return null; });
		autoCompleteWidget.showSuggestions(false);
		return;
	}

	// We have a value to auto suggest against. Build a non-destructive
	// filter that uses this value to decide what rows to keep in the
	// data set. Check the "contains" value that was passed in to this
	// function. If it is false, then we'll only match strings that begin
	// with the auto suggest value, otherwise we will match any string
	// that contains the value.

	var regExpStr = str;
if (amethod==0) {
dsProducts.setURL('file_xml/superseek.php?seek=name&word='+str+'&contiene='+contains+'&index=h025');
	dsProducts.loadData();

}
else if (amethod==1) {
dsProducts.setURL('file_xml/superseek.php?seek=code&word='+str+'&contiene='+contains+'&index=h025');
	dsProducts.loadData();
}
else if (amethod==3) {
dsProducts.setURL('file_xml/superseek.php?seek=new&word='+str+'&contiene='+contains+'&index=h025');
	dsProducts.loadData();
}
else {
	dsProducts.setURL('file_xml/superseek.php?seek=both&word='+useful+'&word2='+str+'&contiene='+contains+'&index=h025');
	dsProducts.loadData();
}
	if (!contains)
	 	regExpStr = "^" + regExpStr;

	var regExp = new RegExp(regExpStr, "i");
	
	var filterFunc = function(ds, row, rowNumber)
	{
		var str = row[columnName];
		if (str && str.search(regExp) != -1)
			return row; /* MATCH! */
		return null; /* NO MATCH! */
	};

	//dataSet.filter(filterFunc);

	// Now that the data is filtered. Decide if we
	// should show the menu or not.

	autoCompleteWidget.showSuggestions(true);
}

</script>
<script type="text/javascript">
		dojo.require("dojo.widget.LinkPane");
			dojo.require("dojo.widget.ContentPane");
			dojo.require("dojo.widget.LayoutContainer");
		</script>
</head>

<body><div class="stampa">
[<a href="index.php" >HOME PAGE</a>] [ <a href="newSeek.php">Ricerca Tradizionale</a>] </div>

</div><br>
	<div id="stile" align="right" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>fgiliberti@libero.it</div>
        <div align="right"><font size="6px">Ricerca Prodotto</font></div><p><a href="neworders.php" target="new">Visualizza ordine corrente in una nuova finestra</a><? if(isset($_SESSION['conto'])) echo"   &nbsp;&nbsp;&nbsp;&nbsp;   Hai un ordine aperto, il numero ".$_SESSION['conto'] ?></p>

<hr />
<div id="productSample">
	Nome prodotto: <input type="text" id="productTF" /> 
	Inizio riga: <input type="checkbox" id="productCB" checked="checked" /><br>
<input type="text" name="scelta" id="methodc" >Codice prodotto</input><br>
<input type="text" name="scelta2" id="methodd" >DITTA</input>
</div>
<hr />
<div id="productMenu" spry:region="dsProducts" >
	<div spry:repeat="dsProducts" class="prodDesc" ondblclick="dojo.widget.byId('princ').setUrl('newbuy.php?getcode={id}&nomep={name}&cat={category}&p={price}&codpr={code}');dojo.byId('docpane').innerHTML='attesa';">
		<div class="boxshot">{category}</div>
		<p><strong>{name}</strong> PREZZO:{price}EUR</p>
		<p>code:{code}</p>
		<input type="text" name="quantity" onchange="javascript:dojoFastBuy(this.value,'{id}','{name}','{category}','{price}','{code}');" />	
	</div>
</div>

<script>
var ac2 = new Spry.Widget.AutoSuggest("productTF", "productMenu", function(acWidget, str) { MyQueryFunc(acWidget, str, $("productCB").checked, dsProducts, "name",  "0", "X"); });
var ac3 = new Spry.Widget.AutoSuggest("methodc", "productMenu", function(acWidget, str) { MyQueryFunc(acWidget, str, $("productCB").checked, dsProducts, "name",  "1","X"); });
var ac4 = new Spry.Widget.AutoSuggest("methodd", "productMenu", function(acWidget, str) { MyQueryFunc(acWidget, str, $("productCB").checked, dsProducts, "name",  "2",$("productTF").value); });
//far funzionare codice + ditta
var ac5 = new Spry.Widget.AutoSuggest("methode", "productMenu", function(acWidget, str) { MyQueryFunc(acWidget, str, $("productCB").checked, dsProducts, "name",  "2",$("productTF").value); });

</script>

<div dojoType="ContentPane" layoutAlign="right"
				id="princ" ></div>
<div dojoType="ContentPane" id="docpane"></div>
</body>
</html>
