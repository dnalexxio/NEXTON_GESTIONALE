<?
session_start();
echo "<!DOCTYPE HTML><html><head>
<link href=\"css/style_mobile.css\" rel=\"stylesheet\" type=\"text/css\" media=\"(min-device-width: 0px) and (max-device-width: 320px)\" >
   <link href=\"css/style_tablet.css\" rel=\"stylesheet\" type=\"text/css\" media=\"(min-device-width: 321px) and (max-device-width: 768px)\" >
   <link href=\"css/style_desktop2.css\" rel=\"stylesheet\" type=\"text/css\" media=\" (min-device-width: 769px)\" >";
echo "<meta charset=\"utf-8\" /></head>";
if (!isset($_SESSION['logged'])) die ("NON PUOI EFFETTUARE LA GENERAZIONE SENZA UN LOGIN");
include('newconf.php');
?>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>
<script type="text/javascript" src="dojo/dojo.js"></script>
	<script type="text/javascript">
dojo.require("dojo.io.*");
</script>


<h1>GENERA ORDINE</h1>

<div id="menu_princ">
	<a onclick="getpage('video_pg.php')">VIDEO</a><br><br>
	<a onclick="getpage('registra_main.php')">REGISTRA</a><br><br>
	<a onclick="getpage('mail/index.php')">CONTATTI</a><br><br>
	<? menu(); ?>
</div>
<div id="docpane">

<br><br><h2>
<? if(isset($_SESSION['conto'])) echo" <font color=\"red\">ATTENZIONE: </font>Hai già un ordine aperto, il numero ".$_SESSION['contovisualizzabile']." <a href=\"newSeek.php\"><br><br>Riaprilo cliccando qui</a>"; ?>
<br><br><br>
Generare un nuovo ordine per il cliente <? echo $_SESSION['logged'];?></h2>
<form onsubmit="try{dojoForm2(this)}catch(E){};return false;"  method="POST"> 
<input type="hidden" name="genera" value="2">
<input type="hidden" name="utene" value="<? echo $_SESSION['logged'];?>">
<input class="submit" type="submit" value="genera nuovo ordine">
</form>

</div>
