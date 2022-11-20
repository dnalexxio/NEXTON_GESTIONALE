<?php
include('newconf.php');
session_start();

if (isset($_SESSION['logged'])) {
echo "<!DOCTYPE HTML><html><head>
<link href=\"css/style_mobile.css\" rel=\"stylesheet\" type=\"text/css\" media=\"(min-device-width: 0px) and (max-device-width: 320px)\" >
<link href=\"css/style_tablet.css\" rel=\"stylesheet\" type=\"text/css\" media=\"(min-device-width: 321px) and (max-device-width: 768px)\" >
<link href=\"css/style_desktop2.css\" rel=\"stylesheet\" type=\"text/css\" media=\"(min-device-width: 769px)\" >
</head>";

echo "<body> 
<div id=\"header\">BENVENUTO SU GILIBERTI RAPPRESENTANZE</div>
<div id=\"menu_princ\">{$_SESSION['logged']} <br> (codice cliente {$_SESSION['loggedid']})<br> <a href=\"abbandono.php\">ABBANDONA IL SITO</a></div>";
echo "<div id=\"docpane\">";
menu();
 
echo "<p class=\"menu1\">".date("d/m/y   G:i")." </p></div>";
echo "</body>";
echo "</html>";
					}
      
else {

	?>
	<!DOCTYPE HTML>
	<html>
	<head>
	<TITLE>FABIO GILIBERTI</TITLE><script type="text/javascript">
	function controlla(forma){
	if (forma.username.value=="" || forma.password.value=="") {alert ("non hai inserito niente");  }
	else { ; }
	}
	</script>
<!--
<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
<link href="css/style_mobile.css" rel="stylesheet" type="text/css" media="(min-device-width: 0px) and (max-device-width: 320px)" >
<link href="css/style_tablet.css" rel="stylesheet" type="text/css" media="(min-device-width: 321px) and (max-device-widthh: 768px)" >
<link href="css/style_desktop2.css" rel="stylesheet" type="text/css" media="(min-device-width: 769px)" >
//-->
<link href="css/style_desktop2.css" rel="stylesheet" type="text/css" >
	<script language="JavaScript" type="text/javascript" src="functions.js"></script><script type="text/javascript" src="dojo/dojo.js"></script>
	<script language="JavaScript" type="text/javascript">
		dojo.require("dojo.widget.*");
		dojo.require("dojo.io.*");
	
	</script>
	
	</head>
	<body>
	<div id="header">
	BENVENUTO SU GILIBERTI RAPPRESENTANZE
	</div>
	<div id="icons">
	<a target="_blank" href="http://www.youtube.com/fabio.giliberti.5"><img src="images/yt_logo.gif" /></a>
	<a target="_blank" href="http://it.linkedin.com/pub/fabio-giliberti/21/a24/b07"><img src="images/linkedin-logo.jpg" /></a>
	</div>
	
	<div id="menu_princ"><br><br><br>
	<a onclick="getpage('home_main.php')">HOME</a><br><br>
	<a onclick="getpage('video_pg.php')">VIDEO</a><br><br>
	<a onclick="getpage('registra_main.php')">REGISTRA</a><br><br>
	<a onclick="getpage('mail/index.php')">CONTATTI</a><br><br>
	
	</div>
	
	                 
			<div id="docpane">
		<div id="loginbox">
  <form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
  <p> 
  <label>USERNAME</label><input type="text" name="username"><br><br>
  <input type="hidden" name="requestenter" value="qq">
  <label>PASSWORD</label><input type="password" name="password"><br><br>
<input class="submit" type="submit" value="Entra">
</p>
</form></div>
		
		<div id="loghi">
		<a target="_blank" href="http://www.spanset.it"><img src="images/SpanSet_tmp.png"  ></a>
		<a target="_blank" href="http://www.masssrl.it"><img src="images/mass.jpg"   ></a>
		<a target="_blank" href="http://www.bianditz.es"><img src="images/biandiz_tmp.jpg"   ></a>		
		<a target="_blank" href="http://www.easy-book.eu"><img src="images/nes_tmp.jpg"  ></a>
		<a target="_blank" href="http://www.bonezzi.it"><img src="images/bonezzi_tmp.gif"   ></a>
		<a target="_blank" href="http://www.sapio.it"><img src="images/logosapio.jpg"   ></a>
		<a target="_blank" href=".it"><img src="images/molletmp.jpg" ></a>
		</div>
		<div id="loghi2">
		<a target="_blank" href="http://www.iur.it"><img src="images/iur_tmp.jpg" ></a>
		<a target="_blank" href="http://www.colortap.it"><img src="images/color_tmp.jpg"   ></a>
		<a target="_blank" href="http://www.vibisprayers.com"><img src="images/vibi_tmp.jpg"  ></a>
		<a target="_blank" href="http://www.tecnolamweb.com"><img src="images/tecnolam_tmp.jpg" ></a>
		<a target="_blank" href="http://www.cebo.it"><img src="images/cebo_tmp.jpg"   ></a>
		<a target="_blank" href="http://www..it"><img src="images/tron_tmp.jpg"   ></a>
		<a target="_blank" href="http://www.gtline.it"><img src="images/sfondogt2.jpg"   ></a>

		</div>
		
		
</div>
<div id="footer">
<center> Owner : <a class="whitelink" href="mailto:fgiliberti@libero.it">Fabio Giliberti</a> | P.iva: IT05524720728</center>
	<center><small><strong>Created by VAlEssiO Communications</strong> </small></center>                   
</div>
			

			</body>
			</html>
			

<?php
}
?>








