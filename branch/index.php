<?
include('newconf.php');
session_start();

if (isset($_SESSION['logged'])) {
include("index_logged.php");
die();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Giliberti Rappresentanze</title>
<link href="css/style_mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
<link href="css/style_tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 768px)" >
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 769px)" href="StyleSheet.css">
</head>

<body>
<div class="intestazione">

<a target="_blank" href="http://it.linkedin.com/pub/fabio-giliberti/21/a24/b07"><img src="images/linkedin-logo.jpg" /></a>
Giliberti Rappresentanze
</div>

<div class="menu">
<ul>
<a onclick="getpage('home_main.php');animatediv(1)"><span><li class='active' id="1">HOME</li></span></a>
<a onclick="getpage('video_pg.php');animatediv(2);"><span><li id="2">VIDEO</li></span></a>
<a onclick="getpage('registra_main.php');animatediv(3)"><span><li id="3">REGISTRA</li></span></a>
<a onclick="getpage('mail/index.php');animatediv(4)"><span><li id="4">CONTATTI</li></span></a>
<a onclick="getpage('cataloghi.php');animatediv(5)"><span><li id="5">CATALOGHI</li></span></a>
</ul>
</div>
<div class="docpane" id="docpane">
Benvenuto nel portale Giliberti Rappresentanze
  <form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
  <p>
  <label>USERNAME</label><input type="text" name="username"><br><br>
  <input type="hidden" name="requestenter" value="qq">
  <label>PASSWORD</label><input type="password" name="password"><br><br>
<input class="submit" type="submit" value="Entra">
</p>
</form>
</div>
<div class="loghi" >
<a target="_blank" href="http://www.tecnolamweb.com"><img src="images/tecnolam_tmp.jpg" ></a>
<a target="_blank" href="http://www.iur.it"><img src="images/iur_tmp.jpg" ></a>
<a target="_blank" href="http://www.gtline.it"><img src="images/gtline_tmp.png"   ></a>
<a target="_blank" href="http://www.cebo.it"><img src="images/cebo_tmp.jpg"   ></a>
<a target="_blank" href="http://www.vibisprayers.com"><img src="images/vibi_tmp.jpg"  ></a>
<a target="_blank" href="http://www.bonezzi.it"><img src="images/bonezzi_tmp.gif"   ></a>
<a target="_blank" href="http://www.kuker.it"><img src="images/kuker.png"   ></a>

</div>
<div class="loghi_dx" >
<a target="_blank" href="http://www.tron.it"><img src="images/tron_tmp.jpg"   ></a>
<a target="_blank" href="http://www.spanset.it"><img src="images/SpanSet_tmp.png"   ></a>
<a target="_blank" href="http://www.sapio.it"><img src="images/sapio_tmp.png"   ></a>
<a target="_blank" href="http://www.unigum.it"><img src="images/unigum.png" ></a>
<a target="_blank" href="http://www.easy-book.eu"><img src="images/nes_tmp.jpg"  ></a>
<a target="_blank" href="http://www.molle.it"><img src="images/molletmp.jpg" ></a>
<a target="_blank" href="http://www.colortap.it"><img src="images/color_tmp.jpg"   ></a>
<a target="_blank" href="http://www.masssrl.it"><img src="images/mass.jpg"   ></a>
<a target="_blank" href="http://www.laserliner.it"><img src="images/laserliner.png"   ></a>
</div>
<div class="footer" >
Owner : Fabio Giliberti | P.iva: IT05524720728
Created By Alessio Giliberti - Graphics: VV DESIGN
</div>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>
<script type="text/javascript" src="dojo/dojo.js"></script>
	<script language="JavaScript" type="text/javascript">
		dojo.require("dojo.widget.*");
		dojo.require("dojo.io.*");
	
	</script>
</body>
</html>
