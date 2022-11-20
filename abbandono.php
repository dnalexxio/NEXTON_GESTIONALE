<?php
ini_set('display_errors', 0);
session_start();
if ($_SESSION["logged"]){
session_destroy();
setcookie( "logged", "" );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="refresh" content="2;URL=index.php">
<title>Giliberti Rappresentanze</title>

<link rel="stylesheet" type="text/css" href="StyleSheet.css">
</head>
<body>

	
<div class="intestazione">

<a target="_blank" href="http://it.linkedin.com/pub/fabio-giliberti/21/a24/b07"><img src="images/linkedin-logo.jpg" /></a>
Giliberti Rappresentanze
</div>
<div class="docpane" id="docpane">
	Grazie per aver visitato il nostro sito!
</div>
	<br>
	<br>
	
</div><a href="index.php">clicca qui</a></body>
<div class="footer" >
Owner : Fabio Giliberti | P.iva: IT05524720728
Created By Valessio Communications
</div>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>
<script type="text/javascript" src="dojo/dojo.js"></script>
	<script language="JavaScript" type="text/javascript">
		dojo.require("dojo.widget.*");
		dojo.require("dojo.io.*");
	
	</script>
	<?php
}
else {
echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\"> ";
?>
<link rel="stylesheet" type="text/css" href="StyleSheet.css">
<div class="intestazione">

<a target="_blank" href="http://it.linkedin.com/pub/fabio-giliberti/21/a24/b07"><img src="images/linkedin-logo.jpg" /></a>
Giliberti Rappresentanze
</div>
<br><br><br><br><br><br><br><br><br><br>
<div class="docpane" id="docpane">
<?php
echo "Procedere con il login";
}
?>
</div>
