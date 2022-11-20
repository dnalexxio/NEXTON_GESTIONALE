<?

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
      

?>








