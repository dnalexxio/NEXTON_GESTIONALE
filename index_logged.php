<?php

if (isset($_SESSION['logged'])){
?>
<!DOCTYPE HTML><html><head>
<link href="css/style_mobile.css" rel="stylesheet" type="text/css" media="(min-device-width: 0px) and (max-device-width: 320px)" >
<link href="css/style_tablet.css" rel="stylesheet" type="text/css" media="(min-device-width: 321px) and (max-device-width: 768px)" >
<link href="css/style_desktop2.css" rel="stylesheet" type="text/css" media="(min-device-width: 769px)" >
</head>

<body> 
<div id="header">BENVENUTO SU GILIBERTI RAPPRESENTANZE  {$_SESSION['logged']}</div>


<?php 

echo "<div id=\"docpane\">";
echo $_SESSION['logged'];

 
echo "<p class=\"menu1\">".date("d/m/y   G:i")." </p></div>";
echo "</body>";
echo "</html>";
      
}
?>








